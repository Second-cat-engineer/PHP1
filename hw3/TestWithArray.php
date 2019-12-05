<?php
    $fruits = [
        'яблоко' => 'apple',
        'апельсин' => 'orange',
        'банан' => 'banana',
        'огурец' => '',
    ];

    //перебрал все индексы и значения
    foreach ($fruits as $russian => $english) {
        echo $russian . ' ' . $english . '<br>';
    };

    // удалил элемент с индексом 'апельсин'
    unset($fruits ['апельсин']);
    var_dump($fruits);

    // добавил новый элемент с индексом 'orange' значением 'апельсин'
    $fruits ['orange'] ='апельсин';
    var_dump($fruits);

    //проверка наличия элемента в массиве
    // isset - проверяет наличие элеманта по ключю. true если есть элемент с таким ключом, даже если значение false
    var_dump(isset($fruits ['огурец']));

    // empty - проверяет на пустоту. true если элемента нет или ее значение false
    var_dump(empty($fruits ['огурец']));

    // !empty - в отличие от isset будет проверять не только на существование, но и на пустоту.
    var_dump(!empty($fruits ['огурец']));

    //проверка есть ли элемент с таким значением
    var_dump(in_array('banana', $fruits));

    echo '<br>';
    //объединение двух массивов
    $b = [1,  'this' => 3, 'afsadf',];
    $c = [1, 'asf', 4];

    var_dump(array_merge($b, $c)); echo '<br>'; //элементы второго массива добавляет в перый (ключ + 1 от последнего)
    var_dump($c + $b); // если какие то ключи совпадают то просто оставляет от первого массива
    echo '<br>';

    $array = [
        1    => "a",
        1.5  => "c",
        true => "d",
        "1"  => "b",
    ];
    var_dump($array); //смысл в том что последний ключи "1" перекроет все остальные

    $ar = [
        1    => "a", "c", "d", "b",];
    var_dump($ar);

    $handle = opendir('.'); //Заполняет массив всеми элементами из директории
    while (false !== ($file = readdir($handle))) {
        $files[] = $file;
    }
    closedir($handle);
    var_dump($files);

$a[0] = 'b'; 
var_dump($a);