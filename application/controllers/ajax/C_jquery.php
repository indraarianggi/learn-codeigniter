<?php

/**
* Controller 31 : Web Sederhana dengan JQuery.
*/

class C_jquery extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'html', 'form', 'text'));
	}

	function simple()
	{
		$data["title"] = "Demo Simple jQuery";
		$data["dview"] = "ajax/demojquery/v_jquery_simple";

		$this->load->view("ajax/demojquery/v_jquery_layout", $data); 
	}

	function simpleajax()
	{
		$data["title"] = "Demo Simple AJAX Dengan jQuery";
		$data["dview"] = "ajax/demojquery/v_jquery_simpleajax";

		$this->load->view("ajax/demojquery/v_jquery_layout", $data);
	}

	function simpleload()
	{
		echo "Hai.. Ini dari " . current_url();
	}

	function ajaxajax()
	{
		echo "Hai.. Ini dari " . current_url();
	}

	function crud()
	{
		$data["title"] = "CRUD and jQuery";
		$data["dview"] = "ajax/crud/v_jquery_crud";

		$this->load->view("ajax/demojquery/v_jquery_layout", $data);
	}

	function crudbrowse()
	{
		$this->load->model("activerecord/Activerecord_model", "Tabel");

		$data["hslquery"] = $this->Tabel->getallrecord();
		$data["title"] = "List Of Data Teman";
		$data["scriptaksi"] = "activerecord/Active_record/showgrid";
		$data["scriptupdate"] = "activerecord/Active_record/showrecto/update";
		$data["scriptdelete"] = "activerecord/Active_record/showrecto/delete";
		$data["dview"] = "ajax/crud/v_jquery_grid";

		$this->load->view($data["dview"], $data);
	}

	function crudadd() {
		$this->load->model("activerecord/Activerecord_model", "Tabel");

		$data = $this->Tabel->defform();

		$aksi = "add";
		$data["title"] = "$aksi Data";
		$data["aksi"] = $aksi;
		$data["scriptaksi"] = "ajax/c_jquery/$aksi"."data";
		

		$this->showform($aksi, $data);
	}

	function showform($aksi="add", $data=array())
	{
		$this->load->view("ajax/crud/v_jquery_form", $data);
	}

	function adddata()
	{
		$this->load->model("activerecord/Activerecord_model", "Tabel");

		$data = $this->Tabel->readinput();
		
		$data["hslquery"] = $this->Tabel->addrec($data);

		echo ($data["hslquery"])?"Berhasil ditambahkan!":"Gagal ditambahkan!";
	}

	function showrecto($aksi="update")
	{
		$this->load->model("activerecord/Activerecord_model", "Tabel");

		$data["noteman"] = $this->input->post("noteman");
		$jrow=0;

		if(!empty($data["noteman"])) {
			$hslquery = $this->Tabel->getrecord($data);
			$jrow = $hslquery->num_rows();
		}
		
		// print_r($hslquery);
		if($jrow>0) {
			$data = $this->Tabel->defform();
			$row = $hslquery->row_array(0);

			$data["noteman"]["value"] = $row["noteman"];
			$data["namateman"]["value"] = $row["namateman"];
			$data["notelp"]["value"] = $row["notelp"];
			$data["email"]["value"] = $row["email"];

			$data["title"] = "$aksi Data";
			$data["aksi"] = $aksi;
			$data["scriptaksi"] = "ajax/c_jquery/$aksi" . "data";
			$this->showform($aksi, $data);
		}
		else {
			echo "Data sudah tidak ada!";
		}
	}

	function updatedata()
	{
		$this->load->model("activerecord/Activerecord_model", "Tabel");

		$data["adata"] = $this->Tabel->readinput();
		$data["hslquery"] = $this->Tabel->updaterec($data["adata"]);
		$data["title"] = "Update Data";

		echo ($data["hslquery"])?"Berhasil diupdate!":"Gagal diupdate!";
	}

	function deletedata()
	{
		$this->load->model("activerecord/Activerecord_model", "Tabel");

		$data["adata"] = $this->Tabel->readinput();
		$data["hslquery"] = $this->Tabel->deleterec($data["adata"]);

		echo ($data["hslquery"])?"Berhasil dihapus!":"Gagal dihapus!";
	}


	/*
		MENGGUNAKAN FUNGSI CLASS JAVASCRIPT YANG DISEDIAKAN CODEIGNITER
	*/
	function classjs()
	{
		// Load library JavaScript
		$this->load->library("javascript");

		$data["title"] = "Event Dari Lib Class jQuery";

		$this->load->view("ajax/libjs/v_jquery_classjs", $data);
	}
}

?>