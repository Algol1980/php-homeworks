<?php

/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 06.07.2016
 * Time: 1:45
 */

class Rectangle extends Triangle {

    private $x4;
    private $y4;
    function __construct($x1, $y1, $x2, $y2, $x3, $y3, $x4, $y4)
    {
        parent::__construct($x1, $y1, $x2, $y2, $x3, $y3);
        $this->setX4($x4);
        $this->setY4($y4);

    }
    public function setX4($x4)
    {
        $this->x4 = intval($x4);
    }

    public function setY4($y4)
    {
        $this->y4 = intval($y4);
    }

    public function getX4()
    {
        return $this->x4;
    }

    public function getY4()
    {
        return $this->y4;
    }

    public function display()
    {
        parent::display();
        echo " x4: " . $this->x4 . " y4: " . $this->y4 . '<br>';
    }

}