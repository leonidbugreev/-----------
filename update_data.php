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
 
/* Если была нажата кнопка редактирования, вносим изменения */
if(@$_POST['submit_edit']) {
$query = "UPDATE $table SET  message='".$_POST['test_mess']."' WHERE id='".$_POST['update']."'";

 
 
/* Выполняем запрос. Если произойдет ошибка - вывести ее. */
@mysql_query($query) or die (mysql_error());
}
 
/* Заносим в переменную $res всю базу данных */
$query = "SELECT * FROM $table";
/* Выполняем запрос. Если произойдет ошибка - вывести ее. */
$res = mysql_query($query) or die(mysql_error());
/* Узнаем количество записей в базе данных */
$row = mysql_num_rows($res);
 
/* Выводим данные из таблицы */
echo ("
<!DOCTYPE html PUBLIC>
 
<head>
	<link href='css/css.css' rel='stylesheet'>
    <title>Редактирование данных</title>
</head>
 
<body>
 
<h3>Редактирование и обновление данных в таблице MySQL</h3>
");
 
/* Цикл вывода данных из базы конкретных полей */
while ($row = @mysql_fetch_array($res)) {
    echo "<form action=\"update_data.php\" method=\"post\" name=\"edit_form\">\n";
    echo "<input type=\"hidden\" name=\"update\" value=\"".$row["id"]."\" />\n";   
    echo "<textarea autofocus rows='30' cols='140' name='test_mess'>".$row['message']."</textarea><br/>";
    echo "<input type=\"submit\" name=\"submit_edit\" value=\"Сохранить изменения\" />\n";
	echo ("<a href=\"index.html\" id='fr'>Вернуться назад</a></div>");
    echo "</form>\n\n";
}
 
/* Закрываем соединение */
mysql_close();
 
/* Выводим ссылку возврата */

 
?>
