<?php echo doctype($doctype); ?>
<html>
	<head>
		<title></title>

		<?php

		// Meta document
		echo meta($metadoc);

		// Link css
		echo link_tag($link_css);

		?>
	</head>
	<body>

		<?php

		// Heading
		echo heading($heading, 2);
		echo br(); // => <br/>

		// Image
		echo img($image);

		?>

	</body>
</html>