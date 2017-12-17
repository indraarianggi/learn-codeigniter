<!DOCTYPE html>
<!-- View 21 : Library Calendar -->

<html>
	<head>
		<title><?php echo $judul; ?></title>
	</head>
	<body>
	<?php

	echo heading($judul, 1);
	echo "Tanggal : " . $tgl . "-" . $bulan . "-" . $tahun;
	echo br();
	echo $infohari;

	?>
	</body>
</html>