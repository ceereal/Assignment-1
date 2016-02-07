<?php
class Series extends CI_Model {

	/*Example usage in a controller:
	
	$series = $this->series->all();
	foreach($series as $row){
		$table .= "<div>There is a series " . $row['Series'] . " called  " . $row['Description'] . " with frequency " . $row['Frequency'] . " and value " . $row['Value'] . "</div>";
	}
	*/
	//constructor as good practice
	function __construct(){
		
		parent::__construct();
		
	}
	
	// Returns all series
	// Where clause removes the first header row
	function all(){
		$query = $this->db->query("SELECT `COL 1` AS Series, `COL 2` AS Description, `COL 3` AS Frequency, `COL 4` AS Value  FROM series WHERE `COL 1` != 'Series';");
		return $query->result_array();
	}
	
	//returns a single series based on it's id number
	function series_by_id($id){
		$query = $this->db->query("SELECT `COL 1` AS Series, `COL 2` AS Description, `COL 3` AS Frequency, `COL 4` AS Value FROM series WHERE `Col 1` = '$id';");
		return $query->row_array();
	}
}
