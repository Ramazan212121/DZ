<?php 
	$name = $_COOKIE['user'];
	$text = filter_var(trim($_POST['text']),
	FILTER_SANITIZE_STRING);
	$photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
	$mysql=new mysqli('localhost','root','','site');
		$mysql->query("INSERT INTO `suggestions_acc` (`name`,`text`,`photo`)
		VALUES('$name','$text','$photo')");
	$mysql->close;
	header('Location:/suggestions.php');
?>
