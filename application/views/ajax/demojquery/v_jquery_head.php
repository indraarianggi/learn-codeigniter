<!DOCTYPE html>
<!-- View 55 : Web Sederhana dengan jQuery => Head -->

<html>
	<head>
		<title<?php echo $title; ?>></title>
		<?php

		$namameta = array(
			array('name' => 'robots', 'content' => 'no-cache'),
			array('name' => 'description', 'content' => "$title"),
			array('name' => 'keywords', 'content' => 'buku, CI, view, dir demo'),
			array('name' => 'Content-type', 'content' => 'text/html; charset=utf-8', 'type' => 'equiv')
			);

		echo meta($namameta);
		// echo link_tag("assets/css/mystyle.css");

		?>

		<script type="text/javascript" src="<?= base_url('assets/js/jquery-3.1.1.js'); ?>"></script>