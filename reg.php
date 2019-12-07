<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Регистрация</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
		body{background-color: bisque;
		align:center;
		}
	
	</style>
</head>
<body>
	<div class="container mt-4">
		<h1>Регистрация</h1>
		<form action="check.php" method="post">
			<input required  type="text" class="form-control" name="login" id="login" placeholder="Введите Логин"><br>
			<input required type="email" class="form-control" name="email" id="email" placeholder="Введите email"><br>
			<input required  type="password" class="form-control" name="password" id="password" placeholder="Введите пароль"><br>
			<input required type="password" class="form-control" name="password1" id="password1" placeholder="Подтвердите пароль"><br>
			<button class ="btn btn-success" type="submit">Зарегистрироваться</button>
		</form>
	</div>
</body>
</html>
