<?php

/**
* Controller 29 : Session dalam CodeIgniter.
*/

class Session_controller extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		// Load library session (load dilakukan di fungsi construct atau dalam file config.php)
		$this->load->library("session");
		$this->load->helper(array("html", "text", "form", "url"));
	}

	/*
		Menampilkan Data Session
	*/
	function showmysession()
	{
		// Load/membaca/memperoleh data session
		$data["varsession"] = $this->session->all_userdata();

		$data["title"] = "Demo Show Session";

		$this->load->view("session_ci/mysession", $data);
	}

	/*
		Menampilkan item session_id dalam Data Session.
	*/
	function showmyid()
	{
		$this->session->set_userdata(array("session_id" => "indra"));
		//or like this, just for one item . . .
		//$this->session->set_userdata("session_id", "arianggi");

		$data["item"] = "session_id";
		$data["value"] = $this->session->userdata($data["item"]);

		$data["title"] = "Demo Show Session ID";

		$this->load->view("session_ci/myid", $data);
	}



	/*
		CATATAN TAMBAHAN !!!

		Menghapus Suatu Item Session
			$this->session->unset_userdata("nama_item");

		Menghapus Data Session (semua item dalam data session (?))
			$this->session->sess_destroy();


		FLASHDATA
			Is session data that will only be available for the next request, and is then automatically cleared.
			This can be very useful, especially for one-time informational, error or status messages (for example: “Record 2 deleted”).

			To mark an existing item as “flashdata”:
				$this->session->mark_as_flash("item");

			If you want to mark multiple items as flashdata, simply pass the keys as an array:
				$this->session->mark_as_flash("item1", "item2", "item3");

			To add flashdata:
				$this->session->set_flashdata("item_name", "value");

				*You can also pass an array to set_flashdata(), in the same manner as set_userdata().

			Reading flashdata variables:
				$this->session->flashdata('item');

			Or to get an array with all flashdata, simply omit the key parameter:
				$this->session->flashdata();

			If you find that you need to preserve a flashdata variable through an additional request, you can do so using the keep_flashdata() method. You can either pass a single item or an array of flashdata items to keep.
				$this->session->keep_flashdata('item');
				$this->session->keep_flashdata(array('item1', 'item2', 'item3'));



		TEMPDATA and other function.... see USER GUIDE CODEIGNITER (https://codeigniter.com/user_guide/libraries/sessions.html) !!!
	*/
}

?>