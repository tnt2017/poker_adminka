<html>
<head><title>�������� ������� �������������</title></head>
<body>

<?php

include ("bdconfig.php");
$Link=mysql_connect($Host,$User,$Password);
$Query = "DROP table $Table_Poker";

if(mysql_db_query ($DBName, $Query, $Link))
{
print("�������� ������� ������������� ������ ������� :-)");
}
else
{
print("�������� ������� ������������� �� ������� :-(");
}

mysql_close($Link)
?>
</body>
</html>