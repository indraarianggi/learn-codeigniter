<?php

if(!defined('BASEPATH')) exit('No direct script access allowed');

/**
* Library 1 : Validasi Data Form (Menambah Rule Baru)
*/

class MY_Form_validation extends CI_Form_validation
{
	
	function __construct()
	{
		parent::__construct();
	}

	/**
	*
	* valid_alfanumeric : memeriksa data dengan menggunakan
	* reguler expression hanya data : a-z,  A-Z, 0-9, dan _ yang diizinkan,
	* sedangkan karakter - tidak diperbolehkan
	*
	* @param strinf $username the username to be validated
	* @return boolean
	*
	*/
	public function valid_username($username)
	{
		return ((preg_match("/^[a-zA-Z0-9_] +$/", $username))?true:false);
	}

	/**
	* 
	* Untuk definisi pesan kesalahan yang akan ditampilkan lihat di direktori system/language/english
	* file : form_validartion_lang.php
	* lihat kode baris terakhir (paling bawah)
	*/
}

?>