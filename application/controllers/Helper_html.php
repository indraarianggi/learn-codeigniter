<?php

/**
* Controller 9 : Helper html
*/
class Helper_html extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
	}

	public function html() {
		// Doctype
		$data["doctype"] = "html5";

		// Meta dokumen
		$data["metadoc"] = array(
			array('name' => 'robots', 'content' => 'no-cache'), 
			array('name' => 'keywords', 'content' => 'kamus, nusantara'),
			array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
		);

		// CSS
		$data["link_css"] = array(
			'href'	=>	'assets/css/dummy_css.css',
			'rel'	=>	'stylesheet',
			'type'	=>	'text/css',
			'media'	=>	'print'
		);

		// Heading
		$data["heading"] = "Belajar Helper HTML";

		// Image
		$data["image"] = array(
			'src'	=>	'assets/image/dummy_image.png',
			'alt'	=>	'Bug Image - For example',
			'width'	=>	'200',
			'height'	=> '200',
			'title'	=>	'Bug Image'
		);



		$this->load->view("helper_html", $data);
	}
}

?>