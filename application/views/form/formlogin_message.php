<!DOCTYPE html>
<!-- View 15 : Input dan Pemfilteran dalam CI -->

<html>
	<head>
		<title><?php echo $judul; ?></title>
	</head>
	<body>
		<?php

		echo heading($judul, 1);

		?>

		Silahkan memasukkan nama pengguna dan kata kunci untuk masuk ke dalam aplikasi !

		<?php

		echo form_open($aksi);
			echo form_label("Nama user : ");
			echo form_input($username);
			echo form_label("Password : ");
			echo form_password($userpass);
			echo form_submit("", "Login");
		echo form_close();

		?>

		<?php

		if($errmessage != "firsttime") {
			echo showmessage($errmessage, "err");
		}

		?>
	</body>
</html>