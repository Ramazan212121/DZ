<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Отзывы</title>
	<link rel="stylesheet" href="reviews.css" type="text/css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
	body{
		min-height:1000px;
	}
	</style>

</head>
<body>
	<div class="header">
		<h1>Отзывы.</h1>
		<h2>Здесь вы можете оставить отзыв о нашем сайте.</h2>
		<a href="/main.php" class="s13" style="float:right;font-size:25px;margin-top:-70px;">На Главную</a>

	</div>
	<div class="content">
		<div class="uploadedrev">
			<h2 style="border-bottom:2px solid black;padding-bottom:10px;">Оставленные отзывы:</h2>
		</div>
		<?php 
			$mysql = new mysqli('localhost','root','','site');
			$query ="SELECT `id`,`name`,`text`,`stat` FROM `reviews`";
 
			$result = mysqli_query($mysql, $query); 
			if($result)
			$rows = "";
				while($rows = $result->fetch_assoc()){
					echo "<div style=\"padding:30px;border:1px solid black;border-radius:10px; margin:40px;\">";
					echo "<p style=\"float:right;margin-right:25px\">Оценка пользователя:  ".$rows["stat"]." балла</p>";
					echo "<b>".$rows["name"].":</b>  ".$rows["text"]."";
					if(isset($_COOKIE['admin'])){	echo "<p style=\"float:center\"><form action=\"delreview.php\" method=\"POST\">
					Отметьте галочку, чтобы удалить отзыв: <input type=\"checkbox\" name=\"delreview\" value=".$rows["id"].">
					<input type=\"submit\" value=\"Подтвердить\">
					</form></p></div>";}}

				
					mysqli_free_result($result);
				mysqli_close($mysql);
				?>
		</div>		
		<?php if($_COOKIE['user'] != ''):?>
		<div class="footer" style="min-height:500px;margin-bottom:15px;">
		<p><b>Напишите ваше мнение о нашем сайте:</b></p>
		<form method="POST" action="reviewsform.php">
			<p><textarea rows="10" cols="150" name="reviews"></textarea></p>
			<p>Ваша оценка <select name="stat" size="1">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option></select></p>
			<p><input type="submit" value="Отправить" class ="btn btn-success"></p>
			
			
	
		</form>
		<p style="font-size:25px;"><b>Мы ценим ваше мнение =3</b></p>
		</div>
		<?php else:?>
		<p class="error" style="margin:50px;font-size:30px;">Чтобы оставить комментарий, <a href="/main.php" class="s1">войдите</a> или <a href="/reg.php" class="s1">зарегистрируйтесь</a>.</p>
		<?php endif;?>
		
	</div>

</body>
</html>
