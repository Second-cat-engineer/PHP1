<?php
session_start();
require_once __DIR__ . '/classes/Users.php';
require_once __DIR__ . '/classes/UploaderImage.php';

$users = new Users();
$user = $users->getCurrentUser();
if (isset($_FILES['img'])){
    $uploader = new UploaderImage('img');
    $uploader->isUploaded();
    $uploader->upload();
    $uploader->saveInfoUploadedImages($user);
    header('Location: /hw7/gallery.php');
    exit();
}
header('Location: /hw7/gallery.php');

