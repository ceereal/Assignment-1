<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//NOTE that it extends application, not CI_CONTROLLER

class Registration extends Application {
	function __construct(){
		parent::__construct();
	}


	public function index()
	{

		$this->data['pagebody'] = 'Registration'; //setting view to use
		$this->data['title'] = 'Bot Card Collector'; //Changing nav bar to show page title

		$this->Render();
		//$this->findCardSet();

	}

	public function signup(){

		$username = $this->input->post('username', TRUE);
		$password = $this->input->post('password', TRUE);

		$this->players->create_player($username, $password);
		redirect('/');

	}

}
