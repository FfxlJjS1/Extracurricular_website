<?php
//require 'php/recovery.php';
require 'php/encode_text.php';
require 'php/connection.php';
//Проверка на правильность куки
require 'php/logining.php';
if(isset($_REQUEST['send']))
{
$data = $_POST;
$errors = array();
$theme = $data['theme'];
$ddds = $data['ddds'];
$description = $data['description'];
$reg_date = date("Y-m-d");
if($name == '')
	$send_name = 'Аноним';
else
	$send_name = $name;
if($mail == '')
	$send_mail = 'Аноним';
else
	$send_mail = $mail;
$theme_error = "";
$ddds_error = "";
$description_error = "";
if($theme == '' || $theme == 'Введите тему проблемы или предложения')
{
	$errors = "Введите тему проблемы или предложения";
	$data['theme'] = "Введите тему проблемы или предложения";
}
if($ddds == '')
{
	$errors = "Выберите тип сообщения";
	$ddds_error = "Выберите тип сообщения";
}
if($description == '' || $description == 'Введите описание проблемы или предложения')
{
	$errors = "Введите описание проблемы или предложения";
	$data['description'] ="Введите описание проблемы или предложения";
}
if(empty($errors))
{
	require("php/connection.php");
$result = mysql_query("INSERT INTO message (name, mail, dispatch_date, Theme, Description) VALUES ('$send_name', '$send_mail', '$reg_date', '$theme', '$description')");
	if ($result){
		$send_ok = 'send';
    }
	else
	{
		echo "Произошла ошибка";
	}
	mysql_close();
}
}
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
<div id="box4">
	<form method="post" action="communication.php">
	<h2>Тема письма: <input type="text" name="theme" style="width:707px;height:20px" value="<?php echo @$data['theme'];?>"></h2>
</div>
	<h4><input type="radio" name="ddds" value="Проблема"> Проблема <input type="radio" name="ddds" value="Предложение"> Предложение <?php if($ddds_error != ''){echo "<img src=\"images/spling65.png\" height=\"20px\" width=\"20px\" title=\"".$ddds_error."\">";}?></h4>
	<h4><div align="top">Описание: </div><textarea name="description" style="width: 860px; height: 150px; resize: none;"><?php echo @$data['description']?></textarea></h4>
	<div align="right" style="height: 50px"><?php if($send_ok == "send") echo "<img src=\"images/check_40622.png\" height=\"40px\" width=\"40px\" title=\"Отправка выполнена успешно\" align=\"left\">" ?><button type="submit" style="padding: 10px 15px 10px 15px" name="send">Отправить</button></div>
</form>
</div>
<br class="clear" />
</div>
</div>
<div id="copyright"> &copy; Внешкольное образование | Сделано внешкольной сферой IT-образования</div>
</div>
</body>
</html>