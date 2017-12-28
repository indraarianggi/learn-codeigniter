
<!-- View 51 : Implementasi Session dalam CodeIgniter => Menu -->

<?php

	$menu = array(
		"session_ci/session_app/welcome"	=> "Welcome",
		"session_ci/session_app/about"		=> "About",
		"session_ci/session_app/logout"		=> "Logout"
		);

	foreach ($menu as $url => $value) {
		echo " | " . anchor($url, $value) . " | ";
	}

?>