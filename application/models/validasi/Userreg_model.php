<?php

/**
* Model 3 : Validasi Data Form
*/

class Userreg_model extends CI_Model
{
	
	function userdef()
	{
		// Definisi elemen form untuk definisi user
		$username = array(
				"name"		=> "username",
				"id"		=> "Username",
				"maxlength"	=> "15",
				"size"		=> "10",
				"value"		=> $this->input->post("username"),
				"style"		=> "background: cyan;"
			);

		$userpass = array(
				"name"		=> "userpass",
				"id"		=> "userpass",
				"maxlength"	=> "15",
				"size"		=> "10",
				"value"		=> $this->input->post("userpass"),
				"style"		=> "background: red;"
			);

		$konfpass = array(
				"name"		=> "konfpass",
				"id"		=> "konfpass",
				"maxlength"	=> "15",
				"size"		=> "10",
				"value"		=> $this->input->post("konfpass"),
				"style"		=> "background: red;"
			);

		$useremail = array(
				"name"		=> "useremail",
				"id"		=> "useremail",
				"maxlength"	=> "50",
				"size"		=> "35",
				"value"		=> $this->input->post("useremail"),
				"style"		=> "background: red;"
			);

		//end difinidion
		$user["username"] = $username;
		$user["userpass"] = $userpass;
		$user["konfpass"] = $konfpass;
		$user["useremail"] = $useremail;

		return $user;
	}

	function userrules() {
		// Definisi Rules dalam bentuk array asosiatif
		$rules = array(
				array(
						"field"	=> 'username',
						"label"	=> 'Nama User',
						"rules"	=> 'required|trim|min_length[5]|max_length[15]'
					),
				array(
						"field"	=> 'userpass',
						"label"	=> 'Password',
						"rules"	=> 'required|trim'
					),
				array(
						"field"	=> 'konfpass',
						"label"	=> 'Konfirmasi Password',
						"rules"	=> 'required|trim|matches[userpass]'
					),
				array(
						"field"	=> 'useremail',
						"label"	=> 'Email',
						"rules"	=> 'required|trim|valid_email'
					),
			);

		return $rules;
	}

}

?>