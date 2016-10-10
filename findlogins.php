<?

echo "<br><br>";

$ls=explode("\r\n",$_POST[logins]);

for($i=0;$i<count($ls);$i++)
{
   $Query="SELECT * from $Table_Poker WHERE CLOGIN='$ls[$i]' ";
   $Result=mysql_db_query ($DBName, $Query, $Link);
   $Row=mysql_fetch_array ($Result);
   #echo $Query . " <br>";
   echo "$Row[CLOGIN]:$Row[CPASS]:$Row[CIP]:$Row[CCOUNTRY]<br>";
}

     print "<br><br><br><br><form name='form1' action='index.php' method='POST'  enctype=\"multipart/form-data\">
     <textarea name='logins' rows=10 cols=80>
iucovici
simon_beik
presision24
Ninjakyrre
mustangista
Khaellle
smolar2
Florious
RusianWinter
everest68
parofor
goodyear73
Cruz7979
claire_r_89
otepoti
EdwardScisR
okeybdokey77
Evg3n1y
lacapapa555
theacehole35
Guaavita
fugla9
lungusx
RedKing42
ramdachaga
fox_gambol
trox86
JRentero87
JimReaper69
soxlaker
xoxBLUFFxox
Howdy1710
cojones2010
andorrrrr
Parking51
JohnnyVipPL
drey_expos
FishKing72
Bidougolf
JCM903
shooterob
Juancete19
ciffoni
Whipper17
chefhase9
rindeteee
LacosAgria
OzonFresh
animalejo1
Divinu
pok-stas56
nek12345
GMark76
ZiggaZagga55
rosaire49
johnnys1111
Meiro2011
extremfish
kamikada
eroglif
frantack
densokol1979
cristianvz
AceLFSix
Dr.Jarod
memam
gbigun
juxR1
frazer86
srylanka
agusital
magdalena82
ubidonme
LGBieberbach
Sternschnupp
IMar101
Sergey_Dush
Fajvou
eszbe28
rogeradvpoa
lulika2005
TheNarayan25
keriba303
flegy22
Adelfonsus
pavel2012927
AnthGriffo
Radlwirt
Angeldust49
Merlin2718
elmago1314
lomana7
clasientje
oktavianito
cimrpunk
sportsjoe7
Radecek77
x6x6x6x6x
Zatz28
harleyfab1
Azlora
MVP_2703
creemdog
tkebek
florenco
MathiasSchre
Halver1972
psycho1306
Lestat606
burni679
river_pie
halbgebaggn
daimonlouk";  
     print "</textarea><br><input name='findlogins' type='hidden' value='1'>  <input type='submit'></form>";

?>