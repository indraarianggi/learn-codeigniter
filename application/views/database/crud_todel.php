<!DOCTYPE html>
<!-- View 33 : CRUD => form delete -->

<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
	<?php

	echo heading($title, 2);
	echo form_open($scriptaksi);
		echo form_label("No Teman : " . $noteman);
		echo br();
		echo form_label("Nama Teman : " . $namateman);
		echo br();
		echo form_label("No Telepon : " . $notelp);
		echo br();
		echo form_label("Email : " . $email);
		echo "<hr/>";
		echo "Yakin data akan dihapus ? ";
		echo form_hidden("noteman", "$noteman");
		echo form_submit("btnDel", "Delete");
		echo form_submit("btnDel", "Batal");
	echo form_close();

	?>
	</body>
</html>