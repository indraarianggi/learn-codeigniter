<?php

/**
* Controller 32 : PDF
*
* Tutorial dpt dilihat di :
* 1) http://www.mynotescode.com/cara-membuat-laporan-pdf-dengan-codeigniter-dan-html2pdf/
* 2) http://komang.my.id/2016/01/07/menampilkan-tabel-database-mysql-dalam-format-pdf/
* 3) https://www.youtube.com/watch?v=GMKvDt9M_UU
*/
class Pdf extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper(array('url','file'));
		// Load model, dan memberi nama alias "Model"
		$this->load->model("pdf/Pdf_model", "Model");
	}

	/*
		Menampilkan tabel data yang akan dicetak menjadi PDF.
	*/
	public function index()
	{
		$data["teman"] = $this->Model->view_row();

		$this->load->view("pdf/preview", $data);
	}

	/*
		Cetak file PDF.
	*/
	public function cetak()
	{
		$data["teman"] = $this->Model->view_row(); // ambil data dari database

		// buffering output => tempat penyimpanan sementara
		// lihat penjelasan : http://www.diskusiweb.com/discussion/4962/ob_start/p1
		ob_start(); // mulai
			$this->load->view("pdf/print", $data); // load view print.php
			$html = ob_get_contents(); // memasukkan semua kode yang ada di print.php ke dalam variabel $html
		ob_end_clean(); // selesai

		// Load plugin html2pdf
		require_once("./assets/html2pdf/html2pdf.class.php");

		$pdf = new HTML2PDF('P', 'A4', 'en'); // setting file PDF-nya
		$pdf->WriteHTML($html); // Memasukkan kode html-nya
		$pdf->Output('Data Teman.pdf', 'D'); // cetak PDF

		/*
			D => kode yg menunjukkan bahwa file didownload

			Sebenarnya ada kode lain untuk perlakuan terhadap dokumen PDF yg dihasilkan, misalnya menampilkannya dalam web browser
			dokumentasinya di : http://wiki.spipu.net/doku.php?id=html2pdf:en:v4:output
		*/
	}


}

?>