<html>
<head><title>������ �������� ��� ������</title></head>
<body>

<?php

include ("bdconfig.php");
print $Host . $User . $Password;
$Link=mysql_connect($Host,$User,$Password);
$Query = 'CREATE DATABASE ' . $DBName;
if(mysql_query($Query, $Link))
 print("���� ������ ������������� ������� ������� ... <br>\n");
else
 print("�� ������� ������� ���� ������ ������������� <br>\n");

mysql_close($Link);

?>
</body>
</html>