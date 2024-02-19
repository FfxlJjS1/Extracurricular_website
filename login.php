<?php
ob_start();
  require "php/encode_text.php";
  require "php/connection.php";
  $data = $_POST;
  setcookie("edubase_id","");
  setcookie("edubase_name","");
  setcookie("edubase_soname","");
  setcookie("edubase_email","");
  setcookie("edubase_password","");
  if(isset($_REQUEST['loginin']))
  {
	  $errors = array();
	  $errors_login = '';
	  $errors_password = '';
	  $login = $data['login'];
	  $password = $data['password'];
	  
	  //Проверка логин
	  if(trim($login == ''))
	  {
		  $errors[] = 'Введите логин';
		  $errors_login = "Введите логин";
	  }
	  
	  $query_2 = mysql_query("SELECT id FROM users WHERE login='".$login."'");
	  if(!empty($query_2))
	  {
		  $errors[] = 'Пользователь с таким логином не существует';
		  $errors_login = "Пользователь с таким логином не существует";
	  }
	  
	  if(strlen($login) < 3 or strlen($login) > 30)
	  {
		  $errors[] = 'Логин должен быть не меньше 3 символов и не больше 30 символов';
		  $errors_login = "Логин должен быть не меньше 3 символов и не больше 30 символов";
	  }
	  //Проверка пароля
	  if( $password == '')
	  {
		  $errors[] = 'Введите пароль';
		  $errors_password = "Введите пароль";
	  }
	  
	  if(strlen($password) < 3 or strlen($password) > 50)
	  {
		  $errors[] = 'Пароль должен быть не меньше 3 символов не больше 50';
		  $errors_password = "Пароль должен быть не меньше 3 символов не больше 50";
	  }
	  if(empty($errors))
	  {
		  //авторизация
		  $avtorizishion = mysqli_connect("localhost", "root", "", "edubase");
		  $query_command = "SELECT * FROM users WHERE mail='".$login."'";
		  $result = mysql_query($query_command) or die ("Ошибка " . mysql_error($link));
		  if($result)
		  {
			$rows = mysql_fetch_row($result);
			$password=$rows[4];
			if($password == md5($_POST['password']))
			{
				$id=$rows[0];
				$name=$rows[1];
				$soname=$rows[2];
				$email=$rows[5];
				setcookie("edubase_id",$id,time()+60*60*24*365*10);
				setcookie("edubase_name",$name,time()+60*60*24*365*10);
				setcookie("edubase_soname",$soname,time()+60*60*24*365*10);
				setcookie("edubase_email",$email,time()+60*60*24*365*10);
				setcookie("edubase_password",$password,time()+60*60*24*365*10);
				header('Location: index.php');
		   }
		   else
		   {
			   $errors_login = "Логин введён неправильно";
			   $errors_password = "Пароль введен неправильно";
		   }
		  }
		  
	  }
	  else
	  {
		//echo '<div style="color: red;">'.array_shift($errors). '</div><hr>';
 	  }
	  unset($errors);
  }
mysql_close($mysqli);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!-- Design by Free CSS Templates http://www.freecsstemplates.org Released for free under a Creative Commons Attribution License Name : Eponymous Version : 1.0 Released : 20130222 -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
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
<div style="top: 64px; right: -20; " id="nav">
<ul id="ul_admin">
  <li class="Setting_top_right"> <a href="index.php">Главное</a></li>
  <li class="Setting_top_right"> <a href="communication.php">Связаться с нами</a></li>
</ul>
<br class="clear" />
</div>
</div>
	  <form method="post" action="login.php" class="login">
    <p style="margin-bottom: 0em">
      <label for="login">Логин:</label>
      <input type="text" name="login" id="login_login" value="<?php echo $data['login'];?>">
	  <?php if($errors_login != ''){echo "<img src=\"images/spling65.png\" height=\"20px\" width=\"20px\"  title=\"".$errors_login."\">";}?>
    </p>

    <p style="margin-bottom: 0em">
      <label for="password">Пароль:</label>
      <input type="password" name="password" id="login_password" value="<?php echo $data['password'];?>">
      <?php if($errors_password != ''){echo "<img src=\"images/spling65.png\" height=\"20px\" width=\"20px\" title=\"".$errors_password."\">";}?>
	</p>

    <p class="login-submit">
      <button type="submit" name="loginin" class="login-button">Войти</button>
       <a href="signap.php" class="forgot-password" id="logining" >Регистрация</a> 
	</p>
  </form>
</div>
</div>
<div id="copyright"> &copy; Внешкольное образование | Сделано внешкольной сферой IT-образования</div>
</div>
</body>
</html>