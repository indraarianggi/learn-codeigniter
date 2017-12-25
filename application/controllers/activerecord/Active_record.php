<?php

/**
* Controller 23 : Active Record CodeIgniter
*/

class Active_record extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('html', 'form', 'url', 'text'));

		$this->load->model("activerecord/activerecord_model", "tabel");
		// => "tabel" adalah nama alias dari model activerecord_model
	}

	/*
		Menampilkan seluruh field yang ada.
	*/
	function showallrecord()
	{
		$data["hslquery"] = $this->tabel->getallrecord();

		$data["title"] = "Show All With Active Record";

		$this->load->view("activerecord/allrecord_view", $data);
	}

	/*
		Menampilkan field tertentu (nama dan email)
	*/
	function shownamaemail()
	{
		$data["hslquery"] = $this->tabel->getnamaemail();
		$data["title"] = "Show Nama & Email With Active Record";

		$this->load->view("activerecord/namaemail_view", $data);
	}

	/*
		Menampilkan data tertentu dengan filter
	*/
	function showfilter()
	{
		$data = $this->tabel->readfilter();
		$data["hslquery"] = $this->tabel->getfilteredrec($data);

		$data["title"] = "Input Filter Untuk Active Record";
		$data["scriptaksi"] = "activerecord/active_record/showfilter";

		$this->load->view("activerecord/filter_form", $data);
	}

	/*
		Menampilkan form untuk INSERT
	*/
	function showform($aksi="add")
	{
		$data = $this->tabel->defform();

		$data["title"] = "$aksi Data";
		$data["aksi"] = $aksi;
		$data["scriptaksi"] = "activerecord/active_record/$aksi"."data";

		$this->load->view("activerecord/crud_form", $data);
	}

	/*
		Proses Insert Data
	*/
	function adddata()
	{
		$data["adata"] = $this->tabel->readinput();
		$data["hslquery"] = $this->tabel->addrec($data["adata"]);

		$data["title"] = "Add Data";
		$data["message"] = ($data["hslquery"])?"Berhasil ditambahkan!":"Gagal ditambahkan!";

		$this->load->view("activerecord/crud_message", $data);
	}

	/*
		Menampilkan form untuk input nomor teman
		untuk keperluan UPDATE atau DELETE
	*/
	function findrecto($aksi="update")
	{
		$data["aksi"] = $aksi;
		$data["title"] = "Find data to $aksi";
		$data["scriptaksi"] = "activerecord/active_record/showrecto/$aksi";

		$this->load->view("activerecord/getnoteman_view", $data);
	}

	/*
		Proses menampilkan data hasil pencarian berdasar nomor teman
		Untuk keperluan UPDATE atau DELETE
	*/
	function showrecto($aksi="update")
	{
		$data["noteman"] = $this->input->post("noteman");
		$jrow = 0;

		if(!empty($data["noteman"])) {
			$hslquery = $this->tabel->getrecord($data);
			$jrow = $hslquery->num_rows();
		}

		if($jrow>0) {
			$data = $this->tabel->defform();
			// Blok mengisi atribut value form dengan data hasil query
				$row = $hslquery->row_array(0); // dijadikan array
				$data["noteman"]["value"] = $row["noteman"];
				$data["namateman"]["value"] = $row["namateman"];
				$data["notelp"]["value"] = $row["notelp"];
				$data["email"]["value"] = $row["email"];
			// akhir blok

			$data["title"] = "$aksi Data";
			$data["aksi"] = $aksi;
			$data["scriptaksi"] = "activerecord/active_record/$aksi"."data";

			$this->load->view("activerecord/crud_form", $data);
		}
		else {
			$this->findrecto($aksi);
		}
	}

	/*
		Proses UPDATE data
	*/
	function updatedata()
	{
		$data["adata"] = $this->tabel->readinput();
		$data["hslquery"] = $this->tabel->updaterec($data["adata"]);

		$data["title"] = "Update Data";
		$data["message"] = ($data["hslquery"])?"Berhasil diupdate!":"Gagal diupdate!";

		$this->load->view("activerecord/crud_message", $data);
	}

	/*
		Proses DELETE data
	*/
	function deletedata()
	{
		$data["adata"] = $this->tabel->readinput();
		$data["hslquery"] = $this->tabel->deleterec($data["adata"]);

		$data["title"] = "Delete Data";
		$data["message"] = ($data["hslquery"])?"Berhasil didelete!":"Gagal didelete!";

		$this->load->view("activerecord/crud_message", $data);
	}

	function showgrid()
	{
		$data = $this->tabel->readfilter();
		$data["hslquery"] = $this->tabel->getfilteredrec($data);

		$data["title"] = "Filter Data dan Grid";
		$data["scriptaksi"] = "activerecord/active_record/showgrid";
		$data["scriptupdate"] = "activerecord/active_record/showrecto/update";
		$data["scriptdelete"] = "activerecord/active_record/showrecto/delete";

		$this->load->view("activerecord/crud_grid", $data);
	}
}

?>