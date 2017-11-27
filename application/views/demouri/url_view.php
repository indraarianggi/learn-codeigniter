<!DOCTYPE html>
<!-- View 7 : URI dan Segmentasi (showurluri) -->

<html>
<head>
	<title>URI dan Segmentasi</title>
</head>
<body>
	<?php

	echo heading("Menampilkan URI dan Segmennya", 2);
	echo br();

	echo "Base URL : " . $baseUrl;
	echo br(); echo br();

	echo "Site URL : " . $siteUrl;
	echo br(); echo br();

	echo "String URI : " . $stringUri;
	echo br(); echo br();

	echo "Jumlah Segmen URI : " . $jlhSegmen;
	echo br(); echo br();

	echo "Rincian URI :"; echo br();
	for ($i=1; $i<=$jlhSegmen; $i++) { 
		echo "Segmen $i : " . $this->uri->segment($i);
		echo br();
	}

	?>
</body>
</html>