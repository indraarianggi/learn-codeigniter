<?php

/**
* Controller 21 : Filter
*/

class Filter extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('html', 'form', 'url', 'text'));
		$this->load->model('database/Database_model');
	}

	function filterteman()
	{
		$data["namateman"] = $this->input->post("namateman");
		$data["hslquery"] = $this->Database_model->filterteman($data["namateman"]);
		$data["title"] = "Filter Teman Interaktif";

		$this->load->view("database/filter_view", $data);
	}
}

?>