<?php
require_once __DIR__ . '/classes/GuestBook.php';

if (!empty ($_POST['comment'])) {
    $comment = $_POST['comment'];
} else {
    $comment = null;
}

$guestBook = new GuestBook(__DIR__ . '/comments');
$guestBook->getData();
$guestBook->append($comment);
$guestBook->save();
header ('Location: /hw6/guestBook.php');
