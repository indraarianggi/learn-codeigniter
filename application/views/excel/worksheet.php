<!DOCTYPE html>
<!-- View 43 : Uji coba methode listWorksheetNames() dan listWorksheetInfo() dari library PHPExcel -->

<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
	<?php

	echo "<h1> $title </h1>";
	echo "<hr/>";

	echo '<h2>Worksheet Names</h2>';
	echo '<ol>';
	foreach ($worksheetNames as $worksheetName) {
	    echo '<li>'. $worksheetName . '</li>';
	}
	echo '</ol>';

	echo "<hr/>";

	echo '<h2>Worksheet Information</h2>';
	echo '<ol>';
	foreach ($worksheetData as $worksheet) {
	    echo '<li>'. $worksheet['worksheetName'] . '<br />';
	    echo 'Rows: '. $worksheet['totalRows'] . ' Columns: ' . $worksheet['totalColumns'] . '<br />';
	    echo 'Cell Range: A1:' . $worksheet['lastColumnLetter'] . $worksheet['totalRows'];
	    echo '</li>';
	}
	echo '</ol>';

	?>
	</body>
</html>