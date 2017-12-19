<?php

/**
* Controller 17 : Library Buatan Sendiri
*/

class Membilang_controller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array("html", "form", "url", "text"));
	}

	function index()
	{
		$this->load->library('membilang');

		$data["angka"] = 789;
		$data["terbilang"] = $this->membilang->terbilang($data["angka"]);
		
		$data["judul"] = "Penggunaan Library Membilang";

		$this->load->view("membilang_view", $data);
	}
}

?>