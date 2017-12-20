<!DOCTYPE html>
<!-- View 25 : Membaca dan Menampilkan Data dengan Model MVC -->

<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
	<?php
		echo heading($title, 2);
	?>

		<table style="margin:auto;width:80%;">
			<?php

			$c = 1; // variabel untuk membantu merapikan baris
			foreach ($hslquery->result() as $row) {
				if ($c>2) {
					echo "</tr>";
					$c=1;
				}
				if ($c==1) {
					echo "<tr>";
				}

				echo "<td>";
				echo "No : " . $row->noteman;
				echo br();
				echo "Nama : " . $row->namateman;
				echo br();
				echo "No Telp : " . $row->notelp;
				echo br();
				echo "Email : " . $row->email;
				echo "<hr/>";
				echo "</td>";
				$c++;
			}

			?>
		</table>
	</body>
</html>