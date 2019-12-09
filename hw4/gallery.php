<?php
include __DIR__ . '/functions.php';

if (isset($_FILES['img'])) {
    $nameImg = $_FILES['img']['name'];

    // Ограничение загрузки - только файлы png и jpg
    $allowedExtensions = ['png', 'jpg'];
    $extension = pathinfo($nameImg, PATHINFO_EXTENSION); // если имя photo.jpg вернет только jpg
    if (!in_array($extension, $allowedExtensions)) {
        echo 'Загрузка файлов с таким расширением запрещена!';
    } elseif (0 === $_FILES ['img'] ['error']) {
        $gallery = showImages();
        if (in_array($nameImg, $gallery)) {
            $nameImg = time() . '.' . $extension;
        }
        move_uploaded_file(
            $_FILES ['img'] ['tmp_name'],
            __DIR__ . '/gallery/' . $nameImg
        );
    }
}
?>
<p> Галлерея изображений </p>
<?php
$gallery = showImages();
foreach ($gallery as $image) {
    if ($image == '.' || $image == '..' || $image == 'Thumbs.db') {
        continue;
    }
    ?>
    <div>
        <a href="/hw4/image.php?image=<?php echo $image ?>">
            <img src="/hw4/gallery/<?php echo $image ?>" style="width: 100px">
        </a>
    </div>
    <?php
}
?>
<hr>
<form action="/hw4/gallery.php" method="post" enctype="multipart/form-data">
    <input type="file" name="img">
    <button type="submit">Загрузить</button>
</form>
