<!DOCTYPE html>
<!-- View 39 : Active Record CI => Form CRUD Message-->

<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
	<?php
		echo heading($title, 2);
		if (isset($adata)) {
	?>

	<table style="margin:auto; width:80%;">
		<?php

		echo "No : " . $adata["noteman"];
		echo br();
		echo "Nama : " . $adata["namateman"];
		echo br();
		echo "No Telp : " . $adata["notelp"];
		echo br();
		echo "Email : " . $adata["email"];
		echo br();
		echo "<hr/>";

		?>
	</table>

	<?php
	}

	echo $message;
	echo br();
	$this->load->view("activerecord/menu");

	?>
	</body>
</html>