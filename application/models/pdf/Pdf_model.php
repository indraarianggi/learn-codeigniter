<?php

/**
* Model 10 : PDF
*/

class Pdf_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();

		$config['hostname'] = "localhost";
		$config['dbdriver'] = "mysqli";
		$config['database'] = "lat_ci";
		$config['username'] = "root";
		$config['password'] = "";

		$this->load->database($config);
	}

	public function view_row()
	{
		return $this->db->get("tblteman");
	}
}

?>