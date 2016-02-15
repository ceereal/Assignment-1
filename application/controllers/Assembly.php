<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//NOTE that it extends application, not CI_CONTROLLER

class Assembly extends Application {
	function __construct(){
		parent::__construct();
	}


	public function index()
	{
		session_start();
		$this->data['pagebody'] = 'assembly'; //setting view to use
		$this->data['title'] = 'Bot Assembler'; //Changing nav bar to show page title

		if(ISSET($_SESSION['loggedIn'])){
				if($_SESSION['loggedIn'] == true){
				//setting appropriate data that
				$table = "";
				$collection = $this->collections->collection_by_player($_SESSION['username']);

				foreach($collection as $row){
					$currentRow = "<div class='botpiece' data-token='" . $row['Token'] . "'>" .
												"<img src='/assets/images/" . $row['Series'] . $row['SubSeries'] . "-" . $row['CardPosition'] . ".jpeg' alt='Bot piece'>" .
												"<div class='botsubtitle'>" . $row['Series'] . $row['SubSeries'] . "-" . $row['CardPosition'] . "</div>" .
												"</div>";
					$table .= $currentRow;
				}

				$this->data['inventory_table'] = '<h3>Collection of Bots: </h3>' . $table;
				$this->data['headPiece'] = "<img src='/assets/images/unknown.jpeg' alt='Unkown!'>";
				$this->data['midPiece'] = "<img src='/assets/images/unknown.jpeg' alt='Unkown!'>";
				$this->data['legPiece'] = "<img src='/assets/images/unknown.jpeg' alt='Unkown!'>";

				$this->Render();
			}
			else{
				redirect('/');
			}
		}
		else{
			redirect('/');
		}
		session_write_close();
	}

	public function select($pieceToken){
		//check that the current signed in player owns that Token
		//put that token in the place of the image box

		$currentPiece = $this->collections->collection_by_token($pieceToken);
		if($currentPiece['Player'] == $_SESSION['username']){
			$this->data['headPiece'] = "<img src=<img class='botpiece' src='/assets/images/" . $currentPiece['Series'] . $currentPiece['SubSeries'] . "-" . $currentPiece['CardPosition'] . ".jpeg alt='Unkown!'>";
		}

	}

	public function get_collection_by_token(){
		session_start();
		$pieceToken = $this->input->post('token', TRUE);
		$currentPiece = $this->collections->collection_by_token($pieceToken);
		if($currentPiece['Player'] == $_SESSION['username']){
			$currentPiece['message'] = 'success';
			echo json_encode($currentPiece, JSON_FORCE_OBJECT);
		}
		else{
			$error['message'] = "failure";
			echo json_encode($error, JSON_FORCE_OBJECT);
		}

	}

}
