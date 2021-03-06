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
        <h1> Новости </h1>
        <div class="row" style="padding-top: 10px">
            <?php foreach ($this->data['News'] as $id => $article) { ?>
                <div class="col-sm-12 col-md-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <a href="/hw7/article.php?id=<?php echo $id ?>">
                                <h2><?php echo $article->getTitle(); ?></h2>
                            </a>
                        </div>
                        <div>
                            <?php echo substr($article->getText(), 0, 20); ?>
                        </div>
                        <h12 style="font-size: 15px">
                            Автор статьи:<?php echo $article->getAuthor(); ?>
                        </h12><br>
                        <h12 style="font-size: 15px">
                            Дата публикации:<?php echo date('Y-m-d H:i:s', $article->getDate()); ?>
                        </h12>
                    </div>
                </div>
            <?php } ?>
        </div>



        <hr>
        <?php if (null === $this->data['User']->getCurrentUser()){ ?>
            <h3> Статьи могут добавлять только авторизованные пользователи </h3>
            <p> Если вы зарегистрированы на сайте, то необходимо
                <a href="/hw7/login.php"> авторизоваться </a>
            </p>
            <p> Если вы не зарегистрированы, то необходимо пройти
                <a href="/hw7/registration.php"> регистрацию </a>
            </p>
        <?php } else { ?>
            <p> Если вы хотите предложить новость, то нажмите
                <a href="/hw7/offerArticle.php"> сюда </a>
            </p>
        <?php } ?>
    </div>
</div>
</body>
</html>
