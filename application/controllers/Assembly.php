<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//NOTE that it extends application, not CI_CONTROLLER

class Assembly extends Application {
	function __construct(){
		parent::__construct();
	}
	

	public function index()
	{
		//uncommenting these lines makes it seem like you are logged in,
		//to see what it looks like 
		$_SESSION['loggedIn'] = true;
		$_SESSION['username'] = 'Mickey';
		
		
		
		$this->data['pagebody'] = 'assembly'; //setting view to use
		$this->data['title'] = 'Bot Assembler'; //Changing nav bar to show page title
		if($_SESSION['loggedIn']){
		//setting appropriate data that
		$table = "";
		$collection = $this->collections->collection_by_player($_SESSION['username']);
		
		foreach($collection as $row){
			$table .= "<div>Player " . $row['Player'] . " has piece " . $row['Series'] . $row['SubSeries'] . "-" . $row['CardPosition'] . " with token " . $row['Token'] . " from the time of " . $row['Datetime'] . "</div>";
		}
		
		$this->data['inventory_table'] = $table;
		$this->Render();
		}
	}
}

/*
	Array stuff for myself, to think about


	//gets a list of arrays, then goes through each array
	//array looks like {filename => 'whatever.png', "title" => bla}
	//parses them (puts the variables where they belong)
	//then passes the cells to the generate columns thing
	
	
	foreach ($pix as $picture)
		$cells[] = $this->parser->parse('_cell', (array) $picture, true);
	
	//prime the table class
	$this->load->library('table');
	$parms = array(
		'table_open' => '<table class="gallery">',
		'cell_start' => '<td class="oneimage">',
		'cell_alt_start' => '<td class="oneimages">'
	);
	$this->table->set_template($parms);
	
	//generate table
	$rows = $this->table->make_columns($cells, 3);
	$this->data['thetable'] = $this->table->generate($rows);
	*/