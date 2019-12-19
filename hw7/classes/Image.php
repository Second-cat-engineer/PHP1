<?php


class Image
{
    protected $nameImage;
    protected $authorImage;
    protected $dateUploaded;

    public function __construct(array $image)
    {
        $this->nameImage = $image['name'];
        $this->authorImage = $image['author'];
        $this->dateUploaded = $image['date'];
    }

    public function getNameImage()
    {
        return $this->nameImage;
    }

    public function getAuthorImage()
    {
        return $this->authorImage;
    }

    public function getDateUploaded()
    {
        return $this->dateUploaded;
    }
}