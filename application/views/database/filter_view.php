<!DOCTYPE html>
<!-- View 29 : Filter -->

<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
	<?php

	$input = array(
			"name"	=> "namateman",
			"value"	=> "$namateman"
		);

	echo heading($title, 2);
	echo form_open("database/filter/filterteman");
		echo form_label("Nama teman : ");
		echo form_input($input);
		echo form_submit("btnFilter", "Filter");
	echo form_close();

	?>

	<table style="margin:auto;width:80%">
	<?php
		$c = 1;
		foreach ($hslquery->result_array() as $row) {
			echo "<tr>";
			echo "<td>";
			echo "No : " . $row['noteman'];
			echo br();
			echo "Nama : " . $row['namateman'];
			echo br();
			echo "No Telp : " . $row['notelp'];
			echo br();
			echo "Email : " . $row['email'];
			echo "<hr/>";
			echo "</td>";
			echo "</tr>";
		}
	?>
	</table>
	</body>
</html>