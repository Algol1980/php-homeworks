<?php

/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 06.07.2016
 * Time: 1:42
 */
class Point
{
    protected $x1;
    protected $y1;

    function __construct($x1, $y1)
    {
        $this->setX1($x1);
        $this->setY1($y1);

    }

    public function setX1($x1)
    {
        $this->x1 = intval($x1);
    }

    public function setY1($y1)
    {
        $this->y1 = intval($y1);
    }

    public function getX1()
    {
        return $this->x1;
    }

    public function getY1()
    {
        return $this->y1;
    }


    public function display()
    {
        echo "x1: " . $this->x1 . " y1: " . $this->y1 . '<br>';
    }


}