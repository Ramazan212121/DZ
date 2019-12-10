<?php
	$mysql = new mysqli('localhost','root','','site');
	$id = filter_var(trim($_POST['delnew']),
	FILTER_SANITIZE_STRING);
	$mysql->query("DELETE FROM `news` WHERE `id`='$id'");
	$mysql->close;
	header("Location: ".$_SERVER["HTTP_REFERER"]);
?>
