<html>
<head><title>Создание таблицы пользователей</title></head>
<body>

<?php

include ("bdconfig.php");
$Link=mysql_connect($Host,$User,$Password);
$Query = "DROP table $Table_Poker";

if(mysql_db_query ($DBName, $Query, $Link))
{
print("Удаление таблицы пользователей прошло успешно :-)");
}
else
{
print("Удаление таблицы пользователей не удалось :-(");
}

mysql_close($Link)
?>
</body>
</html>