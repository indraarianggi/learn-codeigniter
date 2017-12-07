<!DOCTYPE html>
<!-- View 10 : form_helper.php -->

<html>
	<head>
		<title></title>
	</head>
	<body>
	<?php

		echo heading($title, 1);
			echo form_open("Login");
			echo form_label("Nama user : ");
			echo form_input($username);
			echo form_label("Password : ");
			echo form_password($userpass);
			echo form_submit("", "Login");
		echo form_close();

	?>
	</body>
</html>