<?php

/**
* Controller 25 : PHPExcel => Export data menjadi file excel.
* 
* Dokumentasi	: https://kertasblog.wordpress.com/2016/01/23/export-data-mysql-ke-excel-pada-codeigniter/
* atau di 		: https://github.com/indraarianggi/PHPExcel/tree/1.8/Documentation/markdown/ReadingSpreadsheetFiles


CATATAN !!!
Jika dibuka di chrome muncul pesan Situs tidak dapat dijangkau
atau dibuka di firefox muncul error "Fatal error: 'break' not in the 'loop' or 'switch' context in D:\xampp\htdocs\Lat_CI\application\libraries\PHPExcel\Calculation\Functions.php on line 581"

Solusinya buka file ...\PHPExcel\Calculation\Functions.php, lihat pada line 581
ada perintah break; disana => dibuat komentar saja
*/
class Excel_export extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','file'));
		// Load library
		$this->load->library(array('PHPExcel', "PHPExcel/IOFactory"));
		// Load model, dan memberi nama alias "Model"
		$this->load->model("excel/Excel_model", "Model");

		$config['hostname'] = "localhost";
		$config['dbdriver'] = "mysqli";
		$config['database'] = "lat_ci";
		$config['username'] = "root";
		$config['password'] = "";

		$this->load->database($config);
	}

	/*
		Proses export data excel.
	*/
	function export()
	{
		$ambilData = $this->Model->export_teman();

		if(count($ambilData)>0) {
			$objPHPExcel = new PHPExcel();
			// Set properties
			$objPHPExcel->getProperties()
						->setCreator("Indra Arianggi") // Creator
						->setTitle("Daftar Teman dari Database Mysql"); // File title

			// Membuat lembar kerja excel
			$objSet = $objPHPExcel->setActiveSheetIndex(0); // inisiasi set object
			$objGet = $objPHPExcel->getActiveSheet(); // inisiasi get object

			$objGet->setTitle('Sample Sheet'); // sheet title

			$objGet->getStyle("A1:D1")->applyFromArray(
					array(
							'fill'	=> array(
									'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
									'color'	=> array('rgb' => '92d050')
								),
							'font'	=> array(
									'color'	=> array('rgb' => '000000')
								)
						)
				);

			// Table Header
			$cols = array("A", "B", "C", "D");

			$val = array("No", "Nama", "Telepon", "Email");

			for($a=0; $a<4; $a++) {
				$objSet->setCellValue($cols[$a].'1', $val[$a]);

				// Setting lebar cell
				$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Nomor
				$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25); // Nama
				$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Telepon
				$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25); // Email

				$style = array(
						'alignment'	=> array(
								'horizontal' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
							)
					);
				$objPHPExcel->getActiveSheet()->getStyle($cols[$a].'1')->applyFromArray($style);
			}


			$baris = 2;
			foreach ($ambilData as $row) {
				
				// Pemanggilan sesuaikan dengan nama kolom tabel
				$objSet->setCellValue("A".$baris, $row->noteman); // membaca data noteman
				$objSet->setCellValue("B".$baris, $row->namateman); // membaca data namateman
				$objSet->setCellValue("C".$baris, $row->notelp); // membaca data notelp
				$objSet->setCellValue("D".$baris, $row->email); // membaca data email

				// Set number value
				$objPHPExcel->getActiveSheet()->getStyle('C1:C'.$baris)->getNumberFormat()->setFormatCode('0');

				$baris++;
			}

			//$objPHPExcel->getActiveSheet()->setTitle('Data Export');

			//$objPHPExcel->setActiveSheetIndex(0);
			$fileName = urlencode("Data" . date("Y-m-d H:i:s") . ".xls");

				header('Content-Type : application/vnd.ms-excel'); // mime type
				header('Content-Disposition : attachment; filename = "' . $fileName . '"'); // tell browser what's the file name
				header('Cache-Control : max-age=0'); // no cache

			$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->save('php://output');
		}
		else {
			redirect('excel/Excel_import'); // Controller import file excel
		}
	}
	/*

	CATATAN PENJELASAN PROGRAM
	1) header('Content-Type : application/vnd.ms-excel'); // mime type
		=> atau bisa juga sebagai berikut : header('Content-Type : application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		=> mendefinisikan jenis data, yaitu spreadsheet

	2) header('Content-Disposition : attachment; filename = "namafile.xls"'); // tell browser what's the file name
		=> memberitahu browser untuk menyimpan file dengan nama file spt yang didefinisikan

	3) header('Cache-Control : max-age=0'); // no cache
		=> digunakan agar server tidak melakukan cache
		=> 0 menunjukkan waktu untuk menyimpan di server

	*/






	/*
		Contoh Export File Excel Lain (dari buku perpustakaan)
	*/
	function buatexcel()
	{
		echo "Start!";
		$sT = microtime(1);

		//*
		$objPHPExcel = new PHPExcel();

		//Assign cell value
		$objPHPExcel->setActiveSheetIndex(0);
		for($i=0; $i<1000; $i++) {
			for($j=0; $j<10; $j++) {
				$nomorkol = chr(65+$j);
				$hasil = $i * $j;

				// dengan menyertakan fungsi getActiveSheet() => untuk memastikan kita bekerja pada lembar kerja yang aktif
				$objPHPExcel->getActiveSheet()->setCellValue($nomorkol.$i, $hasil);
			}
		}

		// Save it as an excel file
		$objWriter = IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('Hitung.xls');
		/**/

		echo "<br/>";
		echo "Done! " . date('Y-m-d H:i:s');
		echo "<br/>";

		$eT = microtime(1);

		var_dump(($eT - $sT), memory_get_usage(1), memory_get_peak_usage(1));

		/*
		* File Excel yang terbentuk terletak di dalam direktori aplikasi ini : xampp/htdocs/Lat_CI_New/
		*/
	}
}

?>