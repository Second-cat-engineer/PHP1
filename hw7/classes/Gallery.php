<?php
require_once __DIR__ . '/Image.php';

class Gallery
{
    protected $pathToGallery;
    protected $pathInfoAboutImages;
    protected $gallery;

    public function __construct()
    {
        $this->pathToGallery = __DIR__ . '/../gallery';
        $this->pathInfoAboutImages = __DIR__ . '/../db/infoAboutUploadedImages';
        $images = scandir($this->pathToGallery);
        $infoAboutUploadedImages = unserialize(file_get_contents($this->pathInfoAboutImages));
        $gallery = [];
        foreach ($images as $image) {
            if ($image == '.' || $image ==  '..' ) {
                continue;
            }
            if (isset($infoAboutUploadedImages[$image])) {
                $gallery[$image] = [
                    'name' => $image,
                    'author' => $infoAboutUploadedImages[$image]['author'],
                    'date' => $infoAboutUploadedImages[$image]['date']
                ];
            }
        }
        $this->gallery = $gallery;
    }

    public function getGallery()
    {
        $gallery = [];
        foreach ($this->gallery as $image) {
            $gallery[] = new Image ($image);
        }
        return $gallery;
    }
}
