<?
 include ("bdconfig.php");
 $Link=mysql_connect($Host,$User,$Password);
 mysql_query("SET NAMES cp1251");
 $Date_Time=date("Y");
 $fn="logins5000.txt_results.txt";
 
 if($_GET[fn]!="")
   $fn=$_GET[fn];
  
 $dir="C:\\Program Files\\Apache Software Foundation\\Apache2.2\\htdocs\\poker\\opr_stats\\";
 
 $fname=$dir . $fn;
 echo $fname . "<br>";
 $f=file($fname);
 echo count($f) . "�����";
 
 for($i=0;$i<count($f);$i++)
 {
      $s=$f[$i];
      if (strpos($s, '���� ����� �����') !== false) 
      { 
	    $arr=explode(" : ",$s);
		$s=$arr[0];
		echo $s . "<br>";
		if(strpos($f[$i+3],"120 Days")!==false)	
		{
			echo $s;
			$c2007=$f[$i+11];
			$c2008=$f[$i+10];
			$c2009=$f[$i+9];
			$c2010=$f[$i+8];
			$c2011=$f[$i+7];
			$c2012=$f[$i+6];
			$c2013=$f[$i+5];
			$c2014=$f[$i+4];
			$c120D=$f[$i+3];

			$Query="UPDATE $Table_Poker SET C2007='$c2007', C2008='$c2008', C2009='$c2009', C2010='$c2010', C2011='$c2011', C2011='$c2011', C2012='$c2012', C2013='$c2013', C2014='$c2014', C120D='$c120D' WHERE CLOGIN='$s' ";
			echo $Query . "<br><br>";
   		 	mysql_db_query ($DBName, $Query, $Link);

		}
      }
	  
	  if (strpos($s, '��� ������ ������') !== false) 
      {
				$arr=explode(" : ",$s);
				$s=$arr[0];
				echo $s . "<br>";

				$Query="UPDATE $Table_Poker SET C2007='----', C2008='----', C2009='----', C2010='----', C2011='----', C2011='----', C2012='----', C2013='----', C2014='----', C120D='----' WHERE CLOGIN='$s' ";
				echo $Query . "<br><br>";
				mysql_db_query ($DBName, $Query, $Link);	
	  }
   }

 mysql_close($Link); 
?>

