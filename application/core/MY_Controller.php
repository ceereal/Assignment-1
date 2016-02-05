<?php

/**
 * core/MY_Controller.php
 *
 * Default application controller
 *
 * Using a modified version of JPerry's MY_Controller from provided sample code
 * ------------------------------------------------------------------------
 */
class Application extends CI_Controller {

	protected $data = array();	  // parameters for view components
	protected $id;				  // identifier for our content

	/**
	 * Constructor.
	 * Establish view parameters & load common helpers
	 */

	function __construct()
	{
		parent::__construct();
		$this->data = array();
		$this->data['title'] = 'Assignment 1';	// our default title
		$this->errors = array();
	}

	/**
	 * Render this page
	 */
	function render()
	{
		$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
		
		//Enable these lines to test what it looks like when the user session variables are set (eg: user is signed in)
		//$_SESSION['loggedIn'] = 'true';
		//$_SESSION['username'] = 'dave';

		if(isset($_SESSION['loggedIn']) && isset($_SESSION['username'])){
			if($_SESSION['loggedIn'] == true){
				$this->data['options'] = "<a href='/'>Home</a><a href='/portfolio/" . $_SESSION['username'] . " '>Portfolio</a><a href='/assembly'>Assembler</a>";
				$this->data['signOptions'] = "Hello " . $_SESSION['username'];
			}
		}
		
		else{
			$this->data['options'] = "<a href='google.ca'>Home</a>";
			$this->data['signOptions'] = "<input type='text'><input type='button' value='Sign In'>";
		}
		
		// finally, build the browser page!
		$this->data['data'] = &$this->data;
		$this->parser->parse('_template', $this->data);
	}
}

/*
session_start();
		if(isset($_SESSION['loggedIn'])){
			$return = $_SESSION['loggedIn'];
		}
		else{
			$return = false;
		}
	session_write_close();
*/

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */