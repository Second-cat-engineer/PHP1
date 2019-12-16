<?php
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/classes/GuestBook.php';
session_start();

if (null === getCurrentUser()){
    echo 'Вы вошли как: Гость!';
} else {
    echo 'Вы вошли под Логином: ' . getCurrentUser() . '!';
}
?>
<html>
<head>
    <meta charset = "utf-8">
    <title> Гостевая книга </title>
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
            <h1> Гостевая книга </h1>
            <div class="row" style="padding-top: 10px">
                <?php
                $guestBook = new GuestBook(__DIR__ . '/comments');
                foreach ($guestBook->getData() as $comment) { ?>
                    <div class="thumbnail">
                        <?php echo $comment; ?>
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
                <form action="/hw6/addNewComment.php" method="post">
                    введите комментарий <br>
                    <input type="text" name="comment"> <br>
                    <button type="submit"> Опубликовать </button> <br>
                </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>