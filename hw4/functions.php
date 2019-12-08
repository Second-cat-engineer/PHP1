<?php
function showComments() {
    return file(__DIR__ . '/comments', FILE_IGNORE_NEW_LINES);
}

function showImages() {
    return scandir(__DIR__ . '/gallery');
}
