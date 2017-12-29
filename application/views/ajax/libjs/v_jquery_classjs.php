<!-- View 66 : Library JavaScript CodeIgniter -->

<?php

// a simple js script
$script = "alert('Hello World!');";

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Demo jQuery</title>
		<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.1.1.js'); ?>"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				<?php
					echo $this->javascript->click('#clickme', $script);
					/* SINTAKS UMUMNYA
						$this->javascript->event('selector', script);

							event 		=> adalah jQuery event
							selector 	=> elemen HTML tujuan
							script 		=> kode javascript yang akan dieksekusi oleh browser
					*/
				?>
			});
		</script>
	</head>
	<body>
		<div id="clickme">
			Click Me
		</div>
		<img id="book" src="<?= base_url('assets/image/dummy_image.png') ?>" alt="" style="position: relative; left: 10px;">
	</body>
</html>

<!--

	DAFTAR EVENT YANG MENJADI FUNGSI UNTUK OBJEK JAVASCRIPT

blur
change
click
dbclick
error
focus
hover
keydown
keyup
load
mousedown
mouseup
mouseover
resize
scroll
unload


	EFEK

Selain event dari suatu objek, class jQuery memiliki fungsi untuk menghasilkan efek-efek yang ada dalam jQuery
Sintaks umumnya :

	echo $this->javascript->efek('selector' [, opsi_tambahan]);

		efek 		=> adalah pilihan efek yang akan digunakan
		selector	=> elemen html yang akan diberi efek


Daftar efek jQuery yang menjadi fungsi dalam librari class jQuery CI :


show()
hide()
toggle()
animate()
fadeIn()
fadeOut()
toggleClass()
slideUp()
slideDown()
slideToggle()

-->