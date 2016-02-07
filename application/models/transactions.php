<?php
class Transactions extends CI_Model {
	
	/*Example usage in a controller:
	
	$transactions = $this->transactions->transactions_by_player("Mickey");
	foreach($transactions as $transaction){
		$table .= "<div>At " . $transaction['DateTime'] . " " . $transaction['Player'] . " " . $transaction['Transaction'] . " a series " . $transaction['Series'] . "</div>";
	}
	*/
	
	//constructor as good practice
	function __construct(){
		
		parent::__construct();
		
	}
	
	//Returns all transactions in descending order by post date
	//Where clause removes the title row
	function all(){
		$query = $this->db->query("SELECT `COL 1` AS DateTime, `COL 2` AS Player, `COL 3` AS Series, `COL 4` AS Transaction FROM transactions WHERE `COL 1` != 'DateTime' ORDER BY `COL 1` DESC;");
		
		return $query->result_array();
	}
	
	//gets all transactions for a single player
	function transactions_by_player($playerName){
		$query = $this->db->query("SELECT `COL 1` AS DateTime, `COL 2` AS Player, `COL 3` AS Series, `COL 4` AS Transaction FROM transactions WHERE `COL 2` = '$playerName';");
		return $query->result_array();
	}
	
	// gets all transactions of a type
	// can be either 'sell' or 'buy'
	function transactions_by_type($type){
		$query = $this->db->query("SELECT `COL 1` AS DateTime, `COL 2` AS Player, `COL 3` AS Series, `COL 4` AS Transaction FROM transactions WHERE `COL 4` = '$type';");
		return $query->result_array();
	}
}
