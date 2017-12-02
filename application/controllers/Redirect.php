<?php

/**
* Controller 6 : Fungsi Redirect
*					=>	digunakan untuk mengalihkan proses 
*						dari satu controler ke controler lain
*/

class Redirect extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
	}

	function demoredirect()
	{
		redirect("demouri/Demo_uri/showuriseg");
		echo "Ini demo redirect";
	}
}

?>