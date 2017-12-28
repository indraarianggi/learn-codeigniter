<!DOCTYPE html>
<!-- View 49 : Implementasi Session dalam CodeIgniter => Welcome Page -->
<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
		<?php echo heading($subtitle, 2); ?>

		<div>
			<?php

			echo "Selamat datang.. " . $this->session->userdata("user_data");
			echo br();
			echo "Anda telah berhasil melakukan login..";

			echo "<p>Silahkan klik menu yang tersaji di bawah ini..</p>";

			?>
		</div>
		<hr/>

		<?php $this->load->view("session_ci/app_menu"); ?>
	</body>
</html>