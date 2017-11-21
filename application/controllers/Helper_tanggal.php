<?php

/**
* Controller 3 : perluasasn helper tanggal (date_helper)
*/

class Helper_tanggal extends CI_Controller
{
	function hariini()
	{
		// load helper html and date.
		$this->load->helper('html');
		$this->load->helper('date');

		$data = [
			"title"			=> "Contoh Helper Tanggal",
			"tglhariini"	=> date('d-m-Y'),
			"nohari"		=> date('w')
		];
		
		list($data["tgl"], $data["bln"], $data["thn"]) = explode("-", $data["tglhariini"]);

		$this->load->view('helper_tanggal_view', $data);
	}
}

?>