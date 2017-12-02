<?php

/**
* Controller 10 : Helper URL
*/

class Helper_url extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	function link() {
		$this->load->view('helper_url');
	}
}

?>