<html>
<head>
    <meta charset = "utf-8">
    <title> Главная страница </title>
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
        <h1> Гостевая книга </h1>
        <div class="row" style="padding-top: 10px">
            <?php
            foreach ($this->data['GuestBook'] as $comment) { ?>
                <div class="thumbnail">
                    <p>
                        <?php echo $comment->getComment(); ?>
                    </p>
                    <h12 style="font-size: 15px">
                        Автор: <?php echo $comment->getAuthor(); ?> .
                    </h12><br>
                    <h12 style="font-size: 15px">
                        Дата публикации: <?php echo date('Y-m-d H:i:s', $comment->getDate()); ?>
                    </h12>
                </div>
            <?php } ?>
        </div>
        <hr>
        <?php if (null === $this->data['User']->getCurrentUser()){ ?>
            <h3> Картинки могут добавлять только авторизованные пользователи </h3>
            <p> Если вы зарегистрированы на сайте, то необходимо
                <a href="/hw6/login.php"> авторизоваться </a>
            </p>
            <p> Если вы не зарегистрированы, то необходимо пройти
                <a href="/hw6/registrationForm.php"> регистрацию </a>
            </p>
        <?php } else { ?>
            <form action="/hw7/addNewComment.php" method="post">
                введите комментарий <br>
                <input type="text" name="comment"> <br>
                <button type="submit"> Опубликовать </button> <br>
            </form>
        <?php } ?>
    </div>
</div>
</body>
</html>