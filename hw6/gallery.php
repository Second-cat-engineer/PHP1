<?php
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/classes/Uploader.php';
session_start();

if (null === getCurrentUser()){
    echo 'Вы вошли как: Гость!';
} else {
    echo 'Вы вошли под Логином: ' . getCurrentUser() . '!';
}
if (isset($_FILES['img'])){
    $uploader = new Uploader('img');
    $uploader->isUploaded();
    $uploader->upload();
    $uploader->saveInfoUploadedImages();
}
?>
<html>
<head>
    <meta charset = "utf-8">
    <title> Галлерея изображений </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
<div class="container">
    <!-- Шапка -->
    <div style="text-align: center;">
        <img src="/hw6/style/logo.jpg" alt="Логотип">
    </div>

    <!-- Полоска меню  -->
    <div class="label-danger padding">
        <ul class="pager menu">
            <li>
                <a href="/hw6/guestBook.php">
                    <span class="glyphicon glyphicon-tasks"></span>
                    <div> Гостевая книга </div>
                </a>
            </li>
            <li>
                <a href="/hw6/gallery.php">
                    <span class="glyphicon glyphicon-camera"></span>
                    <div> Галлерея </div>
                </a>
            </li>
            <li>
                <a href="/hw6/login.php">
                    <span class="glyphicon glyphicon-user"></span>
                    <div> Войти </div>
                </a>
            </li>
            <li>
                <a href="/hw6/registrationForm.php">
                    <span class="glyphicon glyphicon-user"></span>
                    <div> Зарегистрироваться </div>
                </a>
            </li>
        </ul>
    </div>

    <!-- Основная часть сайта -->
    <div class="row" style="padding-top: 10px">
        <h1> Галлерея изображений </h1>
        <div class="row" style="padding-top: 10px">
            <?php
            $images = scandir(__DIR__. '/gallery');
            foreach ($images as $image) {// Пройди по всем элементам массива и исключи ., .. и Thumbs.db
                if ($image == '.' || $image ==  '..' || $image == 'Thumbs.db' ) {
                    continue;
                } ?>
                <div class="col-xs-6 col-md-4">
                    <a href = "/hw6/gallery/<?php echo $image ?>">
                        <img src="/hw6/gallery/<?php echo $image?>" style = "width: 300px">
                    </a>
                    <?php
                        $infoAboutUploadedImages = unserialize(file_get_contents(__DIR__ . '/infoAboutUploadedImages'));;
                        if (isset($infoAboutUploadedImages[$image])) { ?>
                            <p> Автор: <?php echo $infoAboutUploadedImages[$image]['author']; ?> </p>
                            <p> Дата загрузки: <?php echo date('Y-m-d H:i:s', $infoAboutUploadedImages[$image]['data']); ?> </p>
                        <?php } ?>
                </div>
            <?php } ?>
        </div>
        <hr>
        <?php if (null === getCurrentUser()){ ?>
            <h3> Картинки могут добавлять только авторизованные пользователи </h3>
            <p> Если вы зарегистрированы на сайте, то необходимо
                <a href="/hw6/login.php"> авторизоваться </a>
            </p>
            <p> Если вы не зарегистрированы, то необходимо пройти
                <a href="/hw6/registrationForm.php"> регистрацию </a>
            </p>
        <?php } else { ?>
            <form action="/hw6/gallery.php" method="post" enctype="multipart/form-data">
                <input type = "file" name = "img">
                <button type="submit">Загрузить</button>
            </form>
        <?php } ?>
    </div>
</div>
</body>
</html>