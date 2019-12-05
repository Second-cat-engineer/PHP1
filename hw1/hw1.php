<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HW1</title>
</head>
<body>

    <?php
	//echo PHP_VERSION;
    var_dump(2 * 2); //целое число
    var_dump(3 / 1); //целое число
    var_dump(1 / 3); //число с плавающей точкой
    var_dump('40cats' + 40); //ошибка. пытается привести 40cats в число
    var_dump(18 % 4); //остаток от деления
    ?>    <br>

    <?php
    echo ($a = 2); // значение 2 получает имя $a
    echo ' ';
    $x = ($y = 12) - 8; // сначала значение 12 получает имя(переменную) $Y, потом значение 12-8 получает имя $x;
    echo $x;
    ?>    <br>

    <?php
    var_dump(1==1.0); // равно (равны после преобразования типов) результат true
    var_dump(1===1.0); // тождественно равны (если равны и имеют тот же тип) результат false
    var_dump('02' == 2); // результат true, так как '02' приведется к типу int и будет 2
    var_dump('02' === 2); // результат false, так как типы не совпадают
    var_dump('02' == '2'); //рузультат true, так как оба аргумента приведутся типу int - 2
    ?> <br>

    <?php /* xor - оператор исключения. возвращает значение истина, если один и только один из ператоров имеет
    значение ложь. Если оба операнда тмеют значение истина, вернет ложь. */
    $x = true xor true;
    var_dump($x); //в этом случае выводит true, так как значению true присваивается имя x. Получается как: ($x = true) xor true;
    var_dump(true xor true); //в этом случае выводит false
    //$x = false xor true; var_dump($x); //в этом случае выводит false, так как значению false присваивается имя x
    ?>
</body>
</html>