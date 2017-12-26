<?php

/**
* Model 8 : PHPExcel => Export Data menjadi File Excel.
*/
class Excel_model extends CI_Model
{
	
	function export_teman()
	{
		$query = $this->db->query("select * from tblteman");

		if($query->num_rows() > 0) {
			foreach ($query->result() as $data) { // hasilnya berupa objek
				$hasil[] = $data;
			}

			return $hasil;
		}
	}
}