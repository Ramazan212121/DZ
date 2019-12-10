<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="newmarks.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<div class="relog">	
	<?php if(empty($_COOKIE['user'])):?><p class="error" style="height:800px;width:1500px">Чтобы просматривать информацию о других марках, <a href="/main.php" class="s1">войдите</a> или <a href="/reg.php" class="s1">зарегистрируйтесь</a>.</p>
</div>


	<?php else:?>
	<div class="header"><h1 align=center>Марки Авто</h1></div>
			<div class="content" style="margin:20px;min-height:800px;">
			<div class="form" >
			
	<form action="" method="POST" >
	<p><select size="1" name="marks">
	<option disabled>Введите название марки</option> 
	<?php 	
			$mysql = new mysqli('localhost','root', '' ,'site');
			$query2= "SELECT  `mark` FROM `marks`" ;
			$result2=mysqli_query($mysql,$query2);
			if($result2)
				$rows1="";
				while($rows1 = $result2->fetch_assoc()){
					echo "<option>".$rows1["mark"]."</option>";
				}mysqli_free_result($result2);
				$mysql->close();?>
	</select></p>
	<span><input type="submit" name="mark" value="Показать"></span>
	</form>
	</div>
	<?php	
			$marks=filter_var(trim($_POST['marks']),FILTER_SANITIZE_STRING);
			if(isset($_POST['mark'])){
			echo "<div class=\"marks\">";
		
			$mysql = new mysqli('localhost','root', '' ,'site');
			$query1= "SELECT  `id`,`mark`,`start`, `text`, `photo` FROM `marks` WHERE `mark`='$marks'" ;
			$result = mysqli_query($mysql,$query1);
			if($result)
			$rows = "";
			while($rows = $result->fetch_assoc()){
			echo "<div class=\"block\" style=\"padding:20px;border:1px solid black;border-radius:10px;margin:20px;position:relative;\">
				<h1 align=center>".$rows["mark"]."</h1>";
			$show_img=base64_encode($rows['photo']);?>
			<img src="data:image/jpeg;base64,<?php echo $show_img ?>"  style="width:300px;height:200px;float:right;margin:20px;">;
			<?php
			echo "<h2 style=\"font-family:Avantgarde, TeX Gyre Adventor, URW Gothic L, sans-serif;\">".$rows["start"]."</h2>";
			echo "<p style=\"font-size:24px;\">".$rows["text"]."</p>";
			if(isset($_COOKIE['admin'])){
			echo "
			<p style=\"float:center\"><form action=\"delmarks.php\" method=\"POST\">
			Отметьте галочку, чтобы удалить информацию о марке: <input type=\"checkbox\" name=\"delmarks\" value=".$rows["id"].">
						
			<input type=\"submit\" value=\"Подтвердить\">
			</form></p>";
			}echo "</div>";
			}
			mysqli_free_result($result);

			$mysql->close();
		}
			?>
	<?php endif;?>
</div>
</div>
		<h2 style="margin-left:40px">Вот отзывы по этой марке:</h2>
		<?php
			$text_comment = filter_var(trim($_POST['text_comment']),
			FILTER_SANITIZE_STRING);
			$page_name=$_POST['marks'];
			$name=$_COOKIE['user'];
			$mysql = new mysqli('localhost','root','','site');
			$query ="SELECT `name`,`text_comment`,`id` FROM `comments` WHERE `page_name`='$page_name'";
 
			$result = mysqli_query($mysql, $query); 
			if($result)
			$rows = "";
				while($rows = $result->fetch_assoc()){
					echo "<div style=\"padding:20px;border:1px solid black;border-radius:10px; margin:40px;\"><b>".$rows["name"].":</b>  ".$rows["text_comment"]."";					
				if(isset($_COOKIE['admin'])){
					echo "
					<div style=\"float:right\"><form action=\"delcom.php\" method=\"POST\">
						<p>Отметьте галочку, чтобы удалить комментарий: <input type=\"checkbox\" name=\"delcom\" value=".$rows["id"].">
						<input type=\"submit\" value=\"Подтвердить\"></p>
						</form>
						</div>";
				}echo "</div>";
				}
				mysqli_free_result($result);
				mysqli_close($mysql);
		?>
<?php if(!empty($_COOKIE['user'])):?>
	<div style="height:320px;margin:40px;border:1px solid black; border-radius:10px; position:relative;padding:20px"class="footer" >
		<p style="margin-right:150px;margin-top:150px;float:right;font-size:30px"><a href="/main.php" class="s1">На Главную</a></p>
		<p><b>Напишите ваше мнение об этой марке=)</b></p>
		<form action="comment.php" method="post">
		<p >
			<label>Комментарий:</label><br>
			<textarea required name="text_comment" cols="100" rows="5"></textarea><br>
			<input type="submit" value="Отправить" >
			<input hidden value="<?php echo "$page_name";?>" name="page_name">
		</p>
		</form>
	</div>
	<?php endif;?>

</body>
</html>
