<html>
<head>
<title>PokerStars</title>
<meta http-equiv="content-type" content="text/html; charset=windows-1251">
</head>
<body>

<?php
include("bdconfig.php");


if($_POST[findlogins]!="")
  $_GET[findlogins]=$_POST[findlogins];

if($_POST[marksells1]!="")
  $_GET[marksells1]=$_POST[marksells1];
if($_POST[marksells2]!="")
  $_GET[marksells2]=$_POST[marksells2];
if($_POST[marksells3]!="")
  $_GET[marksells3]=$_POST[marksells3];



////////// УДАЛЯЕМ  ЮЗЕРА /////////////////////////

$Link=mysql_connect($Host,$User,$Password);
mysql_query("SET NAMES cp1251");

if($_GET[del_id]!="") // && $_SESSION[debug]==1
{
     $Query = "DELETE FROM $Table_Poker WHERE id=$_GET[del_id]";
     $Result=mysql_db_query ($DBName, $Query, $Link);
}

     include('header.php');

     if($_GET[sel]=='1')
        include('sel.php');

     if($_GET[findlogin]=='1')
        include('findlogin.php');

     if($_GET[findlogins]=='1')
        include('findlogins.php');

     if($_GET[marksells1]=='1')
        include('marksells1.php');

     if($_GET[marksells2]=='1')
        include('marksells2.php');

     if($_GET[marksells3]=='1')
        include('marksells3.php');

     if($_GET[markselltxt]=='1')
        include('markselltxt.php');

     if($_GET[buyers]=='1')
        include('buyers.php');

     if($_GET[checker_results]=='1')
        include('checker_results.php');

     if($_GET['list']=='1')
       {
	 include('list.php');
       }

?>

</body>
</html>