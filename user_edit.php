<?php
//require 'php/recovery.php';
require 'php/encode_text.php';
require 'php/connection.php';
//Проверка на правильность куки
require 'php/logining.php';
if(isset($_REQUEST['save']))
{
	$data = $_POST;
	$new_name = $data['name'];
	$new_soname = $data['soname'];
	$new_floor = $data['floor'];
	$old_mail = $data['mail_1'];
	$new_mail = $data['mail_2'];
	$old_password = $data['password_1'];
	$new_password = $data['password_2'];
	$new_field_of_activity = $data['field_of_activity'];
	$ok = "";
	$errors = array();
	$error_floor = "";
	$error_mail = "";
	$error_password = "";
	//Проверка имени
	if($new_name == '')
	{
		$new_name = $name;
	}
	//Проверка фамилии
	if($new_soname == '')
	{
		$new_soname = $soname;
	}
	//Проверка пола
	if($new_floor != 'Мужской' && $new_floor != "Женский")
	{
		$errors[] = "Пол может быть лишь 'Мужской' или 'Женский'";
		$error_floor = "Пол может быть лишь 'Мужской' или 'Женский'";
	}
	//Проверка mail
	if($new_mail == "")
	{
		$new_mail = $mail;
	}
	else
	{
	if($old_mail != $mail)
	{
		$errors[] = "Mail был введён неверно";
		$error_mail = "Mail был введён неверно";
	}
	$query = mysql_query("SELECT id WHERE mail='".$new_mail."'");
	if(!empty($query))
	{
		$errors[] = "Данный mail уже используется";
		$error_mail = "Данный mail уже используется";
	}
	}
	//Проверка пароля
	if($new_password == "")
	{
		$new_password = $password;
	}
	else
	{
		if(md5($old_password) != $password)
		{
			$errors[] = "Пароль был введен неправильно";
			$error_password = "Пароль был введен неправильно";
		}
	}
	//Проверка сферы обучения
	if($new_field_of_activity == "")
	{
		$new_field_of_activity = $field_of_activity;
	}

	if (empty($errors)) {
		require 'php/connection.php';
		$new_password = md5($new_password);
		$result = mysql_query("UPDATE users SET name='$new_name', soname='$new_soname', floor='$new_floor', password='$new_password', mail='$new_mail', field_of_activity='$new_field_of_activity' WHERE mail='$mail'");
		if($result)
			$ok = "ok";
		else
			echo "Произошла ошибка";
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
	<form method="post" action="user_edit.php">
	<ul>
		<p></p>
		<img src="images/face1.jpg" align="right" width="150px" height="200px">
		<?php
		if($knows_level == "-1") $know_level = "Неизвестно"; else $know_level = $knows_level;
		echo "<li>Имя: <input type=\"text\" name=\"name\" value=\"".$name."\"></li>";
		echo "<li>Фамилия: <input type=\"text\" name=\"soname\" value=\"".$soname."\"></li>";
		echo "<li>Пол: <input type=\"text\" name=\"floor\" value=\"".$floor."\">";
		if($error_floor != "") echo "<img src=\"images/spling65.png\" height=\"20px\" width=\"20px\" title=\"".$error_floor."\">";
		echo "</li>";
		echo "<li>Старый mail: <input type=\"text\" name=\"mail_1\"> Новый mail: <input type=\"text\" name=\"mail_2\">";
		if($error_mail != "") echo "<img src=\"images/spling65.png\" height=\"20px\" width=\"20px\" title=\"".$error_mail."\">";
		echo "</li>";
		echo "<li>Старый Пароль: <input type=\"text\" name=\"password_1\"> Новый пароль: <input type=\"text\" name=\"password_2\">";
		if($error_password != "") echo "<img src=\"images/spling65.png\" height=\"20px\" width=\"20px\" title=\"".$error_password."\">";
		echo "</li>";
		echo "<li>Сфера деятельности: <input type=\"text\" name=\"field_of_activity\" value=\"".$field_of_activity."\"></li>";
		?>
		<div align="right">
			<?php if($ok == "ok") echo "<img src=\"images/check_40622.png\" height=\"40px\" width=\"40px\" title=\"Изменение данных выполнено успешно\" align=\"left\">" ?>
			<button type="submit" name="save" style="background: #C0C0C0; border-radius: 5px; padding: 5px 15px 5px 15px;">Сохранить</button>
		</div>
	</ul>
	</form>
	</div>
</div>
<br class="clear" />
</div>
</div>
<div id="copyright"> &copy; Внешкольное образование | Сделано внешкольной сферой IT-образования</div>
</div>
</body>
</html>