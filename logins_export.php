<?

     include ("bdconfig.php");
     $Link=mysql_connect($Host,$User,$Password);


     for($i=0;$i<46000;$i+=5000)
     {
	     $Query = "SELECT * from $Table_Poker order by CLOGIN LIMIT $i,5000"; ###
	     echo "<br><br>" . $Query;

	     $Result=mysql_db_query ($DBName, $Query, $Link);   
	     $ff=fopen("oprchecker\\logins$i.txt","w");

	     while($Row=mysql_fetch_array ($Result)) 
	     {
		$n++;
		print "<tr>";  
		print $Row[CLOGIN] . "<br>";
		fputs($ff,$Row[CLOGIN] . "\r\n");
	     }
     }

?>