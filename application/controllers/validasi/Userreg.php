<?php

/**
* Controller 14 : Validasi Data Form
*/

class Userreg extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array("html", "form", "url", "text"));
	}

	function form()
	{
		$this->load->library("form_validation");
		$this->load->model("validasi/Userreg_model");

		$data = $this->Userreg_model->userdef();

		/*//================ PROSES VALIDASI FORM ================
		$this->form_validation->set_rules('username', 'Nama user', 'required|trim|min_length[5]|max_length[15]');

		$this->form_validation->set_rules('userpass', 'Password', 'required|trim');

		$this->form_validation->set_rules('konfpass', 'Konfirmasi password', 'required|trim|matches[userpass]');

		$this->form_validation->set_rules('useremail', 'Email', 'required|trim|valid_email');

		//======================================================*/

		//================ PROSES VALIDASI FORM (ALTERNATIF LAIN) ================
		//Proses validasi dalam bentuk array asosiatif (lihat di Userreg_model.php)
		$userrules = $this->Userreg_model->userrules();
		$this->form_validation->set_rules($userrules);

		//========================================================================

		$data["aksi"] = "validasi/Userreg/form";

		if($this->form_validation->run() == FALSE) {
			$data["judul"]= "Registrasi Pengguna";
			$this->load->view("validasi/userreg_form", $data);
		}
		else {
			$data["judul"]= "Registrasi Berhasil Dilakukan";
			$this->load->view("validasi/userreg_sukses", $data);
		}
	}
}

?>