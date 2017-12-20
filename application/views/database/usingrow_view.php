<!DOCTYPE html>
<!-- View 27 : Membaca dan Menampilkan Data dengan model MVC -->
<!-- row() -->

<?php
	
	function displayrow($row, $norec)
	{
		echo "No record : " . $norec;
		echo "<hr/>";
		
		echo "No : " . $row->noteman;
		echo br();
		echo "Nama : " . $row->namateman;
		echo br();
		echo "No Telp : " . $row->notelp;
		echo br();
		echo "Email : " . $row->email;
		echo "<hr/>";

		// Menampilkan data berupad array
		/*
		echo "No : " . $row["noteman"];
		echo br();
		echo "Nama : " . $row["namateman"];
		echo br();
		echo "No Telp : " . $row["notelp"];
		echo br();
		echo "Email : " . $row["email"];
		echo "<hr/>";
		*/
	}

?>
<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
	<?php
		echo heading($title, 2);
		echo "<hr/>";
		echo heading("Menggunakan first_row() dan last_row()", 3);

		$norow = $hslquery->num_rows();
		$row = $hslquery->last_row();
		// Menampilkan data berupa array
		// $row = $hslquery->last_row('array');
		displayrow($row, $norow);

		$norow = 1;
		$row = $hslquery->first_row();
		displayrow($row, $norow);

		echo heading("Menggunakan row()", 3);
		echo heading("Index record dimulai dari index ke-0", 4);
		// index record dimulai dari 0
		$norow = 0;
		$row = $hslquery->row($norow);
		displayrow($row, $norow);

		$norow = 1;
		$row = $hslquery->row($norow);
		displayrow($row, $norow);

		$norow = 2;
		$row = $hslquery->row($norow);
		displayrow($row, $norow);

		$norow = 3;
		$row = $hslquery->row($norow);
		displayrow($row, $norow);

		$norow = 4;
		$row = $hslquery->row($norow);
		displayrow($row, $norow);

		$norow = 5;
		$row = $hslquery->row($norow);
		displayrow($row, $norow);

		// diluar nomor index akan menampilkan record terakhir
		$norow = 7;
		$row = $hslquery->row($norow);
		displayrow($row, $norow);
	?>
	</body>
</html>