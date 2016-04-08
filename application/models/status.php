<?php
class Status extends CI_Model {

	//constructor as good practice
	function __construct(){

		parent::__construct();

	}

	//Returns all players
	//Where clause removes header row
	function all(){
		$file = file_get_contents("http://botcards.jlparry.com/status");
		$file = explode("bcc", $file);
		$fileCompiled = $file[0] . "bcc" . $file[1] . "bcc>";

		$xml = simplexml_load_string($fileCompiled);
		return $xml;
	}

	//Returns single player where the argument name is found
	function get_state(){
		$file = file_get_contents("http://botcards.jlparry.com/status");
		$file = explode("bcc", $file);
		$fileCompiled = $file[0] . "bcc" . $file[1] . "bcc>";

		$xml = simplexml_load_string($fileCompiled);
		return $xml->state;
	}

	function get_round(){
		$file = file_get_contents("http://botcards.jlparry.com/status");
		$file = explode("bcc", $file);
		$fileCompiled = $file[0] . "bcc" . $file[1] . "bcc>";

		$xml = simplexml_load_string($fileCompiled);
		return $xml->round;
	}

	function get_countdown(){
		$file = file_get_contents("http://botcards.jlparry.com/status");
		$file = explode("bcc", $file);
		$fileCompiled = $file[0] . "bcc" . $file[1] . "bcc>";

		$xml = simplexml_load_string($fileCompiled);
		return $xml->countdown;
	}
	function get_desc(){
		$file = file_get_contents("http://botcards.jlparry.com/status");
		$file = explode("bcc", $file);
		$fileCompiled = $file[0] . "bcc" . $file[1] . "bcc>";

		$xml = simplexml_load_string($fileCompiled);
		return $xml->desc;
	}
	
}
