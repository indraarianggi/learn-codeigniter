<!DOCTYPE html>
<!-- View 22 : Library Calendar -->

<html>
	<head>
		<title><?php echo $judul; ?></title>
	</head>
	<body>
	<?php

	echo "<table>";
	echo "<captiopn>". heading($judul, 2) . "</caption>";

	$i = 1;
	foreach ($varkal as $bulan => $kal) {
		if ($i==1) echo "<tr>";
		echo "<td style='cellpadding:5px; border:solid 1px'>" . $kal . "</td>";
		$i++;
		if ($i==5) {
			echo "</tr>";
			$i = 1;
		}
	}
	echo "</table>";

	?>
	</body>
</html>