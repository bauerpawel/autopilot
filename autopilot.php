<?
// BLOG.BAUERPAWEL>.EU
//KONFIGURACJA AUTOPILOTA
$sc_trans="sc_trans_linux"; //nazwa aplikacji autopilota
$catalog="/home/adres do/radio/sc_trans/"; //Sciezka do autopilota. Nie zapomnij o konczanczym slashu.
$sc_trans_conf="sc_trans.conf"; //nazwa pliku konfiguracyjnego
$mp3="make_playlist";
?>
<html>
<head>
<title>Odpalacz pilota - blog.bauerpawel.eu</title>
</head>
<body>

<?php
if (isset($_GET["pilot"])&&$_GET["pilot"] == "on")
{
   shell_exec('killall '.$sc_trans);
   shell_exec($catalog.$sc_trans.' '.$catalog.$sc_trans_conf);
   $page = $_SERVER['PHP_SELF'];
   echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
   exit(0);

}
if (isset($_GET["pilot"])&&$_GET["pilot"] == "off")
{
   shell_exec('killall '.$sc_trans);
   $page = $_SERVER['PHP_SELF'];
   echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
   exit(0);

}
if (isset($_GET["pilot"])&&$_GET["pilot"] == "mp3")
{
   shell_exec($catalog.$mp3);
   $page = $_SERVER['PHP_SELF'];
   echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
   exit(0);
}
?>
<div class="tresc-nag">Kontrola autopilota</div>
<div style="padding-top:10px;">
   Tutaj włączasz lub wyłączasz autopilota i generujesz playliste :)
   
         <table style="padding-top:20px;">
            <tr>
                 <td> <a href="autopilot.php?action=control&pilot=on"><img src="1372556961_23_Play.png" alt="on" />Włącz pilota</a></td>
               <td>&nbsp;</td>
               <td> <a href="autopilot.php?action=control&pilot=off"><img src="1372557014_24_Stop.png" alt="off" />Wyłącz pilota</a></td>
			   <td>&nbsp;</td>
               <td> <a href="autopilot.php?action=control&pilot=mp3"><img src="1372557164_playlist.png" alt="mp3" />Generuj playliste</a></td>
            </tr>
         </table>

  
</div>
</body>
</html>