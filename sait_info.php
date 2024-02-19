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
  <meta name="description" content=o"" />
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
<center><h1>Информация о данном сайте</h1><center>
</div align="left">
	<p>
		<h4 style="color: #2F4F4F;">	Я, Ханов Ильнур, ученик 9 класса, начинающий веб-программист, также занимающийся ПО программированием в свободное время. Разработал сайт для конкурся веб-дизайнера.</h4>
	</p>
	<p>
		<h4 style="color: #2F4F4F;">	Разработка сайта, изначально, была начата, в начале декабря 2017 года, для конкурса между учащимися кружка IT-программирования, но разработка сайта была приостановлена на неопределённое время и была продолжена, в конце декабря 2017 года, для конкурса веб-дизайнера</h4>
	</p>
	<p>
		<h4 style="color: #2F4F4F;">	При разработке сайта были задействованы такие языки программирования как HTML, CSS, PHP, MySQL, при этом не был задействован движок. Сайт разрабатывался в текстовом редакторе Sublime Text 3 с использование начального шаблона</h4>
	</p>
</div>
<br class="clear" />
</div>
</div>
<div id="copyright"> &copy; Внешкольное образование | Сделано внешкольной сферой IT-образования</div>
</div>
</body>
</html>