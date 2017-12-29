<!-- View 56 : Web Sederhana dengan jQuery => Judul -->

</head>
	<body>
	<?php

		$img = array(
			"src"		=> "assets/image/dummy_image.png",
			'height'	=> 90,
			'width'		=> 90
			);

		echo img($img);
		echo heading($title, 2);

	?>