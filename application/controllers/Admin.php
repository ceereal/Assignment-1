<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//NOTE that it extends application, not CI_CONTROLLER

class Admin extends Application {
	function __construct(){
		parent::__construct();
	}


	public function index()
	{

		$this->data['pagebody'] = 'Admin'; //setting view to use
		$this->data['title'] = 'Bot Card Collector Admin'; //Changing nav bar to show page title


		//Setting all the created data to their appropriate placeholders
		$this->data['tableData'] = ""; //TODO: list players, using view fragment
		$this->Render();
		//$this->findCardSet();

	}

}
