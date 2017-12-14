<!DOCTYPE html>
<!-- View 17 : Pemfilteran XSS -->

<html>
	<head>
		<title><?php  echo $judul; ?></title>
	</head>
	<body>
		<?php

		echo heading($judul, 1);
			echo form_open($aksi);
			echo form_label("Type your text : ");
			echo form_textarea($teks);
			echo "<br/>";
			echo form_submit("", "Send");
		echo form_close();

		?> 
	</body>
</html>