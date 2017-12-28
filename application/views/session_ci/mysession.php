<!DOCTYPE html>
<!-- View 47 : Session dalam CodeIgniter -->
<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
		<?php echo heading($title, 2); ?>

		<ul>
			<?php

			foreach ($varsession as $item => $value) {
				echo "<li>" . $item . " : " . $value . "</li>";
			}

			?>
		</ul>
	</body>
</html>