<!DOCTYPE html>

<!-- View 3 : Perluasan helper date (date_helper) -->

<html>
	<head>
		<title><?php echo $title; ?></title>
		<style type="text/css">
			#container {
				margin: 10px;
				border: 1px solid #D0D0D0;
				background: #F57C40;
				height: 200px;
				width: 400px;
				-webkit-box-shadow: 0 0 8px #D0D0D0;
			}
		</style>
	</head>
	<body>
		<?php echo heading($title, 1); ?>
		<div id="container">
			<?php
				echo "Tanggal hari ini : " . $tglhariini;
				echo br();
				echo "Terbilang : " . namahari($nohari) . ", " . $tgl . " " . namabulan($bln) . " " . $thn;
				br();
			?>
		</div>
	</body>
</html>