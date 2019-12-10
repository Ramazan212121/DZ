<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="news.css">
	<title>Новости</title>
	<style>
	.block{
		min-height:250px;
	}
	</style>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="header">
		<h1>Новости из мира авто</h1>
	</div>
	<div class="content" style="margin-top:15px; border:2px solid black;border-radius:10px;min-height:1000px">
		<div class="notnews" style="border:1px solid black;margin:15px;border-radius:3px;padding:20px;">
			<h3 style="font-family:Arial; padding:20px;">Новостная страница о марках</h3>
			<a href="/main.php" class="s13" style="float:right;margin-right:150px;font-size:25px;margin-top:-60px;">На Главную</a>
			<form action="" method="POST">
			<p>Показать новости введенной марки (Вводите с маленькой буквы): <input type="text" name="mark"> </p>
			<span>Фильтрация по дате: <select name="datetime" size="1">
			<option value="old" name="old">Сначала старые</option>
			<option value="new" name="new">Сначала новые</option>
			</select></span>
			<span style="font-size:20px">Показать новости <input type="submit" name="button"></span>
			</form>
		</div>

						<?php 		
									$mark=filter_var(trim($_POST['mark']),
									FILTER_SANITIZE_STRING);
									$datetime=$_POST['datetime'];
								
									$mysql = new mysqli('localhost','root','','site');
									
									$num =$mysql->query("COUNT(*) FROM `news`");
									if (!isset($_POST['button'])){
									$query ="SELECT `id`,`mark`,`start`,`text`,`photo`,`datetime` FROM `news`";
									}
									
						    
							if (!empty($mark) and $datetime=="new"){


								$query ="SELECT `id`,`mark`,`start`,`text`,`photo`,`datetime` FROM `news` WHERE `mark`='$mark' ORDER BY `datetime` DESC";
							
							}
						

						 
							if (!empty($mark) and $datetime=="old"){


								$query ="SELECT `id`,`mark`,`start`,`text`,`photo`,`datetime` FROM `news` WHERE `mark`='$mark' ORDER BY `datetime` ";	
							
							}
							if (empty($mark) and $datetime=="old"){

								$query ="SELECT `id`,`mark`,`start`,`text`,`photo`,`datetime` FROM `news`  ORDER BY `datetime` ";
							
							}						
							if (empty($mark) and $datetime=="new"){
								$query ="SELECT `id`,`mark`,`start`,`text`,`photo`,`datetime` FROM `news` ORDER BY `datetime` DESC ";	
							}									
									$result=mysqli_query($mysql,$query);
							
									if($result)
									$rows = "";
									while($rows = $result->fetch_assoc()){
										echo "<div class=\"block\" style=\"padding:20px;border:1px solid black;border-radius:10px;margin:20px;position:relative;\">";
										$show_img=base64_encode($rows['photo']);?>
										<img src="data:image/jpeg;base64,<?php echo $show_img ?>"  style="width:300px;height:200px;float:right;">;
										<?php
										echo "<h2 style=\"font-family:Avantgarde, TeX Gyre Adventor, URW Gothic L, sans-serif;\">".$rows["start"]."</h2>";
										echo "<p style=\"font-size:15px;\">".$rows["text"]."</p>";
										echo "<p style=\"float:right;margin-right:20px;position:relative;\">Дата новости: ".$rows["datetime"]."</p>";
										if(isset($_COOKIE['admin'])){
										echo "
											<p style=\"float:center\"><form action=\"delnew.php\" method=\"POST\">
											Отметьте галочку, чтобы удалить новость: <input type=\"checkbox\" name=\"delnew\" value=".$rows["id"].">
						
											<input type=\"submit\" value=\"Подтвердить\">
											</form></p>";
											}echo "</div>";
											}
											mysqli_free_result($result);
											$mysql->close();						
							?>	
						
						
						
	</div>

</body>
</html>
