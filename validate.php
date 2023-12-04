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

// check hit
// check first quarter (square)
$isInFirstQuarter = $x >= 0 && $y >= 0 && $x <= $r && $y <= $r;

// check second quarter (triangle)
$isInSecondQuarter = $x < 0 && $y >= 0 && $y < ($x + $r) / 2;

// check third quarter (nothing)
// check fourth quarter (a quarter of circle)
$isInFourthQuarter = $x >= 0 && $y < 0 && $x * $x + $y * $y <= $r * $r;

$result = $isInFirstQuarter || $isInSecondQuarter || $isInFourthQuarter;
// end of check hit

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
