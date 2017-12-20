<?php

/**
* Controller 20 : Pagination
*/

class Pagination extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('html', 'form', 'url', 'text'));
		$this->load->model("database/Pagination_model");
	}

	/**
	* @param $p adalah nomor record awal yang akan ditampilkan di tiap halaman
	* @var $jppage adalah jumlah record/data yang ditampilkan di satu halaman
	*/
	function page($p=0)
	{
		$jppage = 3;

		$this->load->library('pagination');

		$setting['base_url'] = site_url('database/pagination/page');
		$setting['total_rows'] = $this->Pagination_model->getjrecord();
		$setting['per_page'] = $jppage;

		$this->pagination->initialize($setting);

		$data['pagination'] = $this->pagination->create_links();
		
		$data['hslquery'] = $this->Pagination_model->gettemanpage($p, $jppage);
		$data['title'] = "Baca Table Dengan Pagination";

		$this->load->view("database/pagination_view", $data);
	}
}

?>