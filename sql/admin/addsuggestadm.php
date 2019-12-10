<?php 
	$id= filter_var(trim($_POST['addsuggestadm']),FILTER_SANITIZE_STRING);
	
	$mysql=new mysqli('localhost','root','','site');
		$mysql->query("UPDATE `suggestions_acc` SET `access`='$id' WHERE `id`='$id'");
	$mysql->close;
	header('Location:/suggestions_acc.php');
?>
