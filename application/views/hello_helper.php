<!DOCTYPE html>

<!-- View 2 : Hello World! => view dengan bantuan Helper -->

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
		<?php echo heading($title, 1) ?>
		<div id="container">
			<?php

			$keys = array_keys($bahasa);
			$key_lenght = sizeof($keys);
			$bhskal = array();

			for ($c=0; $c<$key_lenght; $c++) {
				$bhskal[] = "Kode : " . $keys[$c] . " >> Bahasa : " . $bahasa[$keys[$c]];
			}

			echo ul($bhskal);
			
			echo ol($bhskal);

			?>
		</div>
	</body>
</html>