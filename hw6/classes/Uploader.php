<?php


class Uploader
{
    protected $fieldNameToLoad;
    protected $nameImg; // необходим для сохранения информации о загруженном файле

    public function __construct($fieldNameToLoad)
    {
        $this->fieldNameToLoad = $fieldNameToLoad;
    }

    public function isUploaded()
    {
        return  (0 == $_FILES[$this->fieldNameToLoad]['error']);
    }

    public function upload()
    {
        if ($this->isUploaded()) {
            $allowedExtensions = ['png', 'jpg']; // Ограничение загрузки - только файлы png и jpg
            $extension = pathinfo($_FILES[$this->fieldNameToLoad]['name'], PATHINFO_EXTENSION); //если имя photo.jpg вернет только jpg
            if (!in_array($extension, $allowedExtensions)) {
                echo 'Загрузка файлов с расширением ' . $extension . ' запрещена!';
            } else {
                $images = scandir(__DIR__. '/../gallery');
                if (in_array($_FILES[$this->fieldNameToLoad]['name'], $images)) {
                    $nameImg = time() . '.' . $extension; // то имя файла будет текущее время + его расширение
                } else {
                    $nameImg = $_FILES[$this->fieldNameToLoad]['name'];
                }
                move_uploaded_file (
                    $_FILES[$this->fieldNameToLoad]['tmp_name'],
                    __DIR__ . '/../gallery/' . $nameImg
                );
                $this->nameImg = $nameImg; // необходим для сохранения информации о загруженном файле
            }
        }
    }

    public function saveInfoUploadedImages()
    {
        //возвращает инфу в виде массива ['имяФайла' => ['автор' => '', 'датаЗагрузки' => '']]
        $infoAboutUploadedImages = unserialize(file_get_contents(__DIR__ . '/../infoAboutUploadedImages'));
        $infoAboutUploadedImages[$this->nameImg]['author'] = getCurrentUser();
        $infoAboutUploadedImages[$this->nameImg]['data'] = time();
        $line = serialize($infoAboutUploadedImages);
        file_put_contents(__DIR__ . '/../infoAboutUploadedImages', $line);
    }
}