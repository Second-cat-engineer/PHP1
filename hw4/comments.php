<?php
include __DIR__ . '/function.php';

if (!empty ($_POST ['comment'])){ //Проверка на существование и на пустоту
    $comment = $_POST ['comment'];
} else {
    $comment = null;
}

//получи содержимое файла в виде массива. каждая строка это отдельный элемент массива
$comments = showComments();
// Добавь элемент $comment в массив $comments
$comments[] = $comment; //var_dump($comments); echo '<br>';//лишний пробельчик
// объедини элементы массива в строку разделяя их символом перевода строки "\n"
$file = implode("\n", $comments); //var_dump($file);
// Запиши данные в файл comments
file_put_contents(__DIR__ . '/comments', $file);

header ('Location: /hw4/index.php'); // перенаправь на главную страницу

