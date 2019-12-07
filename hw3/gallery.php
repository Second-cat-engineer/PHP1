<?php
$images = include __DIR__ . '/imagesDb.php';

foreach ($images as $id => $nameImage) { ?>
    <div>
        <a href = "/hw3/image.php?id=<?php echo $id ?>">
            <img src="/hw3/gallery/<?php echo $nameImage?>">
        </a>
    </div>
<?php
};
?>
