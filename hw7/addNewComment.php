<?php
session_start();
require_once __DIR__ . '/classes/GuestBook.php';
require_once __DIR__ . '/classes/Users.php';
require_once __DIR__ . '/classes/GuestBookRecord.php';

$users = new Users();
if (empty($_POST['comment'])) {
    header ('Location: /hw7/guestBook.php');
    exit();
} else {
    $comment = [];
    $comment['comment'] = $_POST['comment'];
    $comment['author'] = $users->getCurrentUser();
    $comment['date'] = time();
}

$guestBook = new GuestBook();
$guestBookRecord = new GuestBookRecord($comment);
$guestBook->getAllComments();
$guestBook->addNewComment($guestBookRecord);
$guestBook->saveNewComment();
header ('Location: /hw7/guestBook.php');

