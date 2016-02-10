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
				$table .= "<div>Player " . $row['Player'] . " has piece " . $row['Piece'] . " with token " . $row['Token'] . " from the time of " . $row['Datetime'] . "</div>";
			}
			
			$this->data['inventory_table'] = $table;
			$this->Render();
			$this->findCardSet();
		}
	}
	
	//Find equity of all players
	//If they have a collection -> add value of collection to equity
	//If they don't have a collection -> add +1 peanut for each card
	public function findCardSet()
	{
		$allCards = $this->collections->all();
		
		foreach($allCards as $card) {
			$Piece = substr($card['Piece'], 0, 2);
			$subPiece = substr($card['Piece'], 2, 1);
			$cardPosition = substr($card['Piece'], 4, 1);
			echo($Piece." ".$subPiece." ".$cardPosition."<br>");
		}
		$allCards[0];
	}
	
	
}