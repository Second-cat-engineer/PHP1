<html>
<head>
    <meta charset = "utf-8">
    <title> Новости </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="/templates/style/style.css">
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
                <a href="/hw7/test.php">
                    <span class="glyphicon glyphicon-camera"></span>
                    <div> Новости </div>
                </a>
            </li>
        </ul>
    </div>

    <!-- Основная часть сайта -->
    <div class="row" style="padding-top: 10px">
        <h1> Новости </h1>
        <div class="row" style="padding-top: 10px">
            <?php foreach ($this->data['news'] as $id => $article) { ?>
                <div class="col-sm-12 col-md-4">
                    <div class="thumbnail">
                        <div class="caption">
                            <a href="">
                                <h2><?php echo $article->getTitle(); ?></h2>
                            </a>
                        </div>
                        <div>
                            <?php echo $article->getBody(); ?>
                        </div>
                        <div>
                            <?php echo $article->getAuthor(); ?>
                        </div>
                        <div>
                            <?php echo $article->getDate(); ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
</body>
</html>
