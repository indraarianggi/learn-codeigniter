<?php

/**
* Controller 26 : Uji coba method listWorksheetNames() dan listWorksheetInfo dari library PHPExcel
*/
class Worksheet extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url','file'));
		$this->load->library(array('PHPExcel', "PHPExcel/IOFactory"));

		$config['hostname'] = "localhost";
		$config['dbdriver'] = "mysqli";
		$config['database'] = "lat_ci";
		$config['username'] = "root";
		$config['password'] = "";

		$this->load->database($config);
	}

	function index()
	{
		$data["title"] = "Test Methode listWorksheetNames() dan listWorksheetInfo()";
		$data["aksi"] = "excel/worksheet/show";

		$this->load->view("excel/import_form", $data);
	}

	function show()
	{
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

		try {
			$inputFileType = IOFactory::identify($inputFileName);
			$objReader = IOFactory::createReader($inputFileType);
			/** returns a simple array listing each worksheet name within the workbook **/
			$data["worksheetNames"] = $objReader->listWorksheetNames($inputFileName);
			/** returns a nested array, with each entry listing the name and dimensions for a worksheet **/
			$data["worksheetData"] = $objReader->listWorksheetInfo($inputFileName);
		} catch (Exception $e) {
			die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '":' . $e->getMessage());
		}

		delete_files($media['file_path']);
		$data["title"] = "Test Methode listWorksheetNames() dan listWorksheetInfo()";

		$this->load->view("excel/worksheet", $data);
	}
}

?>