<!DOCTYPE html>
<!-- View 18 : Validasi Data Form -->

<html>
	<head>
		<title><?php echo $judul; ?></title>
	</head>
	<body>
	<?php

	echo heading($judul, 1);

	echo validation_errors();

	echo form_open($aksi);
		echo form_label("Nama user : ");
		echo form_input($username);
		echo br();
		echo form_label("Password : ");
		echo form_input($userpass);
		echo br();
		echo form_label("Konfirmasi Password : ");
		echo form_input($konfpass);
		echo br();
		echo form_label("Email : ");
		echo form_input($useremail);
		echo br();
		echo form_submit("btnReg", "Register");
	echo form_close();

	?>
	</body>
</html>