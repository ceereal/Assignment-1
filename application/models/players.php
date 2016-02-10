<?php
class Players extends CI_Model {

	//constructor as good practice
	function __construct(){
		
		parent::__construct();
		
	}
	
	//Returns all players
	//Where clause removes header row
	function all(){
		$query = $this->db->query("SELECT * FROM players;");
		return $query->result_array();
	}
	
	//Returns single player where the argument name is found
	function player_by_name($playerName){
		$query = $this->db->query("SELECT * FROM players WHERE Player = '$playerName';");
		return $query->row_array();
	}
}
