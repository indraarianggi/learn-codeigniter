<!DOCTYPE html>
<!-- View 28 : Pagination -->

<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
	<?php
		echo heading($title, 2);
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

	<?php
		echo $pagination; // links pagination
	?>
	</body>
</html>