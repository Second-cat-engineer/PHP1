<?php
/*Проведите самостоятельное исследование на тему "Что возвращает оператор include,
если его использовать как функцию?".
Используйте руководство по языку, составьте и приложите примеры, иллюстрирующие ваше исследование. */

//function include() {} // Синтаксическая ошибка, зарезервированное слово


function TestWithInclude(){
    $Test = include (__DIR__ . '/TestWithInclude.php');
    return $Test;
}
var_dump(TestWithInclude());
/*
1) В случае удачного подключения TestWithInclude.php возвращает (int)1 т.е. true.
2) В случае если в файле TestWithInclude.php написано return $test = 'TEST', то выведется string(4) "test".
 */


/*
Readme.txt
TEST
*/
include __DIR__ . '/Readme.txt';   // в поток выведется TEST, т.к. в файле readme.txt записано TEST
var_dump(include __DIR__ . '/Readme.txt'); // выведет в поток 1 (True) если файл подключен и содержимое; WARNING и false в случае ошибки


