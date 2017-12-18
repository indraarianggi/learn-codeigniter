<?php

/**
* Controller 16 : Library Table
*/

class Table extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper(array("html", "form", "url", "text"));
	}

	function index()
	{
		$this->load->library('table');

		$telpteman = array(
				array("Indra", "085642024661"),
				array("Arianggi", "086728392838"),
				array("Suryaatmaja", "086729382932"),
				array("Imran", "084673829377"),
				array("Esa", "086738273822"),
				array("Azizah", "087374928393")
			);

		$this->table->set_heading(array("Nama", "No Telp"));

		$data["vartbl"] = $this->table->generate($telpteman);
		$data["judul"] = "Tabel Data Teman";

		$this->load->view("table_view", $data);
	}

	function addrow()
	{
		// Fungsi untuk mempraktekkan penambahan data (row) dalam table
		$this->load->library('table');

		$this->table->set_heading("Nama", "No Telp");
		// Menambahkan data dengan add_row()
		$this->table->add_row("Indra", "085642024661");
		$this->table->add_row("Arianggi", "086728392838");
		$this->table->add_row("Suryaatmaja", "086729382932");
		$this->table->add_row("Imran", "084673829377");
		$this->table->add_row("Esa", "086738273822");
		$this->table->add_row("Azizah", "087374928393");

		$data["vartbl"] = $this->table->generate();
		$data["judul"] = "Tabel Data Teman dengan Add Row";
		$this->load->view("table_view", $data);
	}

	function usingtemplate()
	{
		$this->load->library('table');

		// Definisi template sendiri untuk table
		$tmpl = array(
				'table_open'		=> '<table border="1" cellpadding="4" cellspacing="0"',
				'heading_row_start'	=> '<tr>',
				'heading_row_end'	=> '</tr>',
				'heading_cell_start'=> '<th style="background:cyan">',
				'heading_cell_end'	=> '</th>',
				'row_start'			=> '<tr>',
				'row_end'			=> '</tr>',
				'cell_start'		=> '<td>',
				'cell_end'			=> '</td>',
				'row_alt_start'		=> '<tr>',
				'row_alt_end'		=> '</tr>',
				'cell_alt_start'	=> '<td>',
				'cell_alt_end'		=> '</td>',
				'table_close'		=> '</table>'
			);

		// Memberitahu library CI untuk menggunakan template sendiri
		$this->table->set_template($tmpl);

		$this->table->set_heading("Nama", "No Telp");
		// Menambahkan data dengan add_row()
		$this->table->add_row("Indra", "085642024661");
		$this->table->add_row("Arianggi", "086728392838");
		$this->table->add_row("Suryaatmaja", "086729382932");
		$this->table->add_row("Imran", "084673829377");
		$this->table->add_row("Esa", "086738273822");
		$this->table->add_row("Azizah", "087374928393");

		$data["vartbl"] = $this->table->generate();
		$data["judul"] = "Tabel Data Teman dengan Template Sendiri";
		$this->load->view("table_view", $data);
	}
}

?>