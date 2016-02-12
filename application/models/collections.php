<?php
class Collections extends CI_Model {

	//constructor as good practice
	function __construct(){
		
		parent::__construct();
		
	}
	
	//Returns all collected robots in descending order by post date
	// Where clause removes header row
	function all(){
		$query = $this->db->query(" SELECT LEFT(Piece, 2) AS Piece,
									SUBSTRING(Piece, 3, 1) AS SubPiece,
									SUBSTRING(Piece, 5, 1) AS CardPosition,
									Player,
									Token,
									Datetime
									FROM collections ORDER BY Datetime DESC;");
		
		return $query->result_array();
	}
	
	//returns all collected robots for a single player ordered by date, descending (most recent to least)
	function collection_by_player($playerName){
		$query = $this->db->query(" SELECT LEFT(Piece, 2) AS Piece,
									SUBSTRING(Piece, 3, 1) AS SubPiece,
									SUBSTRING(Piece, 5, 1) AS CardPosition,
									Player,
									Token,
									Datetime
									FROM collections 
									WHERE Player = '$playerName' ORDER BY Datetime DESC;");
		return $query->result_array();
	}
	
	
	//To calc peanuts, call this, find how many of A, B, and C you have,
	//(IE 3 top, 2 bottom, 4 middle = 2 complete sets), multiply by 50, 
	//subtract #sets * 3 from total, add that to #	peanuts. Done!
	function get_set_by_player_piece_subpiece($playerName, $piece, $subpiece){
		
		$query = $this->db->query(" SELECT LEFT(Piece, 2) AS Piece, 
								    SUBSTRING(Piece, 3, 1) AS SubPiece, 
								    SUBSTRING(Piece, 5, 1) AS CardPosition,
								    Token 
								    FROM collections 
								    WHERE Player = '$playerName' 
								    AND Piece = $piece 
								    AND SUBSTRING(Piece, 3, 1) = '$subpiece'; 
									");
		return $query->result_array();
	}
	
	function get_players(){
		$query = $this->db->query("SELECT distinct(Player) FROM collections;");
		return $query->result_array();
	}
	
	function get_distinct_sets(){
		$query = $this->db->query("SELECT DISTINCT(LEFT(Piece, 3)) AS SetID, LEFT(Piece, 2) AS Piece, SUBSTRING(Piece, 3, 1) AS SubPiece FROM collections ORDER BY Piece, SubPiece;");
		return $query->result_array();
	}
}
