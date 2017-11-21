<?php

/**
*	Helper 1 : Perluasan helper tanggal (date_helper)
*/

if (!defined('BASEPATH')) exit('No direct script access allowed');

function namabulan($nobulan="")
{
	$bulan = array(
			"01"	=> "Januari",
			"02"	=> "Februari",
			"03"	=> "Maret",
			"04"	=> "April",
			"05"	=> "Mei",
			"06"	=> "Juni",
			"07"	=> "Juli",
			"08"	=> "Agustus",
			"09"	=> "September",
			"10"	=> "Oktober",
			"11"	=> "November",
			"12"	=> "Desember"
		);

	$keys_bulan = array_keys($bulan);
	$retval = (in_array($nobulan, $keys_bulan))?$bulan[$nobulan]:false;

	return $retval;
}

function namahari($nohari=-1)
{
	$hari = array(
			"Minggu",
			"Senin",
			"Selasa",
			"Rabu",
			"Kamis",
			"Jumat",
			"Sabtu"
		);

	$retval = (($nohari>=0) && ($nohari<=6))?$hari[$nohari]:false;

	return $retval;
}

?>