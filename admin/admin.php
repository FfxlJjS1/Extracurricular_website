<?php
require '../php/encode_text.php';
require '../php/connection.php';
//Проверка на правильность куки
require '../php/logining.php';
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
  <link href="../css/style.css" rel="stylesheet" type="text/css" />
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
<ul>
  <li class="Setting_top_right"> <a href="../admin/admin_index.php">Главное</a></li>
  <li class="Setting_top_right"> <a href="../index.php">Выйти из панели администратора</a></li>
  <li class="Setting_top_right"> <a href="#">Связаться с нами</a></li>
  <li class="Setting_top_right"> <a href="../admin/admin_login.php"><?php echo $vxod ?></a></li>
</ul>
<br class="clear" />
</div>
</div>
<div style="text-align: center;" id="banner"> <img src="../images/IMG_4004_3.jpg" alt="" height="287" style="width: 1182px; height: 290px;" />
</div>
<div id="main">
<div id="sidebar">
	<ul class="linkedList">
		<li class="Setting_top_right"> <a href="../admin/admin_index.php">Главное</a></li>
		<li class="Setting_top_right"> <a href="../admin/admin_score.php">Достижения</a></li>
		<li class="Setting_top_right"> <a href="../admin/admin_forum.php">Форум</a></li>
		<li class="Setting_top_right"> <a href="#">Обучение</a> </li>
		<li class="Setting_top_right"> <a href="#">Тестирование</a></li>
	</ul>
</div>
<div id="content">
	<div id="box1">
		<center><h1>Панель управления новостями</h1></center>
	</div>
	<form>
		<?php
		echo "<ul>";
		echo "<textarea></textarea>";
		echo "<textarea></textarea>";
		echo "<textarea></textarea>";
		echo "<textarea></textarea>";
		echo "</ul>";
		?>
	</form>
	
<!-- <div id="box2">
<h3>Новости внешкольного образовательного центра</h3>
<p>Недавно был запущен  сайт внешкольного образовательного центра для просмотра данного учреждения как сферу обучения в свободное время.</p>
</div> -->
	
<br class="clear" />
</div>
<br class="clear" />
</div>
</div>
<div id="copyright"> &copy; Внешкольное образование | Сделано внешкольной сферой IT-образования</div>
</div>
</body>
</html>