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
<h1><center>Список учителей и их уровень знаний</center></h1>
</div>
	<?php 
	require "php/connection.php";
	$teachers = mysql_query("SELECT * FROM users WHERE position='Учитель'");
	if(mysql_num_rows($teachers) != false)
	{
		$number = 1;
		while ($teacher = mysql_fetch_row($teachers)) {
			echo "<div id=\"box3\">";
			if($teacher[10] == '-1')
				$teacher[10] = "Неизвестно";
			if($teacher[11] == NULL)
				echo "<left>№ ".$number.". Учитель: ".$teacher[2]." ".$teacher[1].". Сфера обучения: ".$teacher[9].". </left><right>Уровень знаний: ".$teacher[10].".</right>";
			else
				echo "№ ".$number."<img src=".$teacher[11]." class=\"left\"><left>Учитель: ".$teacher[2]." ".$teacher[1].". Сфера обучения: ".$teacher[9].". </left><right>Уровень знаний: ".$teacher[10]."</right>";
			echo "</div>";
			$number++;
		}
	}
	else
	{
		echo "<h1><p><center>Учителя, в базе данных, не найдены.</center></p></h1>";
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