<html>
<head><title>Главная</title></head>
<body>
<?php

include ("bdconfig.php");
$Link=mysql_connect($Host,$User,$Password);
$Query = "CREATE table $Table_Poker (

id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, 
DT TIMESTAMP, 
CLOGIN TEXT, /* логин в системе */
CPASS TEXT, /* пароль в системе */
CIP TEXT, /* айпи */
CCOUNTRY TEXT, /* страна */
CBUYER TEXT, /* покупатель % */
CDATAPAY TEXT, /* дата покупки */
CBALANCE TEXT, /* баланс */
CPAYRECVIZIT TEXT, /* кошелек покупателя */
C2007 TEXT,
C2008 TEXT,
C2009 TEXT,
C2010 TEXT,
C2011 TEXT,
C2012 TEXT,
C2013 TEXT,
C2014 TEXT,
C120D TEXT
)";

if(mysql_db_query ($DBName, $Query, $Link))
{
print("good");
}
else
{
print("bad");
}

mysql_close($Link)
?>
</body>
</html>