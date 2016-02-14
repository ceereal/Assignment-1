<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//NOTE that it extends application, not CI_CONTROLLER

class Welcome extends Application {
	function __construct(){
		parent::__construct();
	}
	

	public function index()
	{
		//uncommenting these lines makes it seem like you are logged in,
		//to see what it looks like 
		$_SESSION['loggedIn'] = true;
		$_SESSION['username'] = 'Mickey';
		
		
		
		$this->data['pagebody'] = 'welcome_message'; //setting view to use
		$this->data['title'] = 'Bot Assembler'; //Changing nav bar to show page title
		if($_SESSION['loggedIn']){
			//setting appropriate data that
			$table = "";
			$collection = $this->collections->collection_by_player($_SESSION['username']);
			
			foreach($collection as $row){
				$table .= "<div>Player " . $row['Player'] . " has piece " . $row['Series'] . $row['SubSeries'] . "-" . $row['CardPosition'] . " with token " . $row['Token'] . " from the time of " . $row['Datetime'] . "</div>";
			}
			
			$this->data['inventory_table'] = $table;
			$this->Render();
			//$this->findCardSet();
		}
	}	
	
}