<?php

header("Content-Type: text/html; charset=utf-8");
 
/* Соединяемся с базой данных */
$hostname = "localhost"; // название/путь сервера, с MySQL
$username = "root"; // имя пользователя (в Denwer`е по умолчанию "root")
$password = ""; // пароль пользователя (в Denwer`е по умолчанию пароль отсутствует, этот параметр можно оставить пустым)
$dbName = "test_base"; // название базы данных
 
/* Таблица MySQL, в которой будут храниться данные */
$table = "test_table";
 
/* Создаем соединение */
@mysql_connect($hostname, $username, $password) or die ("Не могу создать соединение");

mysql_query("SET NAMES 'utf8';"); 
mysql_query("SET CHARACTER SET 'utf8';"); 
mysql_query("SET SESSION collation_connection = 'utf8_general_ci';"); 

 
/* Выбираем базу данных. Если произойдет ошибка - вывести ее */
mysql_select_db($dbName) or die (mysql_error());

 
/* Составляем запрос для вставки информации в таблицу
name...date - название конкретных полей в базе;
в $_POST["test_name"]... $_POST["test_mess"] - в этих переменных содержатся данные, полученные из формы */
$query = "INSERT INTO $table SET message='".$_POST['test_mess']."'";
 
/* Выполняем запрос. Если произойдет ошибка - вывести ее. */
mysql_query($query) or die(mysql_error());
 
/* Закрываем соединение */
mysql_close();
 
/* В случае успешного сохранения выводим сообщение и ссылку возврата */
echo ("<div style=\"text-align: center; margin-top: 10px;\">
<font color=\"green\">Данные успешно сохранены!</font>
 
<a href=\"index.html\">Вернуться назад</a></div>");
 
?>