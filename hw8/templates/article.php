<html>
<head>
    <meta charset = "utf-8">
    <title> Article </title>
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
    <div class="row" style="padding-top: 10px; text-align: center">
        <div class="row" style="padding-top: 10px">
            <div class="thumbnail">
                <div class="caption">
                        <h2><?php echo $this->data['Article'][0]['title']; ?></h2>
                </div>
                <div style="text-align: left">
                    <?php echo $this->data['Article'][0]['text']; ?>
                </div><br>
                <h12 style="font-size: 15px">
                    Автор статьи:<?php echo $this->data['Article'][0]['author']; ?>
                </h12><br>
                <h12 style="font-size: 15px">
                    Дата публикации:<?php echo date('Y-m-d H:i:s', $this->data['Article'][0]['date']); ?>
                </h12>
            </div>
        </div>
    </div>
</div>
</body>
</html>
