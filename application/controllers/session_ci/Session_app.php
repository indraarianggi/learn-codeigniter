<?php

/**
* Controller 30 : Implementasi Session dalam CodeIgniter.
*/

class Session_app extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		/* KONFIGURASI KONEKSI DATABASE */
			$config['hostname'] = "localhost";
			$config['dbdriver'] = "mysqli";
			$config['database'] = "lat_ci";
			$config['username'] = "root";
			$config['password'] = "";
			$this->load->database($config);

		/*
		Konfigurasi koneksi database dibutuhkan jika kita ingin menyimpan session ke dalam database.
		*Secara default (tanpa otak-atik) session akan disimpan sebagai cookie.

		Untuk lebih jelas baca dokumentasi : https://www.codeigniter.com/user_guide/libraries/sessions.html#database-driver

		Yang diubah hanya :
			1) Menambah koneksi database, baik manual maupun autoload
			2) Lihat di file config.php, setting bagian ini :
				$config['sess_driver'] = 'database';
				$config['sess_save_path'] = 'ci_sessions';


		Sebagai CATATAN TAMBAHAN mengenai session ini
			Setiap 5 menit akan direfresh, sehingga mungkin data yg tersimpan di database session akan berganti/berbeda-beda (?)
		*/

		// Load library session
		$this->load->library("session");
		
		$this->load->helper(array("html", "form", "url", "text"));

		//Load model dan memberikan nama alias Login
		$this->load->model("session_ci/Login_model", "Login");
	}

	function index()
	{
		$this->welcome();
	}

	/*
		Menampilkan view jika berhasil login.
	*/
	function welcome($data=array())
	{
		$data["title"] = "Demo Aplikasi Dengan Session";

		$logged_in = $this->session->userdata("logged_in"); // membaca suatu item dalam data session

		if($logged_in!="OK") {
			$data["pesan"] = "Anda belum login, silahkan login dulu";
			$this->_formlogin($data);
		}
		else {
			$data["subtitle"] = "Welcome Page";
			$this->load->view("session_ci/app_welcome", $data);
		}
	}

	/*
		Menampilkan form login.

		Private Function begin with underscore (_), agar tidak bisa diakses secara langsung
	*/
	function _formlogin($data=array())
	{
		$data["subtitle"] = "Form Login";

		$data["pesan"] = (isset($data["pesan"]))?$data["pesan"]:"";
		$data["scriptaksi"] = "session_ci/session_app/dologin";

		$this->load->view("session_ci/app_formlogin", $data);
	}

	/*
		Pengolah data yang diinputkan di form.
	*/
	function dologin($data=array())
	{
		$data = $this->Login->readinput();

		if($this->Login->cekuser($data["username"], $data["userpass"])) { // memeriksa status login user
			$this->session->set_userdata("logged_in", "OK"); // membuat session logged_in
			$this->session->set_userdata("user_data", $data["username"]);

			$this->welcome($data);
		}
		else {
			$data["title"] = "Demo Aplikasi Dengan Session";
			$data["pesan"] = "Nama User atau Password tidak cocok! <br/>Ulangi Login";

			$this->_formlogin($data);
		}
	}

	/*
		Proses logout => menghapus session.
	*/
	function logout()
	{
		$data=array();

		$this->session->unset_userdata("logged_in"); // Menghapus item logged_in dalam data session

		$this->welcome();
	}

	/*
		Menampilkan halaman about => harus login terlebih dahulu untuk dapat mengaksesnya
	*/
	function about()
	{
		$data["title"] = "Demo Aplikasi Dengan Session";

		$logged_in = $this->session->userdata("logged_in");

		if($logged_in!="OK") {
			$data["pesan"] = "Anda belum bisa mengakses menu About, silahkan login dulu";
			$this->_formlogin($data);
		}
		else {
			$data["subtitle"] = "About Page";
			$this->load->view("session_ci/app_about", $data);
		}
	}
}

?>