<?php
	require_once __DIR__ . '/include/config.php';

	unset($_SESSION['cajafuerte']);

	header("Location:cajafuerte.php");
?>
