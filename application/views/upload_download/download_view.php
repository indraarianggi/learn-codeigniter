<!DOCTYPE html>
<!-- View 46 : Download File -->

<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
	<?php

	echo heading($title, 2);
	echo heading("Show Data File!", 3);

	$jf = sizeof($files);
	for ($i=0; $i<$jf; $i++) { 
		echo anchor("upload_download/download/showdata/" . $files[$i], $files[$i]) . br();
	}

	echo "<hr/>";
	echo heading("Download File!", 3);
	for ($i=0; $i<$jf; $i++) { 
		echo anchor("upload_download/download/downloadfile/" . $files[$i], $files[$i]) . br();
	}

	?>
	</body>
</html>