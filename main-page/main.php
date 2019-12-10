<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<div class="header">
		<h1>Добро пожаловать на наш сайт!</h1><br>
		<h2>Здесь в найдете много информации об автомобильных марках!</h2>
	</div>
	<div class="content">
		<div class="mcontent">
			<a href="bmw/bmw.html"><img src="/bmw/bmw.png" width="250px" height="200px" style="align:center"></a>
			<a href="/mercedes/mercedes.html"><img src="/mercedes/mercedes.png" width="300px" height="200px"></a>
			<a href="/ferrari/ferrari.html"><img src="/ferrari/ferrari.png" width="200px" height="200px"></a></td>	
			<a href="/lamborghini/lamborghini.html"><img src="/lamborghini/lamborghini.png" width="300px" height="200px"></a><br>
			<h1 style="font-family:Сomic Sans MS;padding:200px;padding-left:350px;">Другие марки на подходе</h1>
		</div>
		<div class="colomn">
			<div class="menu">
				<h3 align="center" style="font-size:35px;">Меню</h3><br>
				<p align="center"  color="white"><a  href="news.html" class="s13" ><span style="margin-left:5px;">Новости</span></a></p>
				<p align="center"  color="white"><a  href="suggestions.html" class="s13" ><span style="margin-left:5px;">Предложения</span></a></p>
				<p align="center"  color="white"><a  href="reviews.html" class="s13" ><span style="margin-left:5px;">Отзывы</span></a></p>
			</div>
			<?php
				if($_COOKIE['user'] == '' and $_COOKIE['admin']==''):
			?>
				<div class="auth">
					<form action="auth.php" method="post" class="form">
						<h2 align="center" style="margin-top:5px;font-style:Arial;font-size:35px;" color="white" >Авторизация</h2><br>
						<p><input required  type="text" class="form-control" name="login" id="login" placeholder="Введите Логин"></p><br>
						<p ><input required  type="password" class="form-control" name="password" id="password" placeholder="Введите пароль"></p><br>
						<p style="float:left"><button class ="btn btn-success" type="submit">Продолжить</button></p>
					</form>
					<span style="float:left;padding-left:10px;padding-top:6px;"><a href="reg.html" class="s13">Зарегистрироваться</a></span>
				</div>
			
			<?php elseif ($_COOKIE['user']!='' and $_COOKIE['admin']==''):?>
				<div class="auth">
					<h2 style="padding-top:40px">Вы авторизованы как: <?=$_COOKIE['user']?>.<br></h2>
					<p style="padding-top:40px;padding-left:10px"><a href="/exit.php" class="s13">Выйти</a></p>
				</div>
			<?php else: ?>
				<div class="auth">
					<h2 style="padding-top:40px">Вы авторизованы как: <?=$_COOKIE['user']?>.<br></h2>
					<p style="padding-top:40px;padding-left:10px"><a href="/exit.php" class="s13">Выйти</a></p>
					<p style="padding-left:10px;padding-top:40px;"><a href="adminpanel.php" class="s13">Админ Панель</a></p>
				</div>
			<?php endif; ?>	
		</div>
	</div>
	<div class="footer">
	<h2>Кликайте на логотип марки, чтобы узнать информацию о ней!</h2>
	</div>
</body>
</html>
