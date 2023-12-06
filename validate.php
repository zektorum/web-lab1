<?php

include_once "./php/input_type.php";
include_once "./php/user_input.php";
include_once "./php/validation/validator_for_x.php";
include_once "./php/validation/validator_for_r.php";

use validation\ValidatorForX;
use validation\ValidatorForR;

function redirectToMainPage() {
    header("Location: http://localhost:63342/web-lab1/index.php");
}

function isHit($x, $y, $r) {
    $isInFirstQuarter = $x >= 0 && $y >= 0 && $x <= $r && $y <= $r;         // check first quarter (square)
    $isInSecondQuarter = $x < 0 && $y >= 0 && $y < ($x + $r) / 2;           // check second quarter (triangle)
                                                                            // check third quarter (nothing)
    $isInFourthQuarter = $x >= 0 && $y < 0 && $x * $x + $y * $y <= $r * $r; // check fourth quarter (a quarter of circle)
    return $isInFirstQuarter || $isInSecondQuarter || $isInFourthQuarter;
}

function createRow($date, $duration, $x, $y, $r, $result) {
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
    return sprintf($format, $date, $duration, $x, $y, $r, $result);
}

session_start();

if (isset($_GET["clear"]) && $_GET["clear"] == "true") {
    session_unset();
    redirectToMainPage();
}

$startTime = microtime(true);
if (!isset($_GET["x"]) || !isset($_GET["y"]) || !isset($_GET["r"])) {
    echo "Error";
    exit(1);
}

$x = (float)$_GET["x"];
$r = (float)$_GET["r"];
$y = (float)$_GET["y"];

$isHit = isHit($x, $y, $r);

$validators = [
    new ValidatorForX(new UserInput(new InputTypeX(), $x)),
    new ValidatorForR(new UserInput(new InputTypeR(), $r))
];
$isValid = false;
for ($i = 0; $i < count($validators); $i++) {
     $isValid = $validators[$i]->validate()[1];
     if (!$isValid) {
         $_SESSION["hasError"] = "true";
         break;
     }
}

$duration = round((microtime(true) - $startTime) * 10 ** 3, 3);

date_default_timezone_set("Europe/Moscow");
$date = date("F j, H:i:s");

if ($isValid) {
    $history = isset($_SESSION['HISTORY']) && is_array($_SESSION['HISTORY']) ? $_SESSION['HISTORY'] : [];
    $row = createRow($date, $duration, $x, $y, $r, $isHit);
    array_push($history, $row);

    $_SESSION["HISTORY"] = $history;
}

redirectToMainPage();