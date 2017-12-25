<?php

/**
* Model 7 : Active Record CodeIgniter
*/

class Activerecord_model extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		
		$config["hostname"] = "localhost";
		$config["dbdriver"] = "mysqli";
		$config["database"] = "lat_ci";
		$config["username"] = "root";
		$config["password"] = "";

		$this->load->database($config);
	}

	/*
		Menampilkan seluruh field yang ada.
	*/
	function getallrecord()
	{
		return $this->db->get("tblteman");
		// fungsi get("namatable") adalah active record ci
	}

	/*
		Menampilkan field tertentu (nama dan email)
	*/
	function getnamaemail()
	{
		// Pilih field yang akan ditampilkan
		$this->db->select("namateman, email");
		// Pilih tabel yang dituju
		$this->db->from("tblteman");

		$hslquery = $this->db->get();

		/* ATAU DENGAN INI
		$this->db->select("namateman, email");
		$hslquery = $this->db->$this->db->get("tblteman");
		*/

		return $hslquery;

	}

	/*
		Membaca inputan form
	*/
	function readfilter()
	{
		$field = $this->input->post("namafield");
		$value = $this->input->post("valfilter");

		return array(
				"field" => $field,
				"value" => $value
			);
	}

	/*
		Menampilkan data tertentu dengan filter
	*/
	function getfilteredrec($data)
	{
		$this->db->like($data["field"], $data["value"]);

		return $this->db->get("tblteman");
	}

	/*
		Definisi form untuk INSERT
	*/
	function defform()
	{
		// Definisi elemen form untuk data teman
		$noteman = array(
				"name"		=> "noteman",
				"id"		=> "noteman",
				"maxlenght"	=> "4",
				"size"		=> "3",
				"value"		=> "",
				"style"		=> "background:red;"
			);

		$namateman = array(
				"name"		=> "namateman",
				"id"		=> "namateman",
				"maxlenght"	=> "50",
				"size"		=> "35",
				"value"		=> "",
				"style"		=> "background:cyan;"
			);

		$notelp = array(
				"name"		=> "notelp",
				"id"		=> "notelp",
				"maxlenght"	=> "15",
				"size"		=> "13",
				"value"		=> "",
				"style"		=> "background:cyan;"
			);

		$email = array(
				"name"		=> "email",
				"id"		=> "email",
				"maxlenght"	=> "35",
				"size"		=> "25",
				"value"		=> "",
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
		Baca data input dari form
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
		Insert data ke database
	*/
	function addrec($arec)
	{
		$this->db->insert("tblteman", $arec);

		return (($this->db->affected_rows() > 0)?TRUE:FALSE);
	}

	/*
		Membaca data berdasarkan nomor teman
	*/
	function getrecord($data)
	{
		$this->db->where($data);

		return $this->db->get("tblteman");
	}

	/*
		UPDATE data di database
	*/
	function updaterec($adata)
	{
		$this->db->where("noteman", $adata["noteman"]);
		$this->db->update("tblteman", $adata);

		return (($this->db->affected_rows() > 0)?TRUE:FALSE);
	}

	/*
		DELETE data d database
	*/
	function deleterec($adata)
	{
		$this->db->where("noteman", $adata["noteman"]);
		$this->db->delete("tblteman");

		/* ATAU BISA JUGA DENGAN INI
		$kriteria = array("noteman" => $adata["noteman"]);
		$this->db->delete("tblteman", $kriteria);
		return (($this->db->affected_rows() > 0)?TRUE:FALSE);
		*/

		return (($this->db->affected_rows() > 0)?TRUE:FALSE);
	}

}

?>