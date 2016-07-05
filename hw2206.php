<?php

/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 27.06.2016
 * Time: 16:59
 */

spl_autoload_register(function ($class) {
    echo 'Trying to load ' . $class . '...';
    require 'hw2206/' . $class . '.php';
});




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
