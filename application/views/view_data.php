<!DOCTYPE html>
<!-- View 7 : Menampilkan data kedalam view -->
<html>
	<head>
		<title><?= $judulapp; ?></title>
	</head>
	<body>
		<?php
			echo heading($judulapp, 2);
			echo br();
			echo "var1 : " . $var1;
			echo br();
			echo "ekstrakvar adalah array";
			echo br();
			echo "dengan print_r(ekstrakvar)";
			echo br();
			print_r($ekstrakvar);
			echo heading("Isi dari array ekstrakvar dijadikan variabel : ", 3);
			
			extract($ekstrakvar);
			echo "Framework : " . $frm;
			echo br();
			echo "Versi : " . $versi;
			echo br();
			echo "no : " . $no;
			echo br();
		?>
	</body>
</html>