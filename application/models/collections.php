<?php
class Collections extends CI_Model {

	/*Example usage in a controller:
	
	$collection = $this->collections->collection_by_player($_SESSION['username']);
	foreach($collection as $row){
		$table .= "<div>Player " . $row['Player'] . " has piece " . $row['Piece'] . " with token " . $row['Token'] . " from the time of " . $row['DateTime'] . "</div>";
	}
	
	*/
	//constructor as good practice
	function __construct(){
		
		parent::__construct();
		
	}
	
	//Returns all collected robots in descending order by post date
	// Where clause removes header row
	function all(){
		$query = $this->db->query("SELECT `COL 1` AS Token, `COL 2` AS Piece, `COL 3` AS Player, `COL 4` AS DateTime FROM collections WHERE `COL 1` != 'Token' ORDER BY `COL 4` DESC;");
		
		return $query->result_array();
	}
	
	//returns all collected robots for a single player ordered by date, descending (most recent to least)
	function collection_by_player($playerName){
		$query = $this->db->query("SELECT `COL 1` AS Token, `COL 2` AS Piece, `COL 3` AS Player, `COL 4` AS DateTime FROM collections WHERE `Col 3` = '$playerName' ORDER BY `Col 4` DESC;");
		return $query->result_array();
	}
}
