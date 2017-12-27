<?php

/**
* Controller 27 : Upload File
*/

class Upload extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('html', 'form', 'url', 'text'));
	}

	/*
		Menampilkan form untuk upload file.
	*/
	function index($data=array())
	{
		$data["title"] = "Demo Upload File";
		$data["scriptaksi"] = "upload_download/upload/uploadfile";
		$data["aksi"] = "Upload";
		$data["error"] = (isset($data["error"]))?$data["error"]:"";

		$this->load->view("upload_download/upload_view_file", $data);
	}

	/*
		Proses upload file.
	*/
	function uploadfile()
	{
		$config["upload_path"]	= './assets/upload';
		$config["allowed_types"]	= 'gif|jpg|png|pdf';
		$config["overwrite"]	= TRUE; // jika nama file sama, maka akan ditimpa (overwrite)
		$config["max_size"]		= '20000000';
		$config["max_width"]	= '1024';
		$config["max_height"]	= '768';

		$this->load->library('upload', $config);
		// $this->upload->initialize($config);

		if(!$this->upload->do_upload('afile')) { // afile => atribut name pada elemen input html
			$error = array('error' => $this->upload->display_errors());
			$this->index($error);
		}
		else {
			$data = array('upload_data' => $this->upload->data());
			$data["title"] = "Demo Upload File";

			$this->load->view("upload_download/upload_hasil", $data);
		}
	}

	
}

?>