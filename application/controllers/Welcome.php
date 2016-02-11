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
	//To calc peanuts, call this, find how many of A, B, and C you have,
	//(IE 3 top, 2 bottom, 4 middle = 2 complete sets), multiply by 50, 
	//subtract #sets * 3 from total, add that to #	peanuts. Done!
	public function findCardSet(){
		$allCards = $this->collections->all();
		/*
		foreach($allCards as $card){
			$players = $this->collections->get_players();
			foreach($players as $player){
				$sets = $this->collections->get_set_by_player_piece_subpiece($player['Player'], $card['Piece'], $card['SubPiece']);
				foreach($sets as $set){
					echo '<pre> ' . $player['Player'] . ' ' . var_export($set, true) . '</pre>';
				}
				
			}
		}*/
		
		$players = $this->collections->get_players();
		
		foreach($players as $player){
			//echo $player['Player'];
			$playerCards = $this->collections->collection_by_player($player['Player']);
			$distinctSets = $this->collections->get_distinct_sets();
			foreach($distinctSets as $set){
				$playerSets = $this->collections->get_set_by_player_piece_subpiece($player['Player'], $set['Piece'], $set['SubPiece']);
				echo '<pre> ' . var_export($playerSets, true) . '</pre>';
			}
			
			
			
			
			
			break;
		}
	}
	
	
}