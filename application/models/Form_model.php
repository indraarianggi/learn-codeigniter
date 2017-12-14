<?php

/**
* Model 2 : Form dalam CodeIgniter
*			Input dan Pemfilteran dalam CI
*/

class Form_model extends CI_Model
{
	
	function formuser()
	{
		// Definisi elemen form
		$username = array(
			"name"		=> "username",
			"id"		=> "username",
			"maxlength"	=> "15",
			"size"		=> "10",
			"style"		=> "background : cyan;",
			"value"		=> $this->input->post("username")
		);
		$userpass = array(
			"name"		=> "userpass",
			"class"		=> "userpass",
			"maxlength"	=> "15",
			"size"		=> "10",
			"style"		=> "background : red;",
			"value"		=> $this->input->post("userpass")
		);

		$form["username"] = $username;
		$form["userpass"] = $userpass;

		return $form;
	}

	function formcomplete()
	{
		$this->load->helper('url');

		// Definisi elemen-elemen form
		// style for label
		$lblstyle = array(
			"style"		=> "color:#F0F"
		);
		// input text
		$username = array(
			"name"		=> "username",
			"id"		=> "username",
			"maxlength"	=> "15",
			"size"		=> "10",
			"style"		=> "background : cyan;",
			"value"		=> $this->input->post("username")
		);
		// input password
		$userpass = array(
			"name"		=> "userpass",
			"class"		=> "userpass",
			"maxlength"	=> "15",
			"size"		=> "10",
			"style"		=> "background : red;",
			"value"		=> $this->input->post("userpass")
		);
		// button submit
		$btnSubmit = array(
			"name"		=> "btnLogin",
			"id"		=> "btnLogin",
			"value"		=> "Login",
			"style"		=> "background:green; width:100px;"
		);
		// button reset
		$btnReset = array(
			"name"		=> "btnReset",
			"id"		=> "btnReset",
			"value"		=> "Reset",
			"style"		=> "background:red; width:100px;"
		);
		// checkbox
		$chkbox1 = array(
			"name"		=> "bahasa1",
			"id"		=> "bahasa",
			"value"		=> "Java",
			"checked"	=> true,
			"style"		=> "margin:10px"
		);
		$chkbox2 = array(
			"name"		=> "bahasa2",
			"id"		=> "bahasa",
			"value"		=> "PHP",
			"checked"	=> false,
			"style"		=> "margin:10px"
		);
		// radio button
		$radio1 = array(
			"name"		=> "jk1",
			"id"		=> "jk",
			"value"		=> "L",
			"checked"	=> true,
			"style"		=> "margin:10px"
		);
		$radio2 = array(
			"name"		=> "jk2",
			"id"		=> "jk",
			"value"		=> "P",
			"checked"	=> false,
			"style"		=> "margin:10px"
		);
		// textarea
		$txtarea = array(
			"name"		=> "komentar",
			"id"		=> "komentar",
			"rows"		=> "3",
			"cols"		=> "50",
			"value"		=> ""
		);
		// button
		$btn = array(
			"name"		=> "myBtn",
			"id"		=> "myBtn",
			"value"		=> "true",
			"type"		=> "reset",
			"content"	=> "Tombol Reset Yang Lain",
			"style"		=> "background:orange; width:200px;"
		);


		$form = [
			"lblstyle"	=> $lblstyle,
			"username"	=> $username,
			"userpass"	=> $userpass,
			"btnSubmit"	=> $btnSubmit,
			"btnReset"	=> $btnReset,
			"chkbox1"	=> $chkbox1,
			"chkbox2"	=> $chkbox2,
			"radio1"	=> $radio1,
			"radio2"	=> $radio2,
			"txtarea"	=> $txtarea,
			"btn"		=> $btn,
		];
		

		return $form;
	}

	function cekuser($username, $userpass)
	{
		$errmessage;
		if (!(empty($username) && empty($userpass))) {
			if (($username=="admin") && ($userpass=="nimda")) {
				$errmessage = "Sukses!";
			} else {
				$errmessage = "Gagal Login ! Username atau Userpass tidak sesuai !";
			}
		} else {
			$errmessage = "firsttime";
		}

		return $errmessage;
	}
}

?>