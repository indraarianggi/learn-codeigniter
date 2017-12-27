<?php

/**
* Controller 28 : Download File
*/

class Download extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('html', 'form', 'url', 'text'));
	}

	/*
		Menampilkan daftar file (yang ada di direktori folder).
	*/
	function showfiles()
	{
		$this->load->helper("directory");

		$data["files"] = directory_map('./folder', 1); // directory_map("namadirektori", kedalaman);

		$data["title"] = "Demo Show dan Download Files!";

		$this->load->view("upload_download/download_view", $data);
	}

	/*
		Menampilkan file di browser.
	*/
	function showdata($namafile)
	{
		$path_parts = pathinfo($namafile);
		// print_r($path_parts) => coba-coba untuk melihat macam-macam key arraynya

		$ext = strtolower($path_parts["extension"]); // ekstensi file

		// tentukan jenis isi file dari ekstensinya
		switch ($ext) {
			case 'gif':
				$ctype = "image/gif";
				break;
			case 'png':
				$ctype = "image/png";
				break;
			case 'jpeg':
			case 'jpg':
				$ctype = "image/jpg";
				break;
			default:
				$ctype = "application/force-download";
				break;
		}

		echo header("Content-Type: $ctype"); // mengirimkan informasi jenis data yang diterima oleh browser

		// Jika ditambah kode dibawah ini, maka file akan langsung didownload, tidak akan ditampilkan oleh browser
		// echo header('Content-Disposition: attachment; filename: "'. $namafile ."'");


		ob_clean(); // membersihkan buffer output PHP, antisipasi jika ada output yang sudah masuk ke dalam buffer dari PHP
		flush(); // untuk membersihkan buffer
		readfile("./folder/".$namafile); // membaca dan menampilkan isi dari file
	}

	/*
	CATATAN !!!
		buffer => penyimpanan sementara
		Jika ekstensi file tidak dikenali oleh browser maka file otomatis akan langsung didownload
	*/



	/*
		Mendownload file.
	*/
	function downloadfile($namafile)
	{
		$this->load->helper("download");

		$data = file_get_contents("./folder/" . $namafile);

		force_download($namafile, $data); // fungsi download dari CI
	}
}

?>