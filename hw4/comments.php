<?php
include __DIR__ . '/functions.php';

if (!empty ($_POST ['comment'])) {
    $comment = $_POST ['comment'];
} else {
    $comment = null;
}

$comments = showComments();
$comments[] = $comment;
$file = implode("\n", $comments);
file_put_contents(__DIR__ . '/comments', $file);
header('Location: /hw4/index.php');
