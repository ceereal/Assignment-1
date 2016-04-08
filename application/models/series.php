<?php
class Series extends CI_Model {



	//constructor as good practice
	function __construct(){

		parent::__construct();

	}

	// Returns all series
	// Where clause removes the first header row
	function all(){
		$return;
		$count = 0;

		$definition;
		//Check if the handle can open
		if (($handle = fopen("http://botcards.jlparry.com/data/series", "r")) !== FALSE) {
			//If the handle opened, go through each line as a csv file
		    while (($data = fgetcsv($handle, ",")) !== FALSE) {
				//the first row defines the table
				if($count == 0){
					$definition = $data;
				}
				//all other rows use the definition to assign values
				else{
					$tempRow;
					foreach($definition as $key=>$field){
						$tempRow[$field] = $data[$key];
					}
					$return[$count] = $tempRow;
				}
				$count++;
			}
		}
		fclose($handle);

		return $return;
	}

	//returns a single series based on it's id number/code
	function series_by_id($id){

		$return;
		$count = 0;

		$definition;
		//Check if the handle can open
		if (($handle = fopen("http://botcards.jlparry.com/data/series", "r")) !== FALSE) {
			//If the handle opened, go through each line as a csv file
		    while (($data = fgetcsv($handle, ",")) !== FALSE) {
				//the first row defines the table
				if($count == 0){
					$definition = $data;
				}

				else{
					//prepares a temp row using the definition
					$tempRow;
					foreach($definition as $key=>$field){
						$tempRow[$field] = $data[$key];
					}
					//applies logic to the temp row to see if it should select it
					if($temp["code"] == $id){
						$return[$count] = $tempRow;
					}
				}
				$count++;
			}
		}
		fclose($handle);

		return $return;
	}
}
