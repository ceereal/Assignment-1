<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//NOTE that it extends application, not CI_CONTROLLER

class Welcome extends Application {
	function __construct(){
		parent::__construct();
	}


	public function index()
	{

		$gameStatus = '<h1>Game is <b>ACTIVE!</b></h1>';

		$this->data['pagebody'] = 'Welcome'; //setting view to use
		$this->data['title'] = 'Bot Card Collector'; //Changing nav bar to show page title

			$table = "";
			//$collection = $this->collections->collection_by_player($_SESSION['username']);

			$players = $this->collections->get_players();

			foreach($players as $player) {
				$equity = $this->collections->get_player_equity($player['Player']);
				$table .= "<div><a href='/portfolio/" . $player['Player'] . "'>Player " . $player['Player'] . "</a> has equity of " . $equity . " peanuts</div>";
			}


			$this->data['GameStatus'] = '<h3>Game Status: </h3>' . $gameStatus;
			$this->data['EquityTable'] = '<h3>Players: </h3>' . $table;
			$this->Render();
			//$this->findCardSet();

	}

}
