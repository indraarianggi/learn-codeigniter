<?php

/**
* Controller 19 : Membaca dan Menampilkan Data dengan Model MVC
*/

class Mvc extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('html', 'form', 'url', 'text'));
		$this->load->model("database/Database_model");
	}

	/*
	* Menampilkan hasil pembacaan database dengan model, view, dan controller
	*/
	function baca()
	{
		$data["hslquery"] = $this->Database_model->gettblteman();
		$data["title"] = "Baca Table Dengan Model dan View";

		$this->load->view("database/database_view", $data);
	}

	/*
	* Mengubah Objek Record menjadi Array Record
	*/
	function arrayrecord()
	{
		$data["hslquery"] = $this->Database_model->gettblteman();
		$data["title"] = "Baca Table Diproses Dengan Array";

		$this->load->view("database/array_view", $data);
	}

	/*
	* Mengurutkan data
	*/
	function urutdata()
	{
		$data["hslquery"] = $this->Database_model->urutdatateman();
		$data["title"] = "Baca Tabel dengan Diurut DESC";

		$this->load->view("database/array_view", $data);
	}

	/*
	* Mengakses data dengan fungsi row()
	*/
	function usingrow()
	{
		$data["hslquery"] = $this->Database_model->gettblteman();
		$data["title"] = "Baca Table Tampil Dengan Fungsi row()";

		$this->load->view("database/usingrow_view", $data);
	}

	/*
	* Menampilkan data dengan limit (batasan jumlah data yang ditampilkan)
	*/
	function bacalimit($n=1)
	{
		$data["hslquery"] = $this->Database_model->gettemanlimit($n);
		$data["title"] = "Baca Table Dengan LIMIT $n";

		$this->load->view("database/array_view", $data);
	}

	
}

?>