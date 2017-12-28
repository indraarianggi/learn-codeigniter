<!DOCTYPE html>
<!-- View 50 : Implementasi Session dalam CodeIgniter => Form Login -->
<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
		<?php
			echo heading($subtitle, 2);

			if($pesan) {
				echo heading($pesan, 3);
			}

			echo form_open($scriptaksi);
				echo form_label("Nama user : ");
				echo form_input("username");
				echo br();
				echo form_label("Password : ");
				echo form_input("userpass");
				echo br();
				echo form_submit("btnLogin", "Login");
			echo form_close();
		?>
		<hr/>
		<?php $this->load->view("session_ci/app_menu"); ?>
	</body>
</html>