<?php

/**
* Model 4 : Membaca dan Menampilkan Data dengan Model MVC
*			Filter
*/

class Database_model extends CI_Model
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

	function gettblteman()
	{
		$sqlstr = "select * from tblteman";
		$hslquery = $this->db->query($sqlstr);

		return $hslquery;
	}

	function urutdatateman()
	{
		$sqlstr = "select * from tblteman order by namateman DESC";
		$hslquery = $this->db->query($sqlstr);

		return $hslquery;
	}

	function gettemanlimit($n)
	{
		$sqlstr = "select * from tblteman LIMIT $n";
		$hslquery = $this->db->query($sqlstr);

		return $hslquery;
	}

	function filterteman($namateman)
	{
		$sqlstr = "select * from tblteman where namateman LIKE '%$namateman%'";
		$hslquery = $this->db->query($sqlstr);

		return $hslquery;
	}
}

?>