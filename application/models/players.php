<?php
class Players extends CI_Model {

	/*Example usage in a controller:
	
	$player = $this->players->player_by_name("Mickey");
	$table .= "<div>Player " . $player['Player'] . " has " . $player['Peanuts'] . " peanuts</div>";
	*/
	
	//constructor as good practice
	function __construct(){
		
		parent::__construct();
		
	}
	
	//Returns all players
	//Where clause removes header row
	function all(){
		$query = $this->db->query("SELECT `COL 1` AS Player, `COL 2` AS Peanuts FROM players WHERE `COL 1` != 'Player';");
		return $query->result_array();
	}
	
	//Returns single player where the argument name is found
	function player_by_name($playerName){
		$query = $this->db->query("SELECT `COL 1` AS Player, `COL 2` AS Peanuts FROM players WHERE `Col 1` = '$playerName';");
		return $query->row_array();
	}
}
