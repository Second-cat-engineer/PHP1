<?php
    if (!empty ($_POST ['comment'])) { //Проверка на существование и на пустоту
        $comment = $_POST ['comment'];
    } else {
        $comment = null;
    }

    //получи содержимое файла в виде массива. каждая строка это отдельный элемент массива
    $comments = file(__DIR__.'/comments', FILE_IGNORE_NEW_LINES);
    // Добавь элемент $comment в массив $comments
    $comments[] = $comment;
    // объедини элементы массива в строку разделяя их символом перевода строки "\n"
    $file = implode("\n", $comments); //var_dump($file);
    // Запиши данные в файл comments
    file_put_contents(__DIR__ . '/comments', $file);

    header ('Location: /hw5/guestBook.php'); // перенаправь на страницу Гостевой книги

