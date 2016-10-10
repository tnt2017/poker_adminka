<?
     print "<h1>Pokerstars</h1>";

     

 


     print "<a href='?buyers=1'>Покупатели</a> | " ;  
     print "<a href='?checker_results=1'>Результаты OPR чекера</a> | " ;  


     print "<a href='?findlogins=1'>Найти логины</a> | " ;
     print "<a href='?sel=1'>Сделать выборку</a> | ";
     print "<a href='?refresh=1'>Обновить счетчики</a> | ";
     print "<a href='logins_export.php'>Экспорт списка логинов</a> | " ;
     print "<a href='import_checked.php'>Отметить прочеканнные</a><br>" ;



     print "<a href='CREATE_TABLE_POKER.PHP'>Создать таблицу</a> | " ;
     print "<a href='import.php'>Импортировать таблицу их stars.txt</a> | " ;
     print "<a href='DROP_TABLE_POKER.PHP'>Удалить таблицу</a><br><br>" ;


     $Query = "SELECT COUNT(*) FROM $Table_Poker";
     $Result=mysql_db_query ($DBName, $Query, $Link);
     $Row=mysql_fetch_array ($Result);
     echo "Всего акков: " . $Row[0] . "<br>";

     $Query = "SELECT COUNT(*) FROM $Table_Poker WHERE CBUYER!=''";
     $Result=mysql_db_query ($DBName, $Query, $Link);
     $Row=mysql_fetch_array ($Result);
     echo "Продано акков: " . $Row[0] . "<br><br>";



     $Query2 = "SELECT DISTINCT CCOUNTRY FROM $Table_Poker ORDER by CCOUNTRY";
     $Result2=mysql_db_query ($DBName, $Query2, $Link);

     while($Row2=mysql_fetch_array ($Result2))
     {
	$i++;
	#echo "<a href=\"?list=1&country=$Row2[CCOUNTRY]\">$Row2[CCOUNTRY]</a> | ";
	$af[$i]=$Row2[CCOUNTRY];
     }

     if($_GET[refresh]=="1")
     {
                   $f=file('countrys.txt');
                   $ff1=fopen('cs1.txt',"w");
		   $ff2=fopen('cs2.txt',"w"); 
		   $ff3=fopen('cs3.txt',"w"); 

                         $Query2 = "SELECT COUNT(*) FROM $Table_Poker";
                         $Result2=mysql_db_query ($DBName, $Query2, $Link);
                         $Row2=mysql_fetch_array ($Result2);

                   print "<a href='?country='>All $Row2[0]</a> | ";
              
                   for($i=0;$i<count($af);$i++)
                   {
                         $s=$af[$i];                       
                         $Query2 = "SELECT COUNT(*) FROM $Table_Poker WHERE CCOUNTRY='$s' ";
                         $Result2=mysql_db_query ($DBName, $Query2, $Link);
                         $Row2=mysql_fetch_array ($Result2);
                         $xxxxx="<a href='?country=$s&list=1'>$s ($Row2[0])</a> | ";
              		
			 if($Row2[0]>1000)
			 {
                         	print $xxxxx;       
                         	fputs($ff1,$xxxxx);
			 }
			 if($Row2[0]>30 && $Row2[0]<1000)
			 {
                         	print $xxxxx;       
                         	fputs($ff2,$xxxxx);
			 }
			 if($Row2[0]<30)
			 {
                         	print $xxxxx;       
                         	fputs($ff3,$xxxxx);
			 }



				
                   }
     }
     else
     {
		echo "<hr>";
            	$x=file_get_contents('cs1.txt');
            	echo "cs1: ". $x;
		echo "<hr>";
            	$x=file_get_contents('cs2.txt');
            	echo "cs2: ". $x;
		echo "<hr>";
            	$x=file_get_contents('cs3.txt');
            	echo "cs3: ". $x;
		echo "<hr>";
     }

?>