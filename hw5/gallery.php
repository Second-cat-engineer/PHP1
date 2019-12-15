<?php
require_once __DIR__ . '/functions.php';
session_start();

if (!null == getCurrentUser()){
    echo 'Вы вошли под Логином: ' . getCurrentUser() . '!';
} else {
    echo 'Вы вошли как: Гость!';
}

if (isset($_FILES['img'])) {
    $nameImg = $_FILES['img']['name'];
    // Ограничение загрузки - только файлы png и jpg
    $allowedExtensions = ['png', 'jpg']; //массив разрешенные разрешения
    $extension = pathinfo($nameImg, PATHINFO_EXTENSION); //возвращет инфу о пути. в данном случае путь у меня
    // то, что указано значением ключа 'name' массива $nameImg. если имя photo.jpg вернет только jpg

    if (!in_array($extension, $allowedExtensions)) { //возвращает булево значение, т.е если
        //элемент $extension есть в массиве $allowedExtensions то вернет false и условие не выполниться.
        echo 'Загрузка файлов с таким расширением запрещена!';
    } elseif (0 === $_FILES['img']['error']) {
        //Проверка на существование картинки с таким именем
        $gallery = showImages(); // верни массив имен всех файлов, содержащихся в папке gallery
        if (in_array($nameImg, $gallery)){ // если существует файл с таким именем
            $nameImg = time() . '.' . $extension; // то имя файла будет текущее время + его расширение
        }
        move_uploaded_file (
            $_FILES['img']['tmp_name'], // возьми из временного хранилища и
            __DIR__ . '/gallery/' . $nameImg //на сервере сохрани с тем же именем файла, что было на компьютере пользователя
        );
    }
    // ведите лог (запись в файл) с данными: кто, когда и какое изображение загрузил
    $infoAboutUploadedImages = infoUploadedImages();
    $infoAboutUploadedImages[$nameImg]['author'] = getCurrentUser();
    $infoAboutUploadedImages[$nameImg]['data'] = time();
    $line = serialize($infoAboutUploadedImages);
    file_put_contents(__DIR__ . '/infoAboutUploadedImages', $line);
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
        <img src="/hw5/style/logo.jpg" alt="Логотип">
    </div>

    <!-- Полоска меню  -->
    <div class="label-danger padding">
        <ul class="pager menu">
            <li>
                <a href="/hw5/guestBook.php">
                    <span class="glyphicon glyphicon-tasks"></span>
                    <div> Гостевая книга </div>
                </a>
            </li>
            <li>
                <a href="/hw5/gallery.php">
                    <span class="glyphicon glyphicon-camera"></span>
                    <div> Галлерея </div>
                </a>
            </li>
            <li>
                <a href="/hw5/login.php">
                    <span class="glyphicon glyphicon-user"></span>
                    <div> Войти </div>
                </a>
            </li>
            <li>
                <a href="/hw5/registrationForm.php">
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
            $images = showImages();
            foreach ($images as $image) {// Пройди по всем элементам массива и исключи ., .. и Thumbs.db
                if ($image == '.' || $image ==  '..' || $image == 'Thumbs.db' ) {
                    continue;
                } ?>
                <div class="col-xs-6 col-md-4">
                    <a href = "/hw5/gallery/<?php echo $image ?>">
                        <img src="/hw5/gallery/<?php echo $image?>" style = "width: 300px">
                    </a>
                    <?php
                        $infoAboutUploadedImages = infoUploadedImages();
                        if (array_key_exists($image, $infoAboutUploadedImages)) { ?>
                            <p> Автор: <?php echo $infoAboutUploadedImages[$image]['author']; ?> </p>
                            <p> Дата загрузки: <?php echo date('Y-m-d H:i:s', $infoAboutUploadedImages[$image]['data']); ?> </p>
                        <?php } ?>
                </div>
            <?php } ?>
        </div>
        <hr>
        <?php if (!null == getCurrentUser()){ ?>
            <form action="/hw5/gallery.php" method="post" enctype="multipart/form-data">
                <input type = "file" name = "img">
                <button type="submit">Загрузить</button>
            </form>
        <?php } else { ?>
            <h3> Картинки могут добавлять только авторизованные пользователи </h3>
            <p> Если вы зарегистрированы на сайте, то необходимо
                <a href="/hw5/login.php"> авторизоваться </a>
            </p>
            <p> Если вы не зарегистрированы, то необходимо пройти
                <a href="/hw5/registrationForm.php"> регистрацию </a>
            </p>
        <?php } ?>
    </div>
</div>
</body>
</html>