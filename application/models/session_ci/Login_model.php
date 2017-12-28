<?php

/**
* Model 9 : Implementasi Session dalam CodeIgniter
*/

class Login_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function readinput()
	{
		$auser["username"] = $this->input->post("username");;
		$auser["userpass"] = $this->input->post("userpass");;

		return $auser;
	}

	function cekuser($username, $userpass)
	{
		if(($username=="admin")&&($userpass=="admin")) { // pemeriksaan masih manual, belum menggunakan  database
			$retval = true;
		}
		else {
			$retval = false; // retval => return value
		}

		return $retval;
	}
}