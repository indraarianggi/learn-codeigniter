<!DOCTYPE html>
<!-- View 12 : Form dalam CodeIgniter -->

<html>
	<head>
		<title></title>
	</head>
	<body>
	<?php

		echo heading($title, 1);

		echo form_open("form");
			echo form_label("Nama user: ", "username", $lblstyle);
			echo form_input($username);
			echo br();echo br();

			echo form_label("Password: ");
			echo form_password($userpass);
			echo br();echo br();

			echo form_label("Bahasa yang dikuasai: ");
			echo form_checkbox($chkbox1);
			echo form_label("Java");
			echo form_checkbox($chkbox2);
			echo form_label("PHP");
			echo br();echo br();

			echo form_label("Jenis Kelamin: ");
			echo form_radio($radio1);
			echo form_label("Laki-laki");
			echo form_radio($radio2);
			echo form_label("Perempuan");
			echo br();echo br();

			echo form_label("Komentar: ");
			echo form_textarea($txtarea);
			echo br();echo br();

			echo form_button($btn);
			echo br();echo br();
			echo form_reset($btnReset);			
			echo form_submit($btnSubmit);
		echo form_close();

	?>
	</body>
</html>