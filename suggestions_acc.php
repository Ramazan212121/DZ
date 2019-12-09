<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style>
		body {
		
		background: linear-gradient(azure, bisque);
		}
	</style>
	
</head>
<body>
	<div align=center style="margin-top:10px;">
		<h1>Добавление предложенного контента</h1><br>
	</div>
	<div>
									<?php
											error_reporting(0);
											
											$mysql = new mysqli('localhost','root','','site');
											
											$query="SELECT `id`,`name`, `text`, `photo`  FROM `suggestions_acc` WHERE `access` IS NULL";
											$result=mysqli_query($mysql,$query);
											
									if($result)
									$rows = "";
									while($rows = $result->fetch_assoc()){
										echo "<div style=\"padding:20px;border:1px solid black;border-radius:10px;margin:20px;position:relative;min-height:250px;\">";
										$show_img=base64_encode($rows['photo']);?>
										<img src="data:image/jpeg;base64,<?php echo $show_img ?>"  style="width:300px;height:200px;float:right;">
										<?php
										echo "<p style=\"font-size:20px;\">".$rows["name"]."</p>";
										echo "<p style=\"font-size:15px;\">".$rows["text"]."</p>";
										echo "
											<p style=\"float:center;margin-top:15px\"><form action=\"addsuggestadm.php\" method=\"POST\">
											Отметьте галочку, чтобы добавить контент: <input type=\"checkbox\" name=\"addsuggestadm\" value=".$rows["id"].">
						
											<input type=\"submit\" value=\"Подтвердить\"></form></p>
																						<p style=\"float:center;margin-top:15px\"><form action=\"delsuggestion.php\" method=\"POST\">
											Отметьте галочку, чтобы удалить контент: <input type=\"checkbox\" name=\"delsuggestadm\" value=".$rows["id"].">
						
											<input type=\"submit\" value=\"Подтвердить\"></form></p>";
											echo "</div>";
											}
											
											mysqli_free_result($result);
											$mysql->close();						
							?>
							<p style="margin-right:150px;margin-top:150px;float:right;font-size:30px"><a href="/main.php" class="s1">На Главную</a></p>

</body>
</html>
