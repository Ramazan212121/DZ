<?php
  $text_comment = filter_var(trim($_POST['text_comment']),
  FILTER_SANITIZE_STRING);
  $name=$_COOKIE['user'];
  $page_name=filter_var(trim($_POST['page_name']),
  FILTER_SANITIZE_STRING);

  $mysql = new mysqli('localhost','root','','site');
  $mysql->query("INSERT INTO `comments` (`text_comment`,`name`,`page_name`)
  VALUES('$text_comment', '$name', '$page_name')"); 
  $mysql->close();
  header("Location: ".$_SERVER["HTTP_REFERER"]);
?>
