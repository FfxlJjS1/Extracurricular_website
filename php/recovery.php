<?php
$cheking = mysql_connect("localhost", "root", "");
if(!$cheking)
{
	echo "Не удалось подключится к серверу";
}
else
{
	mysql_close($cheking);
	$chekin_db = mysql_connect("localhost", "root", "", "edubase");
	if(!$chekin_db)
	{
		mysql_create_db("edubase");
	}
	/*$cheking_db_users = mysql_query("SHOW TABLES LIKE users");
	if(!$cheking_db_users)
		mysql_query("CREATE TABLE 'users'('id' int NOT NULL AUTO_INCREMENT PRIMARY KEY,'name' text CHARACTER SET utf8 NOT NULL,'soname' text CHARACTER SET utf8 NOT NULL,'floor' text CHARACTER SET utf8 NOT NULL,'admission_date' date CHARACTER SET utf8 NOT NULL,'login' text CHARACTER SET utf8 NOT NULL,'password' text CHARACTER SET utf8 NOT NULL,'mail' text CHARACTER SET utf8 NOT NULL,'reg_date' date NOT NULL,'position' text CHARACTER SET utf8 NOT NULL,'administration' int NOT NULL,'field_of_activity' text CHARACTER SET utf8 NOT NULL,'know\'s_level' int CHARACTER SET NOT NULL)");
	$cheking_db_news = mysql_query("SHOW TABLES LIKE news");
	if(!$cheking_db_news)
		mysql_query("CREATE TABLE 'news'('id' int CHARACTER SET utf8 NOT NULL AUTO_INCREMENT PRIMARY KEY,'news_subject' text CHARACTER SET utf8 NOT NULL,'news_description' text CHARACTER SET utf8 NOT NULL,'created_date' date CHARACTER SET utf8 NOT NULL)");*/
	$cheking_db_achivments = mysql_query("CHECK TABLE achivments");
	if(!$cheking_db_achivments)
	{
		$sql = "CREATE TABLE 'achivments'(
			id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
			user_got text NOT NULL,
			got_date date NOT NULL,
			created_date date NOT NULL,
			competition text NOT NULL,
			competition_place int NOT NULL,
			teacher text NOT NULL)";
		$result = mysql_query($sql,$mysqli);
		var_dump($result);
	}
}
mysql_close($chekin_db);
?>