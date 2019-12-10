<html>
 <head>
  <meta charset="utf-8">
  <style>
	body{
     background: linear-gradient(45deg, #EECFBA, #C5DDE8);
	 font-family:Avantgarde, TeX Gyre Adventor, URW Gothic L, sans-serif;
	 color:;
	 font-size:20px;
	}
	.main{
		font-size:15px;
	}
	.s1 {
	background-image: linear-gradient(#FE5568 50%, #FE5568 50%), linear-gradient(silver 50%, silver 50%); 
	background-position: center bottom; 
	background-repeat: no-repeat; 
	background-size: 0 2px, 100% 2px; 
	color: #1E3A52; 
	padding-bottom: 3px; 
	transition: .5s ease-in-out;
	}
	.s1:hover {
	background-size: 100% 2px, 100% 2px;
	color: #FE5568;
	}
  </style>
  
 </head>
 <body>
  <div class="header"  style="margin:20px;">
   <h1>Добавление марок</h1>
  </div>
  <?php 
  $i=1;
  ?>
  <div class="main"  style="margin:25px">
	<form action="addmarkscr.php" method="POST" name="form" enctype="multipart/form-data">
	<p>Марка: <input type="text" name="mark" style=\"margin-top:20px;margin-bottom:20px;\"></p>
	
	
	<p style="float:right;margin-right:30px;">Фото : <input type="file" name="photo" style="margin-top:20px;margin-bottom:20px; "></p>
	<label for="start">Преамбула :</label><br>
    <textarea name="start" cols="40" rows="5" style="margin-top:20px;margin-bottom:20px;"></textarea><br>
    
	<label for="text" >Текст:</label><br>
	<textarea name="text" cols="140" rows="25" style="margin-top:20px;margin-bottom:20px;"></textarea><br>


	<input type="submit" value="Подтвердить" >

	</form>


 </div>
 <div>
 <p><a href="/main.php" class="s1" style="float:right;margin-right:100px;font-size:25px;margin-bottom:25px;">На Главную</a></p>
 </div>
	
 </div>
 </body>
</html>
