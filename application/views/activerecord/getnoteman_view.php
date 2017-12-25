<!DOCTYPE html>
<!-- View 40 : CRUD => form get nomor teman -->

<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
	<?php

	$input = array(
			"name"	=> "noteman",
			"value"	=> ""
		);

	echo heading($title, 2);
	echo form_open($scriptaksi);
		echo form_label("No Teman : ");
		echo form_input($input);
		echo form_submit("btnGet", "Get Data");
	echo form_close();
	?>
	</body>
</html>