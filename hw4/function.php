<?php
function showComments (){
    $comments = file(__DIR__ . '/comments', FILE_IGNORE_NEW_LINES);
    foreach ($comments as $comment) {
        echo $comment; ?><br><?php
    }
}


