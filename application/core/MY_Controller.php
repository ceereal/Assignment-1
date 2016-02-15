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

		if(session_id() == '') {
		    session_start();
		}

		if(isset($_SESSION['loggedIn']) && isset($_SESSION['username'])){
			if($_SESSION['loggedIn'] == true){
				$this->data['options'] = "<ul> <li> <a href='/'>Home</a></li> <li><a href='/portfolio/" . $_SESSION['username'] . " '>Portfolio</a></li> <li><a href='/assembly'>Assembler</a></li> </ul>";
				$this->data['signOptions'] = "Welcome, " . $_SESSION['username'] . "!<input id='btnLogout' type='button' value='Log Out'>";
			}
			else{
				$this->data['options'] = "<ul> <li><a href='/'>Home</a></li></ul>";
				$this->data['signOptions'] = "<input type='text'><input id='btnLogin' type='button' value='Log In'>";
			}
		}

		else{
			$this->data['options'] = "<ul> <li><a href='/'>Home</a></li></ul>";
			$this->data['signOptions'] = "<input id='txtSignIn' type='text'> <input id='btnLogin' type='button' value='Log In'>";
		}
		// finally, build the browser page!
		$this->data['data'] = &$this->data;
		$this->parser->parse('_template', $this->data);

	}


	public function login(){
		$username = $this->input->post('username', TRUE);
		if(!empty($username)){
			session_start();
				$_SESSION['loggedIn'] = true;
				$_SESSION['username'] = $username;
				echo 1;
		}

	}

	public function logout(){
		session_start();
		if($_SESSION['loggedIn'] == true){
				$_SESSION['loggedIn'] = false;
				unset($_SESSION['username']);
			session_write_close();
			echo 1;
		}

	}
}


/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */
