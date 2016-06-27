<?php

/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 27.06.2016
 * Time: 16:59
 */
class Point
{
    private $x1;
    private $y1;

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
        echo "x1: " . $this->x1 . " y1: " . $this->y1  . '<br>';
    }


}

class Line extends Point
{
    private $x2;
    private $y2;

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

class Triangle extends Line {
    private $x3;
    private $y3;

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

$firstPoint = new Point(4, 8);
$firstPoint->display();
$firstPoint->setX1(456);
$firstPoint->setY1(825);
$firstPoint->display();
$line = new Line(333, 366, 55, 8);
$line->display();
$line->display();
$triangle = new Triangle(99, 88, 77, 66, 55, 44);
$triangle->display();
$rectangle = new Rectangle(11, 22, 33, 44, 555, 665, 777, 888);
$rectangle->display();
$rectangle->setY1(825);
$rectangle->display();
