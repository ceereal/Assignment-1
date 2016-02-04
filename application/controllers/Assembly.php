<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assembly extends Application {
	function __construct(){
		parent::__construct();
	}
	

	public function index()
	{
		$this->data['pagebody'] = 'assembly'; //setting view to use
		
		//setting appropriate data that
		$this->data['inventory_table'] = "<b>Test</b>";
		$this->Render();

	}
}
