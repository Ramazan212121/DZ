<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
		body {
			background:linear-gradient(azure, bisque);
			background-repeat:no repeat;
			height:800px;
		}
	</style>


</head>
<body>
<div  style="float:center;width:800px;border:2px black solid;border-radius:10px;margin-top:100px;margin-left:400px;padding:50px;padding-bottom:100px;">
		<h2 style="color:red">Вы ввели неправильный логин или пароль!</h2>
		<form action="auth.php" method="post" class="form">
		<h2 align="center" style="margin-top:5px;font-style:Arial;font-size:35px;" color="white" >Авторизация</h2><br>
		<p><input required  type="text" class="form-control" name="login" id="login" placeholder="Введите Логин"></p><br>
		<p ><input required  type="password" class="form-control" name="password" id="password" placeholder="Введите пароль"></p><br>
		<p style="float:left"><button class ="btn btn-success" type="submit">Продолжить</button></p>
		</form>
		<span style="float:left;padding-left:10px;padding-top:6px;"><a href="reg.php">Зарегистрироваться</a></span>
</div>
</body>
</html>
