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
        <h1> Главная страница сайта </h1>
        <h2> Добро пожаловать на учебный сайт! На этом сайте есть следующие разделы: </h2>
        <ul>
            <li>
                <a href="/hw7/guestBook.php"> Гостевая книга </a>
            </li>
            <li>
                <a href="/hw7/gallery.php"> Галлерея </a>
            </li>
            <li>
                <a href="/hw7/news.php"> Новости </a>
            </li>
        </ul>
    </div>
</div>
</body>
</html>