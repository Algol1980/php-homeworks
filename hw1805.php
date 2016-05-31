<?php
//Написать функцию которая проверяет является треугорьник прямоугольным. Треугольник задается тремя точками.
function isRightTriangle($x1, $y1, $x2, $y2, $x3, $y3) {
    $a = sqrt(pow(($x2 - $x1), 2) + pow(($y2 - $y1), 2));
    $b = sqrt(pow(($x3 - $x1), 2) + pow(($y3 - $y1), 2));
    $c = sqrt(pow(($x2 - $x3), 2) + pow(($y2 - $y3), 2));
    $arr = [$a, $b, $c];
    sort($arr);
    $res =  pow($arr[2], 2) == (pow($arr[1], 2) + pow($arr[0], 2));
    return $res;
 }
echo isRightTriangle(1,1,1,5,8,1);

//Найдите количество прямоугольных треугольников со сторонами, меньшими 100.

function triangleCount()
{
    $triangleArr = [];
    for ($a = 3; $a < 100; $a++) {
        for ($b = $a + 1; $b < 100; $b++) {
            $c = floor(sqrt($a * $a + $b * $b));
            if ($c < 100 && ($c * $c == $a * $a + $b * $b)) {
                $triangleArr[] = [$a, $b, $c];
            }
        }
    }

return count($triangleArr);
}

echo triangleCount();



