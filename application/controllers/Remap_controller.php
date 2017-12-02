<?php

/**
* Controller 7 : Fungsi _remap()
*					=>	memungkinkan Ci melakukan pemetaan suatu fungsi
*						dengan fungsi yang lain dalam satu controller.
*					=>	melakukan pengarahan suatu fungsi untuk dapat
*						menggunakan fungsi lain yg sudah ada.
*						Sehingga kita bisa memiliki satu fungsi diacu
*						dengan nama yang lain, atau nama alias dari suatu fungsi.
*					=>	dengan _remap() jika user mengakses kontroler dengan nama
*						yang salah, maka bisa diarahkan agar kesalahan tersebut
*						dikonversi menjadi mengeksekusi fungsi default yang disiapkan.
*/

class Remap_controller extends CI_Controller
{
	
	function nomethod()
	{
		echo "Maaf tidak ada yang bisa diproses!";
	}

	function _remap($method)
	{
		$this->nomethod();
	}
}

?>