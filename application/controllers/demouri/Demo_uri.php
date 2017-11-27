<?php

/**
* Controller 5 : URI dan Segmentasi
*/

class Demo_uri extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('html');
	}
	
	function showuriseg()
	{
		$data = [
			"stringUri" => $this->uri->uri_string(),
			"jlhSegment" => $this->uri->total_segments()
		];

		$this->load->view('demouri/uriseg_view', $data);
	}

	function showurluri()
	{
		$this->load->helper('url');

		$data = [
			"baseUrl"	=> base_url(),
			"siteUrl"	=> site_url(),
			"stringUri"	=> $this->uri->uri_string(),
			"jlhSegmen"	=> $this->uri->total_segments()
		];

		$this->load->view('demouri/url_view', $data);
	}
}