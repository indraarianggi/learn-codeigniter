<?php

/**
* Controller 12 : Input dan Pemfilteran dalam CI
*/

class Login extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->helper('text');
	}

	// menampilkan form
	function showform()
	{
		$this->load->model('Form_model');

		$data = $this->Form_model->formuser();

		// atribut aksi untuk form
		$data["aksi"] = "Login/formaction";

		$data["judul"] = "Login With Helper";

		$this->load->view("form/login_showform", $data);
	}

	function formaction()
	{
		$data["judul"] = "Baca Data Dari Form Dengan Helper";

		// Membaca input form dengan helper
		$data["username"] = $this->input->post("username");
		$data["userpass"] = $this->input->post("userpass");

		$this->load->view("form/login_showform_result", $data);
	}

	function newform() {
		$this->load->helper('url');
		$this->load->model('Form_model');

		$data = $this->Form_model->formuser();

		$data["errmessage"] = $this->Form_model->cekuser($data["username"]["value"], 
			$data["userpass"]["value"]);

		if ($data["errmessage"]=="Sukses!") {
			redirect("Hello/hello");
		} else {
			$data["aksi"] = "Login/newform";
			$data["judul"] = "Login To Get The Application";
			$this->load->view("form/formlogin_message", $data);
		}
	}
}

?>