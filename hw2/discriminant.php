<?php
include __DIR__ . '/functions.php';

$a = 0.5;
$b = 4;
$c = 1;

$d = discriminant($a, $b, $c);

if (is_string($d)){
    echo $d;
} elseif (null === $d){
    echo 'Значение а равно 0! Уравнение неквадратное!';
} elseif ($d < 0) {
    echo 'Дискриминант равен: ' . $d . '! Уравнение не имеет корней!';
} elseif (0 === $d) {
    $x = -$b / (2 * $a);
    echo 'Дискриминант равен: ' . $d . '! Корень уравнения: ' . $x;
} elseif ($d > 0) {
    $x1 = (-$b + sqrt($d)) / (2 * $a);
    $x2 = (-$b - sqrt($d)) / (2 * $a);
    echo 'Дискриминант равен: ' . $d . '! '; ?> <br> <?php
    echo 'x1 = ' . $x1; ?> <br> <?php
    echo 'x2 = ' . $x2;
}