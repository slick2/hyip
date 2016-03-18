<?php
	require_once("const.php");

	global $mysqli;
	$mysqli = new mysqli(DB_SERVER,DB_USER, DB_PASS,DB_NAME);
	if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: " . $mysqli->connect_error;
	}
?>
