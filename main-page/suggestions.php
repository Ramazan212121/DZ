<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">

	<link rel="stylesheet" type="text/css" href="suggestions.css">
	<title>Предложения</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
	.header {
	width:1500px;
	height:250px;
	
	padding-top:40px;
	border:2px solid black;
	border-radius:10px;
	margin-left:50px;

}
.content {
	width:1500px;
	margin-left:50px;
	border-collapse:collapse;
	margin-top:3px;
	border-radius:10px;
	margin-bottom:3px;
	border:2px solid black;
	padding:20px;
	height:auto;
	overflow:auto;
	border-radius:10px;
}


.footer {
	width:1500px;
	height:500px;
	border-top:2px;
	border:2px solid black;
	margin-left:50px;
	border-radius:10px;
	text-align:center;
	padding-top:20px;
}
</style>
</head>
<body>
	<div class="header">
		<h1>Предложения</h1>
		<h2>На этой странице вы можете предлагать свой контент и видеть контент от пользователей нашего сайта. </h2>
		<a href="main.php" class="s13" style="float:right;font-size:25px;margin-bottom:10px;">На Главную</a>

	</div>
	<div class="content" ">
			<?php
			error_reporting(0);
			$text = filter_var(trim($_POST['text']),
			FILTER_SANITIZE_STRING);
			$photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
			$name=$_COOKIE['user'];
			$mysql = new mysqli('localhost','root','','site');
			$query ="SELECT `id`,`name`,`text`,`photo` FROM `suggestions_acc` WHERE `access` IS NOT NULL";
 
			$result = mysqli_query($mysql, $query); 
			if($result)
			$rows = "";
				while($rows = $result->fetch_assoc()){
					echo "<div style=\"padding:20px;border:1px solid black;border-radius:10px; margin:40px;min-height:270px;\">";
					$show_img=base64_encode($rows['photo']);?>
					<img src="data:image/jpeg;base64,<?php echo $show_img ?>"  style="width:300px;height:200px;float:right;">
				<?php echo "<b>".$rows["name"].":</b>  ".$rows["text"]."
									<p style=\"float:center;margin-top:15px\"><form action=\"delsuggestion.php\" method=\"POST\">
											Отметьте галочку, чтобы удалить контент: <input type=\"checkbox\" name=\"delsuggestadm\" value=".$rows["id"].">
						
											<input type=\"submit\" value=\"Подтвердить\"></form></p></div>";}
				
				mysqli_free_result($result);
				mysqli_close($mysql);
		?>
		</div>
		<?php if($_COOKIE['user'] != ''):?>
		<div class="footer" style="height:500px;margin-bottom:10px;">
			<h3>Ваш контент:</h3>
			<form action="addsuggest.php"  method="POST" enctype="multipart/form-data" >
			<p><textarea rows="10" cols="150" name="text"></textarea></p>
			<p><input type="file" name="photo"><input type="submit" value="Отправить" class="btn btn-success"></p>		
			</form><br>
					<a href="main.php" class="s13" style="float:right;font-size:25px;margin-bottom:10px;margin-right:25px;">На Главную</a>
	
			<h2>Ваш предложенный контент будет рассмотрен администратором =)</h2>
		</div>
	<div>
		<?php else:?>
		<p class="error" style="margin-left:50px;font-size:20px;border:2px solid black; padding:20px;border-radius:10px;margin-right:50px">Чтобы оставить комментарий, <a href="/main.php" class="s1">войдите</a> или <a href="/reg.php" class="s1">зарегистрируйтесь</a>.</p>
		<?php endif;?>
</body>
</html>
