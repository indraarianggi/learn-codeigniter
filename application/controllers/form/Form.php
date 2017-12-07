<?php

/**
* Controller 11 : Form dalam CodeIgniter
*/

class Form extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper('html');
		$this->load->helper('form'); // !!!
		$this->load->helper('text');
	}

	public function with_helper()
	{
		$data["title"] = "Form Login dengan helper";
		$this->load->view('form/form_view', $data);
	}

	public function form_attribute()
	{
		$data["title"] = "Form Login dengan attribut";

		// Definisi elemen (atribut) form
		$data["username"] = array(
			"name"		=> "username",
			"id"		=> "username",
			"maxlength"	=> "15",
			"size"		=> "10",
			"style"		=> "background : cyan;"
		);

		$data["password"] = array(
			"name"		=> "userpass",
			"class"		=> "userpass",
			"maxlength"	=> "15",
			"size"		=> "10",
			"style"		=> "background : red;"
		);

		$this->load->view('form/form_attribute_view', $data);
	}

	public function frommodel()
	{
		// Load model tempat pendefinisian form
		$this->load->model("Form_model");

		// Akses fungsi formuser() dalam model
		$data = $this->Form_model->formuser();

		$data["title"] = "Form Login : From Model";

		$this->load->view("form/form_model_view", $data);
	}

	public function formelement()
	{
		// Load model tempat pendefinisian form
		$this->load->model("Form_model");

		// Akses fungsi formcomplete() dalam model
		$data = $this->Form_model->formcomplete();

		$data["title"] = "Semua Element Form";

		$this->load->view("form/form_complete_view", $data);
	}
}