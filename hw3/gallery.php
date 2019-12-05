<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hw3</title>
</head>
<body>
    <p> Пусть на главной странице галереи выводятся 3-4 изображения</p>
    <?php
    $images = [
        'photo1.jpg',
        'photo2.jpg',
        'photo3.jpg',
    ];

    foreach ($images as $nameImage) { ?>
        <div>
            <a href = "/hw3/gallery/image.php?photo=<?php echo $nameImage ?>">
                <img src="gallery/<?php echo $nameImage?>"
            </a>
        </div>
    <?php
    };
    ?>

</body>
</html>