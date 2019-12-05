<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>calc</title>
</head>
<body>
<p>
    <a href="<?php echo __DIR__?>/hw3/Task1.php">Назад, ввести новые числа</a>
</p>
<p> Данные пусть передаются методом GET из формы (да, можно и так!) на скрипт, который их примет и выведет выражение и его результат </p>
<?php
//var_dump($_GET); echo '<br>';

// Проверяет существование в массиве $_GET значений a, b, operation.
if (isset($_GET['a'])){    //$a = $_GET['a'] ?? 0;
    $a = $_GET['a'];
} else {
    $a = 0;
} //var_dump($a);

if (isset($_GET['b'])){
    $b = $_GET['b'];
} else {
    $b = 0;
} //var_dump($b);

$operation = $_GET ['operation']; //var_dump($operation);

include __DIR__ . '/functionCalc.php';

echo calc($a, $operation, $b);

assert(8 === calc (5, '+', 3));
assert(2 === calc (5, '-', 3));
assert(15 === calc (5, '*', 3));
assert(2 === calc (6, '/', 3));
?>
</body>
</html>
