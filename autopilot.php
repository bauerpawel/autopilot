<?php
declare(strict_types=1);

// bauer.net.pl
// KONFIGURACJA AUTOPILOTA
// Zaktualizowano do PHP 8.x z zabezpieczeniami

$sc_trans = "sc_trans_linux"; // nazwa aplikacji autopilota
$catalog = "/home/adres do/radio/sc_trans/"; // Sciezka do autopilota. Nie zapomnij o konczacym slashu.
$sc_trans_conf = "sc_trans.conf"; // nazwa pliku konfiguracyjnego
$mp3 = "make_playlist";

/**
 * Bezpieczne escapowanie argumentów shell
 */
function safeShellExec(string $command): void
{
    $escapedCommand = escapeshellcmd($command);
    shell_exec($escapedCommand);
}

/**
 * Walidacja i sanityzacja parametru pilot
 */
function getValidPilotAction(): ?string
{
    if (!isset($_GET["pilot"])) {
        return null;
    }

    $allowedActions = ['on', 'off', 'mp3'];
    $pilot = $_GET["pilot"];

    if (in_array($pilot, $allowedActions, true)) {
        return $pilot;
    }

    return null;
}

// Obsługa akcji
$pilotAction = getValidPilotAction();

if ($pilotAction === "on") {
    safeShellExec('killall ' . $sc_trans);
    safeShellExec($catalog . $sc_trans . ' ' . $catalog . $sc_trans_conf);
    $page = htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8');
    echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
    exit(0);
}

if ($pilotAction === "off") {
    safeShellExec('killall ' . $sc_trans);
    $page = htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8');
    echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
    exit(0);
}

if ($pilotAction === "mp3") {
    safeShellExec($catalog . $mp3);
    $page = htmlspecialchars($_SERVER['PHP_SELF'], ENT_QUOTES, 'UTF-8');
    echo '<meta http-equiv="Refresh" content="0;' . $page . '">';
    exit(0);
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odpalacz pilota</title>
</head>
<body>
    <div class="tresc-nag">Kontrola autopilota</div>
    <div style="padding-top:10px;">
        Tutaj włączasz lub wyłączasz autopilota i generujesz playliste :)

        <table style="padding-top:20px;">
            <tr>
                <td> <a href="autopilot.php?action=control&amp;pilot=on"><img src="1372556961_23_Play.png" alt="on" />Włącz pilota</a></td>
                <td>&nbsp;</td>
                <td> <a href="autopilot.php?action=control&amp;pilot=off"><img src="1372557014_24_Stop.png" alt="off" />Wyłącz pilota</a></td>
                <td>&nbsp;</td>
                <td> <a href="autopilot.php?action=control&amp;pilot=mp3"><img src="1372557164_playlist.png" alt="mp3" />Generuj playliste</a></td>
            </tr>
        </table>
    </div>
</body>
</html>
