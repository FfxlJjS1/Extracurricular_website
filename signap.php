<?php
  require "php/encode_text.php";
  $phpfail = "index.php";
  require "php/connection.php";
	$data = $_POST;
  if(isset($_REQUEST['clicksignap']))
  {
	  $errors = array();
	  $errors_name = "";
	  $errors_soname = "";
	  $errors_floor = "";
	  $errors_possition = "";
	  $errors_email = "";
	  $errors_password = "";
	  $errors_password_2 = "";
	  $name = $data['name'];
	  $soname = $data['soname'];
	  $floor = $data['floor'];
	  $possition = 'Ученик';
	  $email = $data['email'];
	  $password = $data['password'];
	  $password_2 = $data['password_2'];
	  $field_of_activity = $data['field_of_activity'];
	  $reg_date = date("Y-m-d");
	  //Проверка имени
	  if(trim($name == ''))
	  {
		  $errors[] = 'Введите имя';
		  $errors_name = "Введите имя";
	  }
	  //Проверка Фамилии
	  if(trim($soname == ''))
	  {
		  $errors[] = 'Введите Фамилию';
		  $errors_soname = "Введите Фамилию";
	  }
	  //Проверка пола
	  if(empty($floor))
	  {
	  	$errors[] = 'Выберите пол';
	  	$errors_floor = 'Выберите пол';
	  }
	  else if($floor == 'Male')
	  {
	  	$floor = 'Мужской';
	  }
	  else if($floor == 'Women_s')
	  {
	  	$floor = 'Женский';
	  }
	  else
	  {
	  	$errors[] = 'Произошла ошибка с полом';
	  	$errors_floor = 'Произошла ошибка с полом';
	  }
	  //Проверка позиции
	  if(empty($field_of_activity))
	  {
	  	$errors[] = 'Выберите сферу обучения';
	  	$errors_field_of_activity = 'Выберите сферу обучения';
	  }
	  //Проверка mail
	  if(trim($email == ''))
	  {
		  $errors[] = 'Введите Email';
		  $errors_email = "Введите Email";
	  }
	  
	  $query = mysql_query("SELECT id FROM users WHERE login='".$email."'");
	  if(!empty($query))
	  {
		  $errors[] = 'Пользователь с таким Email уже существует';
		  $errors_email = "Пользователь с таким Email уже существует";
	  }
	  
	  if(strlen($email) < 3 or strlen($login) > 30)
	  {
		  $errors[] = 'Email должен быть не меньше 3 символов и не больше 30 символов';
		  $errors_email = "Email должен быть не меньше 3 символов и не больше 30 символов";
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
	  
	  //Проверка повторного пароля
	  if($password_2 != $password || $password_2 == '')
	  {
		  $errors[] = 'Повторный пароль введён неверно';
		  $errors_password_2 = "Повторный пароль введён неверно";
	  }
	  if(empty($errors))
	  {
		  //регистрация
		  $password = md5($password_2);
		  $result = mysql_query ("INSERT INTO users (name, soname, mail, password, floor, reg_date, position, field_of_activity) VALUES ('$name', '$soname', '$email', '$password', '$floor', '$reg_date', '$possition', '$field_of_activity')");
		  if ($result){
		  	header("Location: login.php");
		  	exit();
    	  }
		  else
		  {
			  echo "Произошла ошибка";
		  }
	  }
	  else
	  {
		  //echo '<div style="color: red;">'.array_shift($errors). '</div><hr>';
	  }
	  unset($errors);
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
<div style="top: 64px; right: -20px;" id="nav">
<ul id="ul_admin">
  <li class="Setting_top_right"> <a href="index.php">Главное</a></li>
  <li class="Setting_top_right"> <a href="communication.php">Связаться с нами</a></li>
</ul>
<br class="clear" />
</div>
</div>
	   <form method="post" action="signap.php" class="signap">
   <p style="margin-bottom: 0em">
	  <label for="login">Имя:</label>
      <input type="text" name="name" id="signap_name" value="<?php echo @$data['name'];?>">
	  <?php if($errors_name != ''){echo "<img src=\"images/spling65.png\" height=\"20px\" width=\"20px\" title=\"".$errors_name."\">";}?>
   </p>
   <p style="margin-bottom: 0em">
	   <label for="login">Фамилия:</label>
      <input type="text" name="soname" id="signap_soname" value="<?php echo @$data['soname'];?>">
	   <?php if($errors_soname != ''){echo "<img src=\"images/spling65.png\" height=\"20px\" width=\"20px\" title=\"".$errors_soname."\">";}?>
   </p>
   <p style="margin-bottom: 0em">
   		<label for="login">Пол: </label>
   		<input type="radio" name="floor" value="Male">Мужской
   		<input type="radio" name="floor" value="Women_s">Женский
   		<?php if($errors_floor != ''){echo "<img src=\"images/spling65.png\" height=\"20px\" width=\"20px\" title=\"".$errors_floor."\">";}?>
   </p>
   <p style="margin-bottom: 0em">
   		<label for="login">Сфера обучения: </label>
   		<input type="text" name="field_of_activity" id="field_of_activity" value="<?php echo @$data['field_of_activity'];?>">
   		<?php if($errors_field_of_activity != ''){echo "<img src=\"images/spling65.png\" height=\"20px\" width=\"20px\" title=\"".$errors_field_of_activity."\">";}?>
   </p>
   <p  style="margin-bottom: 0em">
	  <label for="login">email:</label>
      <input type="text" name="email" id="signap_email" value="<?php echo @$data['email'];?>">
		   <?php if($errors_email != ''){echo "<img src=\"images/spling65.png\" height=\"20px\" width=\"20px\" title=\"".$errors_email."\">";}?>
    </p>
    <p style="margin-bottom: 0em">
      <label for="password">Пароль:</label>
      <input type="password" name="password" id="signap_password" value="<?php echo @$data['password'];?>">
		<?php if($errors_password != ''){echo "<img src=\"images/spling65.png\" height=\"20px\" width=\"20px\" title=\"".$errors_password."\">";}?>
	</p>
	<p style="margin-bottom: 0em">
	  <label for="password">Повторный:</label>
      <input type="password" name="password_2" id="signap_password_2" value="<?php echo @$data['password_2'];?>">
   		<?php if($errors_password_2 != ''){echo "<img src=\"images/spling65.png\" height=\"20px\" width=\"20px\" title=\"".$errors_password_2."\">";}?>
	</p>

    <p class="login-submit">
      <button type="submit" name="clicksignap" class="login-button">Регистрация</button>
      <a href="login.php" id="logining" >Авторизация</a>
	</p>
  </form>
</div>
</div>
<div id="copyright"> &copy; Внешкольное образование | Сделано внешкольной сферой IT-образования</div>
</div>
</body>
</html>