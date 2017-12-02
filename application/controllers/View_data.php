<?php

/**
* Controller 8	 : Menampilkan data kedalam view
*/

class View_data extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
	}
	
	function normal()
	{
		$data["judulapp"] = "Menampilkan variabel cara normal";
		$data["var1"] = "Variabel 1";
		$data["ekstrakvar"] = array(
				"versi"	=> "Versi",
				"frm"	=> "Framework CodeIgniter",
				"no"	=> "2.1.0"
			);

		$this->load->view("view_data.php", $data);
	}
}