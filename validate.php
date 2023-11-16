<?php
// TODO: add checking coordinates
session_start();

$startTime = microtime(true);
if (!isset($_GET["x"]) || !isset($_GET["y"]) || !isset($_GET["r"])) {
    echo "Error";
    exit(1);
}

$history = isset($_SESSION['HISTORY']) && is_array($_SESSION['HISTORY']) ? $_SESSION['HISTORY'] : [];

$x = (float)$_GET["x"];
$r = (float)$_GET["r"];
$y = (float)$_GET["y"];

// validation

// end of validation

$result = 1;
$duration = round((microtime(true) - $startTime) * 10 ** 3, 3);

date_default_timezone_set("Europe/Moscow");
$date = date("F j, H:i:s");

$format = <<< EOF
<tr>
    <td class="result">%s</td>
    <td class="result">%.3f</td>
    <td class="result">%.3f</td>
    <td class="result">%.3f</td>
    <td class="result">%.3f</td>
    <td class="result">%d</td>
</tr>
EOF;

$row = sprintf($format, $date, $duration, $x, $y, $r, $result);
array_push($history, $row);

$_SESSION["HISTORY"] = $history;

header("Location: http://localhost:63342/web-lab1/index.php");
