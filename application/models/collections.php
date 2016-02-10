<?php
class Collections extends CI_Model {

	//constructor as good practice
	function __construct(){
		
		parent::__construct();
		
	}
	
	//Returns all collected robots in descending order by post date
	// Where clause removes header row
	function all(){
		$query = $this->db->query("SELECT * FROM collections ORDER BY Datetime DESC;");
		
		return $query->result_array();
	}
	
	//returns all collected robots for a single player ordered by date, descending (most recent to least)
	function collection_by_player($playerName){
		$query = $this->db->query("SELECT * FROM collections WHERE Player = '$playerName' ORDER BY Datetime DESC;");
		return $query->result_array();
	}
}
