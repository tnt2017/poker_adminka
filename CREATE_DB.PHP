<html>
<head><title>Скрипт создания баз данных</title></head>
<body>

<?php

include ("bdconfig.php");
print $Host . $User . $Password;
$Link=mysql_connect($Host,$User,$Password);
$Query = 'CREATE DATABASE ' . $DBName;
if(mysql_query($Query, $Link))
 print("База данных пользователей создана успешно ... <br>\n");
else
 print("Не удалось создать базу данных пользователей <br>\n");

mysql_close($Link);

?>
</body>
</html>