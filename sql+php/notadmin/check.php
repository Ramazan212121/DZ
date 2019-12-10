<?php
	if($_SERVER["REQUEST_METHOD"]!="POST") {
		header("Location: "."/reg.php");
	}
	
	$login=filter_var(trim($_POST['login']),
	FILTER_SANITIZE_STRING);
	
	$email=filter_var(trim($_POST['email']),
	FILTER_SANITIZE_STRING);
	
	$password=filter_var(trim($_POST['password']),
	FILTER_SANITIZE_STRING);
	
	$password1=filter_var(trim($_POST['password1']),
	FILTER_SANITIZE_STRING);
	
	if(mb_strlen($login) < 5 || mb_strlen($_login) > 90){
			set_message( "Недопустимая длина логина ");
			exit();
	}elseif ($_password != $_password1){
			set_message("Вы неправильно подтвердили пароль");
			exit();
	}
	$password=md5($password);

	
	$mysql=new mysqli('localhost', 'root', '', 'site');
	$mysql->query("INSERT INTO `users`(`login`, `password`, `email`)
	VALUES('$login','$password','$email')");

	
	$mysql->close();
	header('Location:/main.php');
?>
