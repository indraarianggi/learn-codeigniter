<!DOCTYPE html>
<!-- View 13 : Input dan Pemfilteran dalam CI -->

<html>
	<head>
		<title><?php echo $judul; ?></title>
	</head>
	<body>
		<?php

		echo heading($judul, 1);
		echo form_open($aksi);
			echo form_label("Nama user : ");
			echo form_input($username);
			echo form_label("Password : ");
			echo form_password($userpass);
			echo form_submit("", "Login");
		echo form_close();


		?>
	</body>
</html>