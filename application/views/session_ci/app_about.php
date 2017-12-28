<!DOCTYPE html>
<!-- View 52 : Implementasi Session dalam CodeIgniter => About Page -->
<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
		<?php echo heading($subtitle, 2); ?>

		<div>
			<p>
				Teks pada halaman ini sekedar untuk menunjukkan halaman yang akan bisa diakses setelah pengguna berhasil melakukan login.
			</p>
			<p>
				Jadi tidak ada apa-apa, karena hanya untuk demo saja bagaimana kita bisa menggunakan session dari CodeIgniter.
			</p>
		</div>
		<hr/>

		<?php $this->load->view("session_ci/app_menu"); ?>
	</body>
</html>