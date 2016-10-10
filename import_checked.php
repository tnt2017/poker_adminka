<?
 include ("bdconfig.php");
 $Link=mysql_connect($Host,$User,$Password);
 mysql_query("SET NAMES cp1251");
 $Date_Time=date("Y");
 $fn="27.10.2014.txt";
 
 if($_GET[fn]!="")
   $fn=$_GET[fn];
  
 $dir="C:\\Program Files\\Apache Software Foundation\\Apache2.2\\htdocs\\poker\\checked\\";
 
 $fname=$dir . $fn;
 echo $fname . "<br>";
 $f=file($fname);
 echo count($f) . "строк";

 for($i=0;$i<count($f);$i++)
 {
      $s=$f[$i];

      $arr=explode("\t",$s);
      $balance=$arr[1];	
      $buyer=$arr[2];

      $lp=explode(":",$arr[0]);
      $login=$lp[0];

      $Query="UPDATE $Table_Poker SET CBALANCE='$balance', CBUYER='$buyer' WHERE CLOGIN='$login' ";
      echo $Query . "<br><br>";
      mysql_db_query ($DBName, $Query, $Link);
 }


 fclose($ff);
 mysql_close($Link); 
?>

