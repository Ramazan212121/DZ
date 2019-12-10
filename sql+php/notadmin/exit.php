<?php
		setcookie('user', $user['login'],time()-3600,"/");
		setcookie('admin', $user['login'],time()-3600,"/");
		header('Location:/main.php');
?>
