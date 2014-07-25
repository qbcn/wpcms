<?php
	if (strpos($_SERVER['HTTP_HOST'],'www') === false) {
		header('location: http://www.'.$_SERVER['HTTP_HOST'], true, 301);
	}
	exit;
?>