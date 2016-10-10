<?

     print "<br><br><textarea rows=50 cols=80>";  
     while($Row=mysql_fetch_array ($Result)) 
     {
	print "$Row[CLOGIN]:$Row[CPASS]:$Row[CIP]:$Row[CCOUNTRY]\r\n";
     }
     print "</textarea>";

?>