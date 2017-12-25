<!DOCTYPE html>
<!-- View 38 : Active Record CI => Form CRUD -->

<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
	<?php

	echo heading($title, 2);
	echo form_open($scriptaksi);
		echo form_label("No Teman : ");

		if($aksi!="add") {
			echo form_hidden($noteman["name"], $noteman["value"]) . $noteman["value"];
		}
		else {
			echo form_input($noteman);
		}
		
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
		echo form_submit("btnSubmit", "$aksi");
	echo form_close();

	?>
	</body>
</html>