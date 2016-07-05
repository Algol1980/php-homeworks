<?php

/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 06.07.2016
 * Time: 1:44
 */
class Triangle extends Line {
    protected $x3;
    protected $y3;

    function __construct($x1, $y1, $x2, $y2, $x3, $y3)
    {
        parent::__construct($x1, $y1, $x2, $y2);
        $this->setX3($x3);
        $this->setY3($y3);

    }
    public function setX3($x3)
    {
        $this->x3 = intval($x3);
    }

    public function setY3($y3)
    {
        $this->y3 = intval($y3);
    }

    public function getX3()
    {
        return $this->x3;
    }

    public function getY3()
    {
        return $this->y3;
    }

    public function display()
    {
        parent::display();
        echo " x3: " . $this->x3 . " y3: " . $this->y3 . '<br>';
    }

}