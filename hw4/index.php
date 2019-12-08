<?php
include __DIR__ . '/functions.php';
?>
<h1>Комментарии</h1>
<?php
$comments = showComments();
foreach ($comments as $comment) {
    echo $comment ?><br><?php
}
?>
<hr>
<form action="/hw4/comments.php" method="post">
    введите комментарий <br>
    <input type="text" name="comment"> <br>
    <button type="submit"> Опубликовать</button>
    <br>
</form>

