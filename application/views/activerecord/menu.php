<!-- View 34 : Active Record CI => menu pilihan -->

Menu :
<?php
	echo anchor("activerecord/active_record/showfilter", "Filter ");
	echo " | ";
	echo anchor("activerecord/active_record/showform/add", "Tambah ");
	echo " | ";
	echo anchor("activerecord/active_record/findrecto/update", "Update ");
	echo " | ";
	echo anchor("activerecord/active_record/findrecto/delete", "Delete ");
	echo " | ";
	echo anchor("activerecord/active_record/showgrid", "Tampilkan Filter Grid ");
	echo " | ";
	echo anchor("activerecord/active_record/showallrecord", "Tampilkan Semua Record ");
	echo " | ";
	echo anchor("activerecord/active_record/shownamaemail", "Tampilkan Nama dan Email ");
?>