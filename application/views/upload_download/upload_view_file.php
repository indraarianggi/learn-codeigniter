<!DOCTYPE html>
<!-- View 44 : Upload File => Form Upload -->

<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
	<?php

	echo heading($title, 2);
	echo $error;

	echo form_open_multipart($scriptaksi); // definisi form dengan enctype="multipart/form-data"
		echo form_label("Pilih file untuk diupload : ");
		echo form_upload("afile"); // input type="file"
		echo br();
		echo form_submit("btnSimpan", $aksi);
	echo form_close();

	?>
	</body>
</html>