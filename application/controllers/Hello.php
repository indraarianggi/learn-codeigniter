<?php

/**
*	Controller 1 : Hello World!
*/

class Hello extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Hello_model');
	}

	// fungsi hello dengan paramenter default 'EN'
	public function hello($langid='EN')
	{
		$data = [
			"hallo" => $this->Hello_model->katakan($langid)
		];

		$this->load->view('Hello_view', $data);
	}
}

?>