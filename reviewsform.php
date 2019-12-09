<?php 
	$name = $_COOKIE['user'];
	$stat = filter_var(trim($_POST['stat']),
	FILTER_SANITIZE_STRING);
	$text = filter_var(trim($_POST['reviews']),
	FILTER_SANITIZE_STRING);
	$mysql=new mysqli('localhost','root','','site');
		$mysql->query("INSERT INTO `reviews` (`name`,`text`,`stat`)
		VALUES('$name','$text','$stat')");
		

	

	$mysql->close;
	header('Location:/reviews.php');
 ?>
	
