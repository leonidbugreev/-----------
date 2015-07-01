<DOCTYPE html>
<html>
<head>
  <link href="css/styles.css" rel="stylesheet">
<title>Министерство Обороны РК</title>

    <script src="js/jquery-1.4.4.min.js" type="text/javascript"></script>

    <script src="js/image-slider.js" type="text/javascript"></script>

    <link href="css/image-slider.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript">
	
        $(document).ready(function() {
            $('#slider').slider({ speed: 500 });

        });       
        
    </script>
</head>
<body>

<div id="page" class="rad">
<div id="sh" valign="middle" align="center">
	<ul>
		<li><a href="#">Руководство</a></li>
		<li><a href="#">Документы </a></li>
		<li><a href="#">Структура </a></li>
		<li><a href="#">Образование</a></li>
		<li><a href="#">Пресс-центр</a></li>
	</ul>
</div>

<div id="top2">
<form id="form">
<input type="text" id="poisk" value=" Поиск">
<select name="yaz">
<option value="1">Русский</option>
<option value="2">Английский</option>
<option value="3">Казахский	</option>
</select>
</form>
	

</div>
<div id="container">
        <div id="slider" background="images/фон.jpg">
            <div>
                <img src="images/5.jpg">
				
            </div>
            <div>
                <img src="images/6.jpg">
				
			</div>
            <div>
                <img src="images/7.jpg">
				
			</div>
            <div>
                <img src="images/8.jpg">
				
			</div>
            <div>
                <img src="images/9.jpg">
				
			</div>
           
        </div>
        </div>
<div id="menu">
	<ul>
		<li><a href="#">Главная</a></li>
		<li><a href="#">Помощь</a></li>
		<li><a href="#">Контакты</a></li>
		<li><a href="#">Регистрация</a></li>
	</ul>
</div>
<div id="cont">
<img src="images/mjk.jpg" class="right" width="150px" height="200px" id="mjk">
<br/>
<?php
 
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
mysql_select_db($dbName) or die (mysql_error());
 
/* Составляем запрос для извлечения данных из полей "name", "email", "theme",
"message", "data" таблицы "test_table" */
$query = "SELECT message FROM $table";
 
/* Выполняем запрос. Если произойдет ошибка - вывести ее. */
$res = mysql_query($query) or die(mysql_error());
 
/* Выводим данные из таблицы */
echo ("
<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
 
<head>
	<link href='css/styles.css' rel='stylesheet'>
    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1251\" />
 
    <title>Вывод данных из MySQL</title>
 
<style type=\"text/css\">
<!--
body { font: 12px Georgia; color: #666666; }
h3 { font-size: 16px; text-align: center; }
table { width: 700px; border-collapse: collapse; margin: 0px auto; background: #E6E6E6; }
td { padding: 3px; text-align: center; vertical-align: middle; }
.buttons { width: auto; border: double 1px #666666; background: #D6D6D6; }
-->
</style>
 
</head>
 
<body>
 <div id='text'>
");
 
/* Цикл вывода данных из базы конкретных полей */
while ($row = mysql_fetch_array($res)) {
    echo "";
    echo "".$row['message']."";
}
 echo ("<br/><br/><br/><br/></div>");
/* Закрываем соединение */
mysql_close();

 
?>
</div>
<div class="clr">
<img src="images/3.png" class="zv" width="50px" height="50px"><p class="MR">© Министерство обороны Республики Казахстан<br>
Все права защищены</p>
<p class="lo" align="right" valign="right">Разработка-<a href="http://localhost/py/ ">Logytex </a></p>
</div>
</div>
</body>
</html>