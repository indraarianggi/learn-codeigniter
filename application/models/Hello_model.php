<?php

/**
* Model 1 : Hello World!
*			Hello World! dengan Menggunakan Helper
*/

class Hello_model extends CI_Model
{
	
	var $hallo = "Hello World!";
	var $bahasa = [
		"EN"	=> "Inggris",
		"ID"	=> "Indonesia",
		"AR"	=> "Arabian"
	];
	var $kata = [
		"EN"	=> "Hello World!",
		"ID"	=> "Halo Dunia!",
		"AR"	=> "Ahlan Dunia!"	
	];

	public function katakan($langid)
	{
		$langid = strtoupper($langid);

		// mengambil semua key di dalam array bahasa
		$keys = array_keys($this->bahasa);

		// mencocokan id bahasa yang diinputkan dengan yang ada di array bahasa
		// jika belum terdaftar dianggap idnya "EN"
		$langid = in_array($langid, $keys)?$langid:"EN";
		
		$kalimat = $this->bahasa[$langid] . " >> " . $this->kata[$langid];

		return $kalimat;
	}
}

?>