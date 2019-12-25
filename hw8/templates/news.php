<html>
<head>
    <meta charset = "utf-8">
    <title> News </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/hw8/templates/style/style.css">
</head>
<body>
<div class="container">
    <!-- Шапка -->
    <div style="text-align: center;">
        <img src="/hw8/templates/style/logo.jpg" alt="Логотип">
    </div>

    <!-- Полоска меню  -->
    <div class="label-danger padding">
        <ul class="pager menu">
            <li>
                <a href="/hw8/news.php">
                    <span class="glyphicon glyphicon-list-alt"></span>
                    <div> Новости </div>
                </a>
            </li>
        </ul>
    </div>

    <!-- Основная часть сайта -->
    <div class="row" style="padding-top: 10px">
        <h1 style="text-align: center"> Новости </h1>
        <div class="row" style="padding-top: 10px">
            <?php foreach ($this->data['News'] as $article) { ?>
                <div class="col-sm-12 col-md-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <a href="/hw8/article.php?id=<?php echo $article->id ?>">
                                <h2><?php echo $article->title; ?></h2>
                            </a>
                        </div>
                        <div>
                            <?php echo substr($article->text, 0, 52); ?>
                        </div>
                        <h12 style="font-size: 15px">
                            Автор статьи:<?php echo $article->author; ?>
                        </h12><br>
                        <h12 style="font-size: 15px">
                            Дата публикации:<?php echo date('Y-m-d H:i:s', $article->date); ?>
                        </h12>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
</body>
</html>
