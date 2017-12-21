<?php

/**
* Controller 22 : CRUD
*/
class Crud_controller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('html', 'form', 'url', 'text'));
		$this->load->model('database/crud_model');
	}

	/*
	* Fungsi pembentukan form input
	*/
	function formadd()
	{
		$data = $this->crud_model->defform(); 

		$data["title"] = "Tambah Data";
		$data["scriptaksi"] = "database/crud_controller/tambahdariform";

		$this->load->view("database/crud_form", $data);
	}

	/*
	* Proses data dari form
	*/
	function tambahdariform()
	{
		$adata = $this->crud_model->readinput();
		
		$data["hslquery"] = $this->crud_model->tambah($adata);

		// Blok mengisi atribut value form dengan data hasil query
			$data["adata"]["noteman"] = $adata["noteman"];
			$data["adata"]["namateman"] = $adata["namateman"];
			$data["adata"]["notelp"] = $adata["notelp"];
			$data["adata"]["email"] = $adata["email"];
		// akhir blok
		
		$data["title"] = "Hasil Proses Tambah Data";
		$data["message"] = ($data["hslquery"])?"Berhasil ditambahkan!":"Gagal ditambahkan!";

		$this->load->view("database/crud_message", $data);
	}

	/*
	* Menampilkan form pencarian data berdasarkan nomor teman
	*/
	function getnoteman($aksi="update")
	{
		$data["aksi"] = $aksi;

		$data["title"] = "Masukkan nomor teman untuk di $aksi";
		$data["scriptaksi"] = "database/crud_controller/form$aksi";

		$this->load->view("database/getnoteman_view", $data);
	}

	/*
	* Proses pencarian data teman berdasarkan nomor teman yang diinputkan
	* dan menampilkannya dalam form untuk diUPDATE.
	*/
	function formupdate()
	{
		$noteman = $this->input->post("noteman");
		$jrow = 0;
		if (!empty($noteman)) {
			$hslquery = $this->crud_model->getrecord($noteman);
			$jrow = $hslquery->num_rows();
		}

		if ($jrow>0) {
			$data = $this->crud_model->defform();

			// Blok mengisi atribut value form dengan data hasil query
				$row = $hslquery->row_array(0); // dijadikan array
				$data["noteman"]["value"] = $row["noteman"];
				$data["namateman"]["value"] = $row["namateman"];
				$data["notelp"]["value"] = $row["notelp"];
				$data["email"]["value"] = $row["email"];
			// akhir blok

			$data["title"] = "Update Data";
			$data["scriptaksi"] = "database/crud_controller/updatedariform";

			$this->load->view("database/crud_form", $data);
		}
		else {
			$this->getnoteman("update");
		}
	}

	/*
	* Proses UPDATE data
	*/
	function updatedariform()
	{
		$adata = $this->crud_model->readinput();
		$data["hslquery"] = $this->crud_model->update($adata);

		// Blok mengisi atribut value form dengan data hasil query
			$data["adata"]["noteman"] = $adata["noteman"];
			$data["adata"]["namateman"] = $adata["namateman"];
			$data["adata"]["notelp"] = $adata["notelp"];
			$data["adata"]["email"] = $adata["email"];
		// akhir blok

		$data["title"] = "Update Data";
		$data["message"] = ($data["hslquery"])?"Berhasil diupdate!":"Gagal diupdate!";

		$this->load->view("database/crud_message", $data);
	}

	/*
	* Proses pencarian data teman berdasarkan nomor teman yang diinputkan
	* dan menampilkannya dalam form untuk diDELETE.
	*/
	function formdelete()
	{
		$noteman = $this->input->post("noteman");
		$jrow = 0;
		if (!empty($noteman)) {
			$hslquery = $this->crud_model->getrecord($noteman);
			$jrow = $hslquery->num_rows();
		}

		if ($jrow>0) {
			// Blok mengisi atribut value form dengan data hasil query
				$row = $hslquery->row_array(0); // dijadikan array
				$data["noteman"] = $row["noteman"];
				$data["namateman"] = $row["namateman"];
				$data["notelp"] = $row["notelp"];
				$data["email"] = $row["email"];
			// akhir blok

			$data["title"] = "Delete Data";
			$data["scriptaksi"] = "database/crud_controller/deletedariform";

			$this->load->view("database/crud_todel", $data);
		}
		else {
			$this->getnoteman("delete");
		}
	}

	/*
	* Proses DELETE data
	*/
	function deletedariform()
	{
		$btnDel = $this->input->post("btnDel");
		$data["noteman"] = $this->input->post("noteman");

		if ($btnDel=="Delete") {
			$hslquery = $this->crud_model->getrecord($data["noteman"]);
			// Blok mengisi atribut value form dengan data hasil query
				$row = $hslquery->row_array(0); // dijadikan array
				$data["adata"]["noteman"] = $row["noteman"];
				$data["adata"]["namateman"] = $row["namateman"];
				$data["adata"]["notelp"] = $row["notelp"];
				$data["adata"]["email"] = $row["email"];
			// akhir blok
			$data["hslquery"] = $this->crud_model->delete($data["noteman"]);
			
			$data["title"] = "Delete Data";
			$data["message"] = ($data["hslquery"])?"Berhasil didelete!":"Gagal didelete!";

			$this->load->view("database/crud_message", $data);
		}
		else {
			$this->getnoteman("delete");
		}
	}
}

?>