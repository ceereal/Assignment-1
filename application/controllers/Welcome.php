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
		
		$gameStatus = '<h1>Game is <b>ACTIVE!</b></h1>';
		
		$this->data['pagebody'] = 'Welcome'; //setting view to use
		$this->data['title'] = 'Bot Assembler'; //Changing nav bar to show page title
		if($_SESSION['loggedIn']){
			$table = "";
			//$collection = $this->collections->collection_by_player($_SESSION['username']);
			
			$players = $this->collections->get_players();
			
			foreach($players as $player) {
				$equity = $this->collections->get_player_equity($player['Player']);
				$table .= "<div>Player " . $player['Player'] . " has equity of " . $equity . "</div>";
			}
			
		
			$this->data['GameStatus'] = $gameStatus;
			$this->data['EquityTable'] = $table;
			$this->Render();
			//$this->findCardSet();
		}
	}	
	
}