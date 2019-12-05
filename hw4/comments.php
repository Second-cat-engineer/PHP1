<?php
    //var_dump($_POST); echo '<br>';

    if (!empty ($_POST ['comment'])) { //Проверка на существование и на пустоту
        $comment = $_POST ['comment'];
    } else {
        $comment = null;
    }
    //var_dump($comment); echo '<br>';

    //получи содержимое файла в виде массива. каждая строка это отдельный элемент массива
    $comments = file(__DIR__.'/comments', FILE_IGNORE_NEW_LINES);  //var_dump($comments); echo '<br>';
    // Добавь элемент $comment в массив $comments
    $comments[] = $comment; //var_dump($comments); echo '<br>';//лишний пробельчик
    // объедини элементы массива в строку разделяя их символом перевода строки "\n"
    $file = implode("\n", $comments); //var_dump($file);
    // Запиши данные в файл comments
    file_put_contents(__DIR__ . '/comments', $file);

    header ('Location: /hw4/index.php'); // перенаправь на главную страницу

