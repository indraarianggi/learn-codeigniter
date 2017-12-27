<!DOCTYPE html>
<!-- View 45 : Upload File => Upload Sukses -->

<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
	<?php

	echo heading($title, 2);
	echo heading("Your file was successfully uploaded!", 3);

	?>

	<ul>
		<?php
			foreach ($upload_data as $item => $value) {
		?>
		
		<li><?php echo $item . " : " . $value; ?></li>

		<?php

		}

		?>
	</ul>


	<p><?php echo anchor("upload_download/upload", "Upload Another File!"); ?></p>
	</body>
</html>