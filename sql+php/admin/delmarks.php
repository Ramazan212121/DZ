<?php
	$mysql = new mysqli('localhost','root','','site');
	$id = filter_var(trim($_POST['delmarks']),
	FILTER_SANITIZE_STRING);
	$mysql->query("DELETE FROM `marks` WHERE `id`='$id'");
	$mysql->close;
	header("Location: ".$_SERVER["HTTP_REFERER"]);
?>
