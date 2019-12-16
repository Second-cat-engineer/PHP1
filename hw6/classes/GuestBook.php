<?php


class GuestBook
{
    protected $filePathWithComments;
    protected $data;

    public function __construct($filePathWithComments)
    {
        $this->filePathWithComments = $filePathWithComments;
        $this->data = file($filePathWithComments, FILE_IGNORE_NEW_LINES);
    }

    public function getData()
    {
        return $this->data;
    }

    public function append($text)
    {
        $this->data[] = $text;
    }

    public function save()
    {
        $file = implode("\n", $this->data);
        file_put_contents($this->filePathWithComments, $file);
    }
}