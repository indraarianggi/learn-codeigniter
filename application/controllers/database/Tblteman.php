<?php

/**
* Controller 18 : Database dalam CodeIgniter
*/

class Tblteman extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('html', 'url', 'form', 'text'));

		// Konfigurasi database scr manual tanpa melalui file konfigurasi database.php
		$config['hostname'] = "localhost";
		$config['dbdriver'] = "mysqli";
		$config['database'] = "lat_ci";
		$config['username'] = "root";
		$config['password'] = "";

		$this->load->database($config);
	}

	function baca($dipanggil=0)
	{
		$sqlstr = "select * from tblteman";
		$hslquery = $this->db->query($sqlstr);

		// Saya buat kondisi untuk memilah, apakah fungsi baca() ini 
		// dipanggil secara langsung dr browser ($dipanggil==0)
		// atau dipanggil/digunakan oleh fungsi lain ($dipanggil==1)
		if ($dipanggil==1) {
			return $hslquery;
		}
		else {
			echo heading("Hasil Pembacaan Tabel Teman", 2);
			echo "print_r :";
			echo br();
			print_r($hslquery);
			echo br();echo br();
			echo "var_dump :";
			echo br();
			var_dump($hslquery);
		}


		// print_r() dan var_dump() => untuk menampilkan struktur data suatu variabel
		//								sehingga dapat ditentukan teknik pemrograman
		//								untuk pemrosesan lebih lanjut.

	}

	/* 
	* Menapilkan hasil pembacaan database dengan bantuan library table.
	*/
	function libtable()
	{
		$this->load->library('table');

		// Memanggil/menggunakan fungsi baca()
		$hslquery = $this->baca(1);

		echo heading("Tampil Hasil Pembacaan Dengan Library Table", 2);

		//$this->table->set_heading(array("No", "Nama", "Telepon", "Email"));
		$datatable = $this->table->generate($hslquery);
		echo $datatable;
	}

	/* 
	* Menampilkan hasil pembacaan database dengan kode sendiri,
	* dengan bantuan fungsi CI dan PHP tentunya.
	*/
	function loopbj()
	{
		$hslquery = $this->baca(1);

		echo heading("Tampil Hasil Pembacaan Dengan foreach()");
		foreach ($hslquery->result() as $row) {
			echo $row->noteman . " ";
			echo $row->namateman . " ";
			echo $row->notelp . " ";
			echo $row->email . " ";
			echo br();
		}

		// result()	=> menghasilkan sebuah record berupa objek record.
	}
}

?>