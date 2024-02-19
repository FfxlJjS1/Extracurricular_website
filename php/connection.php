<?php
$mysqli = mysql_connect("localhost","root","") OR DIE("Не подключится к серверу ");
 
// Выборка базы
mysql_select_db("edubase",$mysqli);
 
// Установка кодировки соединения
mysql_query("SET NAMES 'utf8'",$mysqli);