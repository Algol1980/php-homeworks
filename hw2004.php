<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 22.04.2016
 * Time: 0:44
 */

header('Content-Type: text/html; charset=utf-8');


//1. Поменять значения двух переменных
// 2-вариант (универсальный для всех скалярных типов)
echo '<h4>1. Поменять значения двух переменных</h4>';
$x = rand(1, 100);
$y = rand(1, 100);
$a = "one";
$b = "two";
echo $x, '  ', $y . '<br>';
echo $a, '  ', $b . '<br>';

function changeVariables($var1, $var2) {
    echo '<br>';
    $var1 = $var1 ^ $var2;
    $var2 = $var2 ^ $var1;
    $var1 = $var1 ^ $var2;
    print_r($var1);
    echo ' ';
    print_r($var2);

}

changeVariables($a, $b);
changeVariables($x, $y);




//2. Заполнить массив числами Фибоначчи до N
echo '<h4>2. Заполнить массив числами Фибоначчи до N</h4>';
$fibonacciArray = [];
$n = rand(1, 20);
$tmpFib1 = 0;
$tmpFib2 = 1;
for ($i = 0; $i <= $n; $i++) {
    $fibonacciArray[] = $tmpFib1 + $tmpFib2;
    $tmpFib2 += $tmpFib1;
    $tmpFib1 = $tmpFib2 - $tmpFib1;
    echo $fibonacciArray[$i] . ' ';
}

echo '<br>';

//3. Заполнить массив n случайными значениями, вывести на экран.
echo '<h4>3. Заполнить массив n случайными значениями, вывести на экран.</h4>';
$randomArray = [];
for ($i = 0; $i <= $n; $i++) {
    $randomArray[$i] = rand();
    echo $randomArray[$i] . ' ';
}


echo '<br>';

//4. Найти среднее арифметическое массива.
//4.1 Решение без встроенных функций
echo '<h4>4. Найти среднее арифметическое массива.</h4>';
echo '<h5>4.1 Решение без встроенных функций</h5>';
$sum = 0;
for ($i = 0; $i < count($randomArray); $i++) {
    $sum += $randomArray[$i];
}
echo 'Сумма: ', $sum, ' Среднее арифметическое: ', $sum / count($randomArray), '<br>';

//4.2 Решение с функциями
echo '<h5>4.2 Решение с функциями</h5>';
echo 'Сумма: ', $sum, ' Среднее арифметическое: ', array_sum($randomArray) / count($randomArray), '<br>';


//5. Циклично сдвинуть массив на N элементов
//5.1 Решение c циклом
echo '<h4>5. Циклично сдвинуть массив на N элементов.</h4>';
//echo '<h5>5.1 Решение c циклом</h5>';
//$moveArray = [1, 2, 3, 4, 5, 6, 7, 8, 9];
//$moveNumber = mt_rand();
//$moveArrayLength = count($moveArray);
//$moveNumber = $moveArrayLength%$moveNumber;
//print_r($moveArray);
//echo '<br>', 'Сдвиг: ', $moveNumber, '<br>';
//for ($i = $moveArrayLength; $i > $moveArrayLength - $moveNumber; $i--) {
//    $moveItem = array_pop($moveArray);
//    array_unshift($moveArray, $moveItem);
//}
//print_r($moveArray);
//echo '<br>';
//
////5.2 Решение  с функциями
//$moveArray1 = [1, 2, 3, 4, 5, 6, 7, 8, 9];
//$moveArrayLength1 = count($moveArray1);
////$moveNumber = $moveArrayLength1%$moveNumber;
//echo '<h5>5.2 Решение с функциями</h5>';
//print_r($moveArray1);
//echo '<br>', 'Сдвиг: ', $moveNumber, '<br>';
////$tmpArray =
//$moveArray1 = array_merge(array_splice($moveArray1, -$moveNumber), $moveArray1);
//print_r($moveArray1);
//echo '<br>';

//5.3 Доработал, сделала универсальный вариант для всех n

$moveArray = range(1, 15);
$moveNumber = mt_rand(-200, 200);
function arrayShift($arr, $n) {
    if (!is_int($n)) {
        return 'Сдвиг должен быть целым числом';
    }
    $arrLength = count($arr);

    if ($arrLength === 0) {
        return $arr;
    }

    $n = $n % $arrLength;
    $n *= -1;

    return array_merge(array_slice($arr, $n), array_slice($arr, 0, $n));
}

print_r($moveArray1);
echo '<br>', 'Сдвиг: ', -3, '<br>';
print_r(arrayShift($moveArray, -3));
echo '<br>';
print_r($moveArray1);
echo '<br>', 'Сдвиг: ', 5, '<br>';
print_r(arrayShift($moveArray, 5));
echo '<br>';
echo '<br>', 'Сдвиг: ', 'string', '<br>';
print_r(arrayShift($moveArray, 'string'));
echo '<br>';
echo '<br>', 'Сдвиг: ', $moveNumber%count($moveArray), '<br>';
print_r(arrayShift($moveArray, $moveNumber));
echo '<br>';




//
//printf('Массив до сдвига: ' . implode(',', $moveArray) . '<br>');
//printf('Сдвиг: ' . $moveNumber%count($moveArray) . '<br>Массив: ' . implode(',', arrayShift($moveArray, 8)) . '<br>');
//printf('Сдвиг: ' . $moveNumber%count($moveArray) . '<br>Массив: ' . implode(',', arrayShift($moveArray, 'string')) . '<br>');
////printf(implode(',', arrayShift($moveArray, 'string')));



//6. Определить количество вхождений элемента N в массив
//6.1 Решение без встроенных функций
echo '<h4>6. Определить количество вхождений элемента N в массив</h4>';
echo '<h5>6.1 Решение без встроенных функций</h5>';
$newN = 5;
$cnt = 0;
$arr = [5, 6, 5, 6, 8, 9, 12, 5];
for ($i = 0; $i < count($arr); $i++) {
    if ($newN == $arr[$i]) {
        $cnt++;
    }
}
echo 'Элементов в массиве: ', $cnt;
echo '<br>';

//6.2 Решение с функциями
echo '<h5>6.2 Решение с функциями</h5>';
echo 'Элементов в массиве: ', array_count_values($arr)[$newN];