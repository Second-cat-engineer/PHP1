<?php
    //var_dump($_FILES);
    if (isset($_FILES['img'])) {
        $nameImg = $_FILES['img']['name'];

        // Ограничение загрузки - только файлы png и jpg
        $allowedExtensions = ['png', 'jpg']; //массив разрешенные разрешения
        $extension = pathinfo($nameImg, PATHINFO_EXTENSION); //возвращет инфу о пути. в данном случае путь у меня
        // то, что указано значением ключа 'name' массива $nameImg. если имя photo.jpg вернет только jpg
        //var_dump($extension);

        if (!in_array($extension, $allowedExtensions)) { //возвращает булево значение, т.е если
            //элемент $extension есть в массиве $allowedExtensions то вернет false и условие не выполниться.
            echo 'Загрузка файлов с таким расширением запрещена!';
        } elseif (0 === $_FILES ['img'] ['error']) {
            //Проверка на существование картинки с таким именем
            $gallery = scandir(__DIR__. '/gallery'); // верни массив имен всех файлов, содержащихся в папке gallery
            if (in_array($nameImg, $gallery)){ // если существует файл с таким именем
                $nameImg = time() . '.' . $extension; // то имя файла будет текущее время + его расширение
            }
            move_uploaded_file (
                $_FILES ['img'] ['tmp_name'], // возьми из временного хранилища и
                __DIR__ . '/gallery/' . $nameImg //на сервере сохрани с тем же именем файла, что было на компьютере пользователя
            );
        }
     }
?>
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
    <p> Галлерея изображений </p>
        <?php
            // верни массив имен всех файлов, содержащихся в папке gallery
            $gallery = scandir(__DIR__. '/gallery'); //var_dump($gallery);

            foreach ($gallery as $image) {// Пройди по всем элементам массива и исключи ., .. и Thumbs.db
                if ($image == '.' || $image ==  '..' || $image == 'Thumbs.db' ) {
                    continue;
                }
        ?>
                <div>
                    <a href = "/hw4/gallery/<?php echo $image ?>">
                        <img src="/hw4/gallery/<?php echo $image?>" style = "width: 300px"> <!--а все оставшиеся файлы выведи -->
                    </a>
                </div>
        <?php
            };
        ?>
    <hr>
    <form action="/hw4/gallery.php" method="post" enctype="multipart/form-data">
        <input type = "file" name = "img">
        <button type="submit">Загрузить</button>
    </form>

</body>
</html>