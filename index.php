<?php
//require 'php/recovery.php';
require 'php/encode_text.php';
require 'php/connection.php';
//Проверка на правильность куки
require 'php/logining.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Design by Free CSS Templates http://www.freecsstemplates.org Released for free under a Creative Commons Attribution License Name : Eponymous Version : 1.0 Released : 20130222 -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta http-equiv="content-type" cntent="text/html; charset=utf-8" />
  <title>Внешкольное образование</title>
  <link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
  <link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="bg">
<div id="outer">
<div id="header">
<div style="height: 85px; width: 199px; top: 64px; left: 0px;" id="logo">
<h1> ОФЫК</h1>
киләчәк бездән башлана
</div>
<div style="top: 64px; right: -20px;" id="nav">
<ul id="ul_admin">
  <li class="Setting_top_right"> <a href="index.php">Главное</a></li>
  <?php
  	if($administration > 0) echo "<li class=\"Setting_top_right\"> <a href=\"admin/admin.php\">Панель администратора</a></li>";
  ?>
  <li class="Setting_top_right"> <a href="communication.php">Связаться с нами</a></li>
  <?php 
  if($vxod != 'Вход') echo "<li class=\"Setting_top_right\"> <a href=\"user_info.php\">О пользователе</a></li>"; ?>
  <li class="Setting_top_right"> <a href="login.php"><?php echo $vxod ?></a></li>
</ul>
<br class="clear" />
</div>
</div>
<div style="text-align: center;" id="banner"> <img src="images/IMG_4004_3.jpg" alt="" height="287" style="width: 1182px; height: 290px;" />
</div>
<div id="main">
<div id="sidebar">
	<ul class="linkedList">
		<li class="Setting_top_right"> <a href="index.php">Главное</a></li>
		<li class="Setting_top_right"> <a href="score.php">Достижения</a></li>
		<li class="Setting_top_right"> <a href="Training_information.php">Обучение</a> </li>
		<li class="Setting_top_right"> <a href="sait_info.php">О сайте</a></li>
	</ul>
</div>
<div id="content">
<div id="box1">
<h2> Добро пожаловать на сайт внешкольного образования </h2>
<p><img class="left" src="images/globegraduat.gif" alt="" height="135" width="145" />Это сайт внешкольного образования ОФЫК. Здесь вы научитесь мастерить, программировать, рисовать, и многое другое.   			</p>
<p>На данном сайте можно посмотреть достижения , просмотреть рейтинг обучения в определенной сфере.</p>
</div>
	<?php 
	require "php/connection.php";
	$news = mysql_query("SELECT * FROM news ORDER BY id DESC");
	if(mysql_num_rows($news) != false)
	{
		while ($row = mysql_fetch_row($news)) {
			echo "<div id=\"box2\">";
			echo "<h2>".$row[1]."</h2>";
			echo "<p>".$row[2]."</p>";
			echo "<h6>".$row[3]."</h6>";
			echo "</div>";
		}
	}
	else
	{
		echo "<h1><p><center>Новостей не найдено</center></p></h1>";
	}
	mysql_close($mysqli);
	?>
<br class="clear" />
</div>
<br class="clear" />
</div>
</div>
<div id="copyright"> &copy; Внешкольное образование | Сделано внешкольной сферой IT-образования</div>
</div>
</body>
</html>