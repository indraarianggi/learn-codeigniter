<?php

/**
* Model 5 : Pagination
*/

class Pagination_model extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();

		$setting['hostname'] = "localhost";
		$setting['dbdriver'] = "mysqli";
		$setting['database'] = "lat_ci";
		$setting['username'] = "root";
		$setting['password'] = "";

		$this->load->database($setting);
	}

	function getjrecord()
	{
		$jrec = $this->db->count_all("tblteman");
		return $jrec;
	}

	/**
	* @param $p adalah nomor record awal yang akan ditampilkan di tiap halaman
	* @var $jppage adalah jumlah record/data yang ditampilkan di satu halaman
	*/
	function gettemanpage($p=0, $jppage=3)
	{
		$sqlstr = "select * from tblteman";
		$sqlstr .= " limit $p, $jppage";

		$hslquery = $this->db->query($sqlstr);

		return $hslquery;
	}
}

?>