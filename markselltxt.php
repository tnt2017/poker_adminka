<?

$buyer="васин кент";

if($_GET[buyer]!="")
$buyer=$_GET[buyer];

$fullpath="C:\\Program Files\\Apache Software Foundation\\Apache2.2\\htdocs\\poker\\buyers\\$buyer\\";

foreach (glob($fullpath . "*.txt") as $txt)
{
    $lines=file($txt);
    $txt=str_replace($fullpath, "", $txt);
    echo "<h1>" . $txt . "</h1><br>";

    $fn_pieces = explode("_", $txt);

	foreach ($lines as $line_num => $line) 
	{
	    $line = str_replace("poker://", "", $line);
	    $pieces = explode(":", $line);
	    echo $buyer . " : " . $fn_pieces[0] . " : " . $pieces[0] . "<br>"; 

            $Query="UPDATE $Table_Poker SET CBUYER='$buyer', CDATAPAY='$fn_pieces[0]' WHERE CLOGIN='$pieces[0]' ";			
	    echo $Query . "<br>";
	    mysql_db_query ($DBName, $Query, $Link);  
	}

}

?>