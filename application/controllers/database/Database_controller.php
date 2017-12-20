<?php

/**
* Controller 17 : Database dalam CodeIgniter
*/

class Database_Controller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array("html", "form", "url", "text"));
	}

	function cekkoneksi()
	{
		// Konfigurasi database manual tanpa file konfigurasi database.php
		$config['hostname'] = "localhost";
		$config['dbdriver'] = "mysqli";
		$config['database'] = "lat_ci";
		$config['username'] = "root";
		$config['password'] = "";
		$config['db_debug'] = TRUE;

		$koneksi = $this->load->database($config);

		if ($koneksi) {
			echo "DB OK";
		} else {
			echo "Err DB Connection!";
		}
		
	}
}

?>