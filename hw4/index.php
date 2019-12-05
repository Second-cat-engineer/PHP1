<!doctype html>
<html lang="ru" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comments</title>
</head>
<body>
<h1>Комментарии</h1>
    <?php
    include __DIR__ . '/function.php';
    showComments ()
    ?>
    <hr>
    <form action="/hw4/comments.php" method="post">
            введите комментарий <br>
            <input type="text" name="comment"> <br>
            <button type="submit"> Опубликовать </button> <br>
    </form>
</body>
</html>
