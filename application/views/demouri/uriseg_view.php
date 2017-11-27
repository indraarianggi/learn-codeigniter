<!DOCTYPE html>
<!-- View 6 : URI dan Segmentasi (showurisegmen) -->
<html>
<head>
	<title>URI dan Segmentasi</title>
</head>
<body>
	<?php

	echo heading("Menampilkan URI dan Segmennya", 2);
	echo br();

	echo "String URI : " . $stringUri;
	echo br(); echo br();

	echo "Jumlah Segmen URI : " . $jlhSegment;
	echo br(); echo br();

	echo "Rincian URI :"; echo br();
	for ($i=1; $i<=$jlhSegment ; $i++) { 
		echo "Segmen $i : " . $this->uri->segment($i);
		echo br();
	}

	?>
</body>
</html>