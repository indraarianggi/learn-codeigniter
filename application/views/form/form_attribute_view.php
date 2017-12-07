<!DOCTYPE html>
<!-- View 9 : form_helper.php -->

<html>
	<head>
		<title><?php echo $title ?></title>
	</head>
	<body>
	<?php

		echo heading($title, 1);
			echo form_open("form");
			echo form_label("Nama user : ");
			echo form_input($username);
			echo form_label("Password : ");
			echo form_password($password);
			echo form_submit("", "Login");
		echo form_close();

	?>
	</body>
</html>