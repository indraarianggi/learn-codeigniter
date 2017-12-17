<?php

/**
* Controller 15 : Library Calendar
*/

class Calendar extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper('html');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('text');

	}

	function index()
	{
		// Fungsi ini hanya untuk manampilkan kalender saja

		// Load Library Calendar
		$this->load->library('calendar');

		$data["varkal"] = $this->calendar->generate();
		$data["judul"] = "Kalender Dengan Library Calendar";

		$this->load->view("kalender/calendar_view", $data);
	}

	function haribesar()
	{
		// Load Library Calendar
		$this->load->library('calendar');

		$tahun = 2017;
		$bulan = '04';
		$hari_besar = array(
				21 => site_url("Calendar/infohari/$tahun/$bulan/21"),
				27 => site_url("Calendar/infohari/$tahun/$bulan/27")
			);

		$data["varkal"] = $this->calendar->generate($tahun, $bulan, $hari_besar);
		$data["judul"] = "Kalender Dengan Hari Besar";

		$this->load->view("kalender/calendar_view", $data);
	}

	function infohari($tahun, $bulan, $tgl)
	{
		$info_hari = array(
				'20170421' => "Hari Kartini",
				'20170427' => "Hari Ulang Tahun Siapa Ini ???",
				'20170502' => "Hari Pendidikan Nasional",
				'20170520' => "Hari Kebangkitan Nasional"
			);

		$data["infohari"] = $info_hari[$tahun.$bulan.$tgl];
		$data["tahun"] = $tahun;
		$data["bulan"] = $bulan;
		$data["tgl"] = $tgl;

		$data["judul"] = "Info Hari Besar";

		$this->load->view("kalender/calendar_haribesar_view", $data);
	}

	function show()
	{
		// Fungsi untuk menambahkan navigasi ke kalender yang dibuat

		$prefs = array(
				'show_next_prev'	=> TRUE,
				'next_prev_url'		=> site_url("Calendar/show/")
			);

		// Load Library Calendar dengan parameter tambahan.
		$this->load->library("calendar", $prefs);

		$data["varkal"] = $this->calendar->generate($this->uri->segment(3), $this->uri->segment(4));

		/*
		*	segment(3)	=> tahun
		*	segment(4)	=> bulan
		*/

		$data["judul"] = "Navigasi Kalender";

		$this->load->view("kalender/calendar_view", $data);
	}

	function tahun($tahun=2017)
	{
		// Fungsi untuk menampilkan kalender dalam satu tahun

		$this->load->library("calendar");

		$abulan = array();
		for ($i=1; $i<13; $i++) {
			$bulan = str_pad($i, 2, '0', STR_PAD_LEFT);
			$abulan[$bulan] = $this->calendar->generate($tahun, $bulan);
		}

		/*
		*	str_pad()	=> untuk menambahkan karakter 0 di depan angka ($i)
		*
		*/

		$data["varkal"] = $abulan;
		$data["judul"] = "Kalender Tahun $tahun";

		$this->load->view("kalender/calendar_tahun_view", $data);
	}
}

?>