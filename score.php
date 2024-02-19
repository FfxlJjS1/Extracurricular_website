<?php
require('php/encode_text.php');
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
<div style="top: 64px; right: -20px;" id="nav">
<ul id="ul_admin">
  <li class="Setting_top_right"> <a href="index.php">Главное</a></li>
  <li class="Setting_top_right"> <a href="communication.php">Связаться с нами</a></li>
  <li class="Setting_top_right"> <a href="login.php">Войти</a></li>
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
<h1><center>Достижения внешкольным образовательным учреждением</center></h1>
<?php
require('php/connection.php');
$achivments = mysql_query("SELECT * FROM achivments ORDER BY id DESC");
if(mysql_num_rows($achivments) != false)
{
  while ($achivment = mysql_fetch_row($achivments)) {
    echo "<div id=\"box2\">";
    echo "<p></p>";
    echo "<center><h2 style=\"color: #9400D3;\">".$achivment[1]."</h2></center>";
    if($achivment[3] != false)
      echo "<p><img src=\"images/".$achivment[3]."\" class=\"left\" width=\"200px\" height=\"250px\">".$achivment[2]."     <h5>Учитель: ".$achivment[4]."</h5><h6>Дата: ".$achivment[5]."</h6></p>";
    else
      echo "<p>".$achivment[2]."     <h5>Учитель: ".$achivment[4]."</h5><h6>Дата: ".$achivment[5]."</h6></p>";
    echo "</div>";
  }
}
else
{
  echo "<h1><p><center>Достижений не найдено</center></h1>";
}
mysql_close($mysqli);
?>
</div>
<br class="clear" />
</div>
<br class="clear" />
</div>
</div>
<div id="copyright"> &copy; Внешкольное образование | Сделано внешкольной сферой IT-образования</div>
</div>
</body>
</html>