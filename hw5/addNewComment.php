<?php
    if (!empty ($_POST['comment'])) {
        $comment = $_POST['comment'];
    } else {
        $comment = null;
    }

    $comments = file(__DIR__.'/comments', FILE_IGNORE_NEW_LINES);
    $comments[] = $comment;
    $file = implode("\n", $comments);
    file_put_contents(__DIR__ . '/comments', $file);
    header ('Location: /hw5/guestBook.php');
