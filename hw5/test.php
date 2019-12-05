<?php
abstract class HumanAbstract
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    abstract public function getGreetings(): string;
    abstract public function getMyNameIs(): string;

    public function introduceYourself(): string
    {
        return $this->getGreetings() . '! ' . $this->getMyNameIs() . ' ' . $this->getName() . '.';
    }
}

class ClassRussianHuman extends HumanAbstract
{
    public function getGreetings() : string
    {
        return 'Привет';
    }

    public function getMyNameIs(): string
    {
        return 'Меня зовут';
    }
}
class ClassEnglishHuman extends HumanAbstract
{
    public function getGreetings() : string
    {
        return 'Hello';
    }

    public function getMyNameIs(): string
    {
        return 'My name is';
    }
}

$saf1 = new ClassRussianHuman('Сафуан');
$say1 = $saf1->introduceYourself();
echo $say1 . '<br>';

$saf2 = new ClassEnglishHuman('Safuan');
$say2 = $saf2->introduceYourself();
echo $say2;