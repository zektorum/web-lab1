<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>Лабораторная работа #1</title>
        <link rel="icon" type="image/x-icon" href="images/favicon.ico">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <script type="module" src="js/entrypoint.js"></script>
        <script type="text/javascript" src="js/validation/current-checkbox-validator.js"></script>
    </head>
    <body>
        <table id="main">
            <tr class="info">
                <th id="name">Муртузалиев Мурад Батирханович</th>
                <th id="group">P3218</th>
                <th id="variant">Вариант 2818</th>
            </tr>
            <tr>
                <td id="graph">
                    <img id="coordinates" src="images/coordinates.png" alt="coordinates">
                    <div class="input">
                        <form action="validate.php" id="data" method="get" onsubmit="return validateAllData()">
                            <label>X:</label>
                            <input type="checkbox" name="x" id="-4" value="-4" onclick="new CurrentCheckboxValidator().selectCurrentCheckbox(-4)">
                            <label for="-4">-4</label>
                            <input type="checkbox" name="x" id="-3" value="-3" onclick="new CurrentCheckboxValidator().selectCurrentCheckbox(-3)">
                            <label for="-3">-3</label>
                            <input type="checkbox" name="x" id="-2" value="-2" onclick="new CurrentCheckboxValidator().selectCurrentCheckbox(-2)">
                            <label for="-2">-2</label>
                            <input type="checkbox" name="x" id="-1" value="-1" onclick="new CurrentCheckboxValidator().selectCurrentCheckbox(-1)">
                            <label for="-1">-1</label>
                            <input type="checkbox" name="x" id="0" value="0" onclick="new CurrentCheckboxValidator().selectCurrentCheckbox(0)">
                            <label for="0">0</label>
                            <input type="checkbox" name="x" id="1" value="1" onclick="new CurrentCheckboxValidator().selectCurrentCheckbox(1)">
                            <label for="1">1</label>
                            <input type="checkbox" name="x" id="2" value="2" onclick="new CurrentCheckboxValidator().selectCurrentCheckbox(2)">
                            <label for="2">2</label>
                            <input type="checkbox" name="x" id="3" value="3" onclick="new CurrentCheckboxValidator().selectCurrentCheckbox(3)">
                            <label for="3">3</label>
                            <input type="checkbox" name="x" id="4" value="4" onclick="new CurrentCheckboxValidator().selectCurrentCheckbox(4)">
                            <label for="4">4</label>

                            <br>
                            <br>

                            <label for="y">Y:</label>
                            <input name="y" id="y" type="text" placeholder="-5 ... 3">

                            <br>
                            <br>

                            <label for="r">R:</label>
                            <select name="r" id="r">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </form>
                    </div>
                    <div id="error-message">
                        <p>Error</p>
                    </div>
                    <input type="submit" form="data" id="send" value="Отправить">
                </td>
                <td id="table" colspan="2">
                    <table id="results">
                        <tr>
                            <th>Дата</th>
                            <th>Время выполнения</th>
                            <th>X</th>
                            <th>Y</th>
                            <th>R</th>
                            <th>Результат</th>
                        </tr>
                        <?php
                        if (!isset($_SESSION["HISTORY"])) {
                            $_SESSION["HISTORY"] = [];
                        }
                        $history = $_SESSION["HISTORY"];
                        for ($i = 0; $i < count($history); $i++) {
                            echo $history[$i];
                        }
                        ?>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>
