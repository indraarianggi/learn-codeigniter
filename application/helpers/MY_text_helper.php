<?php

/**
*	Helper 2 : helper format text
*/

if (!defined('BASEPATH')) exit('No direct script access allowed');

function displaypre($text="") {
	$pretext = "<pre>";
	$pretext .= $text;
	$pretext .= "</pre>";

	return $pretext;
}

function showmessage($text="", $tmsg="normal") {
	$style = array(
		"err" => "red",
		"warn" => "orange",
		"normal" => "white"
	);

	$boxmsg = "<div style=\"background:{$style[$tmsg]}\">";
	$boxmsg .= ($tmsg!=="normal")?$tmsg."! ":"";
  	$boxmsg .= $text;
  	$boxmsg .= "</div>";

  	return $boxmsg;
}

?>