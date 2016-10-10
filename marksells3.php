
Формат poker://login:password@PokerStars:ip:country

<?

$ls=explode("\r\n",$_POST[logins]);

for($i=0;$i<count($ls);$i++)
{
    if(strlen($ls[$i])>3)
    {
    $s=$ls[$i];
    $s=substr($s, 8);
    $pieces = explode("@", $s);
    $s1=$pieces[0];
    $s2=$pieces[1];
    $pieces1 = explode(":", $s1);
    $s=$pieces1[0];

   $Query="UPDATE $Table_Poker SET CBUYER='$_POST[buyer]' WHERE CLOGIN='$s'";
   $Result=mysql_db_query ($DBName, $Query, $Link);
   $Row=mysql_fetch_array ($Result);
   echo $Query . " <br>";
   echo "$Row[CLOGIN]:$Row[CPASS]:$Row[CIP]:$Row[CCOUNTRY]<br>";
   }
}

     print "<br><br><br><br><form name='form1' action='index.php' method='POST'  enctype=\"multipart/form-data\">
     <input name='buyer' type='text' value='vasya'> <br><textarea name='logins' rows=10 cols=80>";  
     print "</textarea><br><input name='marksells3' type='hidden' value='1'> <br>  <input type='submit'></form>";

?>