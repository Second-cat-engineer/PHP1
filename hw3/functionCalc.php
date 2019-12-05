<?php
function calc ($a, $operation, $b) {
    if (is_numeric($a) && is_numeric($b)) {  //проверяет, является ли переменная числом или строкой, содержащей число
        switch ($operation) {
            case '+':
                return $a + $b;
                break;
            case '-':
                return $a - $b;
                break;
            case '*':
                return $a * $b;
                break;
            case '/':
                if (0 == $b) {
                    return 'на 0 делить нельзя!';
                } else {
                    return  $a / $b;
                }
                break;
        }
    } else {
        if (!is_numeric($a) ) {
            echo 'a - НЕ число';
        } else {
            echo 'b - НЕ число';
        }
    }
}