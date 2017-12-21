<!DOCTYPE html>
<!-- View 30 : CRUD -->

<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
	<?php

	echo heading($title, 2);
	echo form_open($scriptaksi);
		echo form_label("No Teman : ");
		echo form_input($noteman);
		echo br();
		echo form_label("Nama Teman : ");
		echo form_input($namateman);
		echo br();
		echo form_label("No Telepon : ");
		echo form_input($notelp);
		echo br();
		echo form_label("Email : ");
		echo form_input($email);
		echo br();
		echo form_submit("btnSubmit", "Simpan");
	echo form_close();

	?>
	</body>
</html>