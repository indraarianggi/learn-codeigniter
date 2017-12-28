<!DOCTYPE html>
<!-- View 48 : Session dalam CodeIgniter => show session_id -->

<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
		<?php echo heading($title, 2); ?>

		<ul>
			<?php
				echo "<li>" . $item . " : " . $value . "</li>";
			?>
		</ul>
	</body>
</html>