<!DOCTYPE html>
<!-- View 67 : PDF => Preview sebelum data diubah menjadi PDF -->

<html>
	<head>
		<title>Cetak PDF</title>
	</head>
	<body>
		<h1 style="text-align: center;">
			Data Teman
		</h1>
		<a href="<?php echo base_url('pdf/pdf/cetak'); ?>">
			Cetak Data
		</a>

		<br/><br/>

		<table border="1" width="100%">
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Telepon</th>
				<th>Email</th>
			</tr>
			
			<?php

				if(!empty($teman)) {
					foreach ($teman->result_array() as $row) {
						echo "<tr>";
						echo "<td>" . $row["noteman"] . "</td>";
						echo "<td>" . $row["namateman"] . "</td>";
						echo "<td>" . $row["notelp"] . "</td>";
						echo "<td>" . $row["email"] . "</td>";
						echo "</tr>";
					}
				}

			?>
		</table>
	</body>
</html>