<?php
$images = include __DIR__ . '/imagesDb.php';
$id = $_GET['id'];

if (isset($images[$id])) { ?>
    <div>
        <img src="/hw3/gallery/<?php echo $images[$id]?>" alt="<?php echo $images[$id]?>" style="width: 100%">
    </div>
<?php
}
?>
<br>
<a href = "/hw3/gallery.php">Назад</a>
