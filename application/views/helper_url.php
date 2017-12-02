<!DOCTYPE html>
<html>
	<head>
		<title>Belajar Helper URL</title>
	</head>
	<body>

		<?php

		echo anchor("Helper_html/html", "Generate dokumen dengan helper HTML", "title='Contoh Dengan Helper HTML'");

		?>

		<br/>
		<br/>

		<?php

		echo anchor_popup("http://codeigniter.com/", "Home of CodeIgniter", "title='Popup to CodeIgniter Home'");

		?>

	</body>
</html>