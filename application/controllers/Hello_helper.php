<?php

/**
* Controller 2 : Hello World! dengan Menggunakan Helper
*/

class Hello_helper extends CI_Controller
{
	// Without load the helper.
	public function noloadhelper() {
		$this->load->model('Hello_model');

		$title = "Daftar Bahasa dan Kosa Kalimat";
		$data = [
			"title"		=> $title,
			"bahasa"	=> $this->Hello_model->bahasa,
			"kata"		=> $this->Hello_model->kata
		];

		$this->load->view('hello_helper', $data);
	}

	// With load the helper.
	public function withloadhelper() {
		// Load helper html.
		$this->load->helper('html');

		// Load model.
		$this->load->model('Hello_model');

		$title = "Daftar Bahasa dan Kosa Kalimat";
		$data = [
			"title"		=> $title,
			"bahasa"	=> $this->Hello_model->bahasa,
			"kata"		=> $this->Hello_model->kata
		];

		// Load view with sending the data.
		$this->load->view('hello_helper', $data);
	}
}

?>