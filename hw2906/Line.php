<?php

/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 06.07.2016
 * Time: 1:43
 */
class Line extends Point
{
    protected $x2;
    protected $y2;

    function __construct($x1, $y1, $x2, $y2)
    {
        parent::__construct($x1, $y1);
        $this->setX2($x2);
        $this->setY2($y2);

    }

    public function setX2($x2)
    {
        $this->x2 = intval($x2);
    }

    public function setY2($y2)
    {
        $this->y2 = intval($y2);
    }

    public function getX2()
    {
        return $this->x2;
    }

    public function getY2()
    {
        return $this->y2;
    }


    public function display()
    {
        parent::display();
        echo " x2: " . $this->x2 . " y2: " . $this->y2 . '<br>';

    }

}