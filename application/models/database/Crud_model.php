<?php

/**
* Model 6 : CRUD
*/

class Crud_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();

		$config['hostname'] = "localhost";
		$config['dbdriver'] = "mysqli";
		$config['database'] = "lat_ci";
		$config['username'] = "root";
		$config['password'] = "";

		$this->load->database($config);
	}

	/*
	* Definisi elemen input form
	*/
	function defform()
	{
		// Definisi elemen form untuk data teman
		$noteman = array(
				"name"		=> "noteman",
				"id"		=> "noteman",
				"maxlenght"	=> "4",
				"size"		=> "3",
				"value"		=> $this->input->post("noteman"),
				"style"		=> "background:red;"
			);

		$namateman = array(
				"name"		=> "namateman",
				"id"		=> "namateman",
				"maxlenght"	=> "50",
				"size"		=> "35",
				"value"		=> $this->input->post("namateman"),
				"style"		=> "background:cyan;"
			);

		$notelp = array(
				"name"		=> "notelp",
				"id"		=> "notelp",
				"maxlenght"	=> "15",
				"size"		=> "13",
				"value"		=> $this->input->post("notelp"),
				"style"		=> "background:cyan;"
			);

		$email = array(
				"name"		=> "email",
				"id"		=> "email",
				"maxlenght"	=> "35",
				"size"		=> "25",
				"value"		=> $this->input->post("email"),
				"style"		=> "background:cayn;"
			);
		// end definisi

		$atableteman = [
			"noteman"	=> $noteman,
			"namateman"	=> $namateman,
			"notelp"	=> $notelp,
			"email"		=> $email
		];

		return $atableteman;
	}

	/*
	* Baca data yang diinputkan di form
	*/
	function readinput()
	{
		$temanbaru = [
			"noteman"	=> $this->input->post("noteman"),
			"namateman"	=> $this->input->post("namateman"),
			"notelp"	=> $this->input->post("notelp"),
			"email"		=> $this->input->post("email")
		];

		return $temanbaru;
	}

	/*
	* Insert data ke database
	*/
	function tambah($adata)
	{
		$daftarfield = "(";
		$daftarnilai = "(";

		$i = 0;
		foreach ($adata as $field => $value) {
			if($i>0) {
				$daftarfield .= ",";
				$daftarnilai .= ",";
			}
			$daftarfield .= $field;
			$daftarnilai .= "'". $value . "'";
			$i++;
		}
		$daftarfield .= ")";
		$daftarnilai .= ")";

		$sqlstr = "insert into tblteman " . $daftarfield . " values " . $daftarnilai;
		$this->db->query($sqlstr);

		return (($this->db->affected_rows()>0)?TRUE:FALSE);
	}

	/*
	* Baca data di database berdasarkan nomor teman
	*/
	function getrecord($noteman)
	{
		$sqlstr = "select * from tblteman where noteman = $noteman";
		$hslquery = $this->db->query($sqlstr);

		return $hslquery;
	}

	/*
	* UPDATE data di database
	*/
	function update($adata)
	{
		$fieldnilai = "";
		$i = 0;
		foreach ($adata as $field => $value) {
			if ($i>0) $fieldnilai .= ",";
			$fieldnilai .= "$field = '$value'";
			$i++;
		}

		$sqlstr = "update tblteman set " . $fieldnilai . "where noteman = " .$adata["noteman"];
		$this->db->query($sqlstr);

		return (($this->db->affected_rows() > 0)?TRUE:FALSE);
	}

	/*
	* DELETE data di database
	*/
	function delete($noteman)
	{
		$sqlstr = "delete from tblteman where noteman = $noteman";
		$this->db->query($sqlstr);

		return (($this->db->affected_rows() > 0)?TRUE:FALSE);
	}
}

?>