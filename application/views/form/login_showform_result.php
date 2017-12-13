<!DOCTYPE html>
<!-- View 14 : Input dan Pemfilteran dalam CI -->

<html>
	<head>
		<title><?php echo $judul; ?></title>
	</head>
	<body>
		<?php

		echo heading($judul, 1);
		echo "Nama user : ";
		echo $username;
		echo br();
		echo "Password : ";
		echo $userpass;

		?>
	</body>
</html>