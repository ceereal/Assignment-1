<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//NOTE that it extends application, not CI_CONTROLLER

class Welcome extends Application {
	function __construct(){
		parent::__construct();
	}


	public function index()
	{

		//Setting up the game status
		$status = $this->status->all();
		if($status->round == ""){
			$status->round == "0";
		}
		//changes the display for the current game status
		switch($status->state){
			case(0) :
				$gameStatus = "<h1>Game is closed</h1>";
				break;

			case(1):
				$gameStatus = "<h1>Game is setting up.</h1>";
				break;

			case(2):
				$gameStatus = "<h1>Game is ready to go, get registered, market opens in: " . $status->countdown . " seconds</h1>";
				break;

			case(3):
				$gameStatus = "<h1>Game is active!</h1>";
				break;

			case(4):
				$gameStatus = "<h1>Game has concluded it's round</h1>";
				break;
		}
		$gameStatus .= "<h2>Round number: " . $status->round . "</h2>";

		//Code to print out all known series with values and descriptions
		$series = $this->series->all();
		$seriesCollection = "<h3>Known Series: </h3>";
		foreach($series as $row){
			$seriesCollection .= "<div>Series " . $row['code'] . ": " . $row['description'] . ", with a value of " . $row['value'] ." peanuts</div>";
		}

		$this->data['pagebody'] = 'Welcome'; //setting view to use
		$this->data['title'] = 'Bot Card Collector'; //Changing nav bar to show page title

		//Code to create a list of all the players and their status (peanuts and equity)
		$list = "";
		$players = $this->collections->get_players();
		foreach($players as $player) {
			$equity = $this->collections->get_player_equity($player);
			$peanuts = $this->players->get_player_peanuts($player);
			$list .= "<div><a href='/portfolio/" . $player . "'>Player " . $player . "</a>: Equity: " . ($equity + $peanuts) . ", Peanuts: " . $peanuts . "</div>";
		}

		//Setting all the created data to their appropriate placeholders
		$this->data['GameStatus'] = '<h3>Game Status: </h3>' . $gameStatus;
		$this->data['Series'] = $seriesCollection;
		$this->data['EquityTable'] = '<h3>Players: </h3>' . $list;
		$this->Render();
		//$this->findCardSet();

	}

}
