<!DOCTYPE html>
<!-- View 26 : Membaca dan Menampilkan Data dengan model MVC -->
<!-- Array -->

<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
	<?php
		echo heading($title, 2);
		// Menampilkan jumlah record yang berhasil dibaca
		// dengan fungsi num_rows()
		echo heading("Jumlah record : " . $hslquery->num_rows(), 3);
		echo "<hr/>";
	?>

		<table style="margin:auto;width:80%;">
			<?php
			
			$c = 1; // variabel untuk membantu merapikan baris

			// result_array() => mengubah objek record menjadi array record.
			foreach ($hslquery->result_array() as $row) {
				if ($c>2) {
					echo "</tr>";
					$c=1;
				}
				if ($c==1) {
					echo "<tr>";
				}

				echo "<td>";
				echo "No : " . $row["noteman"];
				echo br();
				echo "Nama : " . $row["namateman"];
				echo br();
				echo "No Telp : " . $row["notelp"];
				echo br();
				echo "Email : " . $row["email"];
				echo "<hr/>";
				echo "</td>";
				$c++;
			}

			?>
		</table>
	</body>
</html>