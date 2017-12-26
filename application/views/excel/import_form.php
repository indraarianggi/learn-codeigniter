<!DOCTYPE html>
<!-- View 42 : PHPExcel => Import data dari file excel -->

<html>
	<head>
		<title><?php echo $title; ?></title>
	</head>
	<body>
		<h2><?php echo $title; ?></h2>

		<div style="margin-top: 20px">
			<form action="<?php echo base_url($aksi); ?>" method="post" enctype="multipart/form-data">
				<input type="file" name="file">
				<input type="submit" value="Upload File">
			</form>
		</div>
		<br/>
		<br/>
		<?php
			$this->load->view('activerecord/menu');
		?>
	</body>
</html>