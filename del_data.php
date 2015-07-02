<?php
  header("Content-Type: text/html; charset=utf-8");
/* Соединяемся с базой данных */
$hostname = "localhost"; // название/путь сервера, с MySQL
$username = "root"; // имя пользователя (в Denwer`е по умолчанию "root")
$password = ""; // пароль пользователя (в Denwer`е по умолчанию пароль отсутствует, этот параметр можно оставить пустым)
$dbName = "test_base"; // название базы данных
 
/* Таблица MySQL, в которой хранятся данные */
$table = "test_table";
 
/* Создаем соединение */
@mysql_connect($hostname, $username, $password) or die ("Не могу создать соединение");
mysql_query("SET NAMES 'utf8';"); 
mysql_query("SET CHARACTER SET 'utf8';"); 
mysql_query("SET SESSION collation_connection = 'utf8_general_ci';"); 
 
/* Выбираем базу данных. Если произойдет ошибка - вывести ее */
@mysql_select_db($dbName) or die (mysql_error());
 
/* Если была нажата ссылка удаления, удаляем запись */
$del = $query = "delete from $table where (id='".$_GET['del']."')";

/* Выполняем запрос. Если произойдет ошибка - вывести ее. */
@mysql_query($query) or die(mysql_error());
 
/* Заносим в переменную $res всю базу данных */
$query = "SELECT * FROM $table";
/* Выполняем запрос. Если произойдет ошибка - вывести ее. */
$res = mysql_query($query) or die(mysql_error());
/* Узнаем количество записей в базе данных */
$row = mysql_num_rows($res);
 
/* Выводим данные из таблицы */
echo ("
<!DOCTYPE html>
 
<head>
	<link href='css/css.css' rel='stylesheet'>
    <title>Вывод и удаление данных из MySQL</title>
	<script type='text/javascript' src='js/jquery-1.4.2.js'></script>
	<script type='text/javascript' src='js/autoresize.jquery.min.js'></script>

</head>
 
<body>
 
<h3>Удаление данных</h3>"

);
 echo ("<a href=\"index.html\" id='fr'>Вернуться назад</a></div>"); 
/* Цикл вывода данных из базы конкретных полей */
while ($row = mysql_fetch_array($res)) {
    echo "<tr>\n";
    echo "<p id='bor'>\n".$row['message']."</p>\n";
    /* Генерируем ссылку для удаления поля */
    echo "<td><a name=\"del\" href=\"del_data.php?del=".$row["id"]."\"><input type='button' value='Удалить'></a></td>\n";  
   echo "</tr>\n";
}
 
/* Закрываем соединение */
mysql_close();

 
?>