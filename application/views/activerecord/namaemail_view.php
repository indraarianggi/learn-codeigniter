<!DOCTYPE html>
<!-- View 36 : Active Record CI => Menampilkan Nama dan Email saja -->

<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
		<?php

		echo heading($title, 2);
		echo "Jumlah record : " . $hslquery->num_rows();
		echo "<hr/>";

		?>

		<table style="margin:auto; width:80%;">
			<?php

			$c = 1;
			foreach ($hslquery->result_array() as $row) {
				if($c>2) {
					echo "</tr>";
					$c=1;
				}

				if($c==1) {
					echo "<tr>";
				}

				echo "<td>";
				echo "Nama : " . $row["namateman"];
				echo br();
				echo "Email : " . $row["email"];
				echo br();
				echo "<hr/>";
				echo "</td>";
				$c++;
			}

			?>
		</table>

			<?php
				$this->load->view("activerecord/menu");
			?>

	</body>
</html>