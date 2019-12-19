<html>
<head>
    <meta charset = "utf-8">
    <title> Станица новостей </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/hw7/templates/style/style.css">
</head>
<body>
<div class="container">
    <!-- Шапка -->
    <div style="text-align: center;">
        <img src="/hw7/templates/style/logo.jpg" alt="Логотип">
    </div>

    <!-- Полоска меню  -->
    <div class="label-danger padding">
        <ul class="pager menu">
            <li>
                <a href="/hw7/index.php">
                    <span class="glyphicon glyphicon-home"></span>
                    <div> Главная </div>
                </a>
            </li>
            <li>
                <a href="/hw7/news.php">
                    <span class="glyphicon glyphicon-list-alt"></span>
                    <div> Новости </div>
                </a>
            </li>
            <li>
                <a href="/hw7/guestBook.php">
                    <span class="glyphicon glyphicon-book"></span>
                    <div> Гостевая книга </div>
                </a>
            </li>
            <li>
                <a href="/hw7/gallery.php">
                    <span class="glyphicon glyphicon-camera"></span>
                    <div> Галлерея </div>
                </a>
            </li>
            <li>
                <a href="/hw7/login.php">
                    <span class="glyphicon glyphicon-user"></span>
                    <div> Войти </div>
                </a>
            </li>
            <li>
                <a href="/hw7/registration.php">
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
            <?php foreach ($this->data['Gallery'] as $image) { ?>
                <div class="col-xs-6 col-md-4">
                    <a href = "">
                        <img src="/hw7/gallery/<?php echo $image->getNameImage() ?>" style = "width: 300px">
                    </a>
                        <p> Автор: <?php echo $image->getAuthorImage(); ?> </p>
                        <p> Дата загрузки: <?php echo date('Y-m-d H:i:s', $image->getDateUploaded()) ?> </p>
                </div>
            <?php } ?>
        </div>
        <hr>
        <?php if (null === $this->data['User']->getCurrentUser()){ ?>
            <h3> Картинки могут добавлять только авторизованные пользователи </h3>
            <p> Если вы зарегистрированы на сайте, то необходимо
                <a href="/hw7/login.php"> авторизоваться </a>
            </p>
            <p> Если вы не зарегистрированы, то необходимо пройти
                <a href="/hw7/registration.php"> регистрацию </a>
            </p>
        <?php } else { ?>
            <form action="/hw7/addNewImage.php" method="post" enctype="multipart/form-data">
                <input type = "file" name = "img">
                <button type="submit">Загрузить</button>
            </form>
        <?php } ?>
    </div>
</div>
</body>
</html>
