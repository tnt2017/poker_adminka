<h1>Покупатели</h1>
<table border=1>

<?
  
$dir="C:\\Program Files\\Apache Software Foundation\\Apache2.2\\htdocs\\poker\\buyers";
$skip = array('.', '..');
$files = scandir($dir);
foreach($files as $file) 
{
    if(!in_array($file, $skip))
    {
	$Query = "SELECT COUNT(*) FROM $Table_Poker WHERE CBUYER='$file'";
	$Result=mysql_db_query ($DBName, $Query, $Link);
	$Row=mysql_fetch_array ($Result);

	echo "<tr>";
	echo "<td><a href='?list=1&buyer=$file'>$file:</a> </td> <td>$Row[0] </td>";
	echo "<td><a href='?markselltxt=1&buyer=$file'>пересчитать</a></td>";
	echo "</tr>";
    }
}

?>

</table>