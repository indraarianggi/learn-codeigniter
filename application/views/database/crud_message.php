<!DOCTYPE html>
<!-- View 31 : CRUD -->

<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
	<?php
		echo heading($title, 2);
		if (isset($adata)) {
	?>

	<table style="margin:auto; width:80%;">
		<?php

		echo "No : " . $adata["noteman"];
		echo br();
		echo "Nama : " . $adata["namateman"];
		echo br();
		echo "No Telp : " . $adata["notelp"];
		echo br();
		echo "Email : " . $adata["email"];
		echo br();
		echo "<hr/>";

		?>
	</table>

	<?php
	}

	echo br();
	echo $message;
	echo br();
	echo anchor("database/crud_controller/formadd", "Tambah data");
	echo br();
	echo anchor("database/crud_controller/getnoteman/update", "Update data");
	echo br();
	echo anchor("database/crud_controller/getnoteman/delete", "Delete data");
	echo br();
	echo anchor("database/mvc/arrayrecord", "Tampilkan seluruh data");

	?>
	</body>
</html>