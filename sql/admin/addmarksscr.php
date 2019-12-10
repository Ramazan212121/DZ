<?php 
	$mark = filter_var(trim($_POST['mark']),
	FILTER_SANITIZE_STRING);
	$start = filter_var(trim($_POST['start']),
	FILTER_SANITIZE_STRING);
	$text = filter_var(trim($_POST['text']),
	FILTER_SANITIZE_STRING);
	$photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
	$mysql=new mysqli('localhost','root','','site');
		$mysql->query("INSERT INTO `marks` (`mark`,`start`,`text`,`photo`)
		VALUES('$mark','$start','$text','$photo')");


	

	$mysql->close;
	header('Location:/adminpanel.php');
  ?>
	
