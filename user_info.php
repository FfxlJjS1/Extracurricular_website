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
  <li class="Setting_top_right"> <a href="user_info.php">О пользователе</a></li>
  <li class="Setting_top_right"> <a href="login.php"><?php echo $vxod ?></a></li>
</ul>
<br class="clear" />
</div>
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
	<div id="box5">
	<h1>Моя анкета</h1>	
	
	<ul>
		<p></p>
		<img src="images/face1.jpg" align="right" width="150px" height="200px">
		<?php
		$mail_char = str_split($mail);
		$mail_int = strlen($mail);
		for($i=2; $i < $mail_int-2;$i++)
		{
			$mail_char[$i] = '*';
		}
		for ($d=0; $d < $mail_int; $d++) { 
			$mail_sring .= $mail_char[$d];
		}
		if($knows_level == "-1") $know_level = "Неизвестно"; else $know_level = $knows_level;
		echo "<li>Имя: ".$name."</li>";
		echo "<li>Фамилия: ".$soname."</li>";
		echo "<li>Пол: ".$floor."</li>";
		echo "<li>mail: ".$mail_sring."</li>";
		echo "<li>Пароль: Неизвестно</li>";
		echo "<li>Сфера деятельности: ".$field_of_activity."</li>";
		echo "<li>Позиция: ".$position."</li>";
		echo "<li>Уровень знаний: ".$know_level."</li>";
		?>
		<div align="right"><a href="user_edit.php" style="background: #C0C0C0; border-radius: 5px; padding: 10px 5px 10px 5px;">Редактировать</a></div>
	</ul>
	</div>
</div>
<br class="clear" />
</div>
</div>
<div id="copyright"> &copy; Внешкольное образование | Сделано внешкольной сферой IT-образования</div>
</div>
</body>
</html>