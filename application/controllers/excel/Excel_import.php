<?php

/**
* Controller 24 : PHPExcel => Import data dari file excel.
*
* Dokumentasi	: https://kertasblog.wordpress.com/2016/01/15/import-excel-ke-mysql-dengan-codeigniter/
* atau di 		: https://github.com/indraarianggi/PHPExcel/tree/1.8/Documentation/markdown/ReadingSpreadsheetFiles
*/

if (!defined('BASEPATH')) exit('No direct script access allowed');

class Excel_import extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'file'));

		// Load library PHPExcel.
		$this->load->library(array('PHPExcel', 'PHPExcel/IOFactory'));

		// Koneksi ke database.
		$config['hostname'] = "localhost";
		$config['dbdriver'] = "mysqli";
		$config['database'] = "lat_ci";
		$config['username'] = "root";
		$config['password'] = "";

		$this->load->database($config);
	}

	/*
		Menampilkan form upload file excel.
	*/
	function index()
	{
		$data["title"] = "Import Data Excel";
		$data["aksi"] = "excel/excel_import/upload";

		$this->load->view("excel/import_form", $data);
	}

	/*
		Proses import data excel
	*/
	function upload()
	{
		$fileName = time().$_FILES['file']['name'];
		// fungsi time() hanya untuk mengubah nama file, tidak berpengaruh ke proses (dihilangkan tidak masalah)

		$config['upload_path']	= './assets/excel/';
		$config['file_name']	= $fileName;
		$config['allowed_types'] = 'xls|xlsx|csv';
		$config['max_size']		= 10000;

		$this->load->library('upload');
		$this->upload->initialize($config);

		if (!$this->upload->do_upload('file')) {
			$this->upload->display_errors();
		}

		$media = $this->upload->data();

		$inputFileName = './assets/excel/'.$media['file_name'];

		try {
			/**  Identify the type of $inputFileName  **/
			$inputFileType = IOFactory::identify($inputFileName);
			/**  Create a new Reader of the type that has been identified  **/
			$objReader = IOFactory::createReader($inputFileType);
			/**  Load $inputFileName to a PHPExcel Object  **/
			$objPHPExcel = $objReader->load($inputFileName);
		} catch (Exception $e) {
			die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '":' . $e->getMessage());
		}

		$sheet = $objPHPExcel->getSheet(0);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();

		for ($row=2; $row<=$highestRow ; $row++) {
			$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
				NULL,
				TRUE,
				FALSE);

			// Sesuaikan dengan nama field di tabel database
			$data = array(
				"noteman" 	=> $rowData[0][0],
				"namateman"	=> $rowData[0][1],
				"notelp"	=> $rowData[0][2],
				"email"		=> $rowData[0][3]
			);

			// Sesuaikan dengan nama tabel yang digunakan.
			$insert = $this->db->insert("tblteman", $data);

			// Menghapus file yang diupload, dihapus karena data di dalamnya sudah dimasukkan ke dalam database.
			// Untuk bisa melihat file hasil uploadnya, dibuat komen saja
			delete_files($media['file_path']);
		}

		redirect('excel/excel_import/');
	}

	/*
		Contoh Import File Excel Lain (dari buku perpustakaan)

		Hanya membaca data dari excel, tidak memasukkannya ke dalam database
	*/
	function baca()
	{
		$data["title"] = "Import Data Excel : Contoh dari buku perpustakaan";
		$data["aksi"] = "excel/excel_import/bacaexcel";

		$this->load->view("excel/import_form", $data);
	}

	function bacaexcel()
	{
		$this->load->helper('html');
		$this->load->library('table');

		echo heading("Excel HTML Table", 2);
		echo "Start! " . date('Y-m-d H:i:s');
		echo "<hr/>";

		// Konfigurasi dan program upload file, Saya copy-paste dari fungsi upload() diatas
		$fileName = time().$_FILES['file']['name'];
		$config['upload_path'] = './assets/excel/';
		$config['file_name'] = $fileName;
		$config['allowed_types'] = 'xls|xlsx|csv';
		$config['max_size'] = 10000;
		$this->load->library('upload');
		$this->upload->initialize($config);
		if(!$this->upload->do_upload('file')) {
			$this->upload->display_errors();
		}
		$media = $this->upload->data();
		$inputFileName = './assets/excel/'.$media['file_name'];

		//*
		try {
			$inputFileType = IOFactory::identify($inputFileName);
			$objReader = IOFactory::createReader($inputFileType);
			$objReader->setReadDataOnly(TRUE);
			$objPHPExcel = $objReader->load($inputFileName);
		} catch (Exception $e) {
			die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '":' . $e->getMessage());
		}

		$i=0;
		$objWorkSheet = $objPHPExcel->getActiveSheet();
		foreach ($objWorkSheet->getRowIterator() as $row) {
			$cellIterator = $row->getCellIterator();
			$cellIterator->setIterateOnlyExistingCells(FALSE); // nilai false menyatakan semua cell dibaca

			$baris = array();
			foreach ($cellIterator as $cell) {
				$baris[] = $cell->getValue(); // mengambil isi dari suatu objek cell
			}

			/* untuk membedakan heading dgn isi data
			if($i==0){
				$this->table->set_heading($baris); // menjadikan data yang dibaca sebagai heading table
			}
			else {
				$this->table->add_row($baris); // menambahkan data ke dalam bentuk table
			}
			*/

			/* INSERT ke database */
			if ($i!=0) {
				$data = array(
					"noteman" 	=> $baris[0],
					"namateman"	=> $baris[1],
					"notelp"	=> $baris[2],
					"email"		=> $baris[3]
				);
				$insert = $this->db->insert("tblteman", $data);
			}
			

			$i++;
		}
		echo $this->table->generate();
		/**/

		echo "<hr/>";
		echo "Done! " . date('Y-m-d H:i:s');

		// hanya menampilkan menu untuk menampilkan data
		$this->load->view('activerecord/menu');
	}
}

?>