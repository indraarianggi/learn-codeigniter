<?php

/**
* Controller 13 : Pemfilteran XSS
*/

class Test_xss extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->helper('text');
	}

	function directxss()
	{
		$data = [
			"judul"		=> "Contoh XSS Tanpa Filter",
			"teks"		=> '<img src="javascript:alert(\'XSS\');"'
		];

		$this->load->view("xss/testxss_view", $data);
	}

	function getteks($filter="")
	{
		$data = [
			"judul"		=> "Input Teks Dengan XSS",
			"aksi"		=> "xss/Test_xss/postteks/" . $filter,
		];

		$data["teks"] =  array("name" => "teks", "id" => "teks", "rows" => 3, "cols" => 40);

		$this->load->view("xss/testxss_input", $data);

		// Inputkan teks berikut
		// Ini teks dengan XSS <IMG SRC="javascript:location('http://republika.co.id');"> Text setelah script CSS
	}

	function postteks($filter="")
	{
		$data["judul"] = "Menampilkan Teks dengan XSS";
		$data["teks"] = $this->input->post('teks');

		if($filter == "clean") {
			$data["teks"] = $this->security->xss_clean($data["teks"]);
		}

		$this->load->view("xss/testxss_view", $data);
	}
}

?>