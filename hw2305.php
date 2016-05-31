<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 25.05.2016
 * Time: 1:44
 */
header('Content-Type: text/html; charset=utf-8');

//6. Пользователь выбирает название курса из трех вариантов и видит его стоимость и имя куратора.


$courses = ['php' => ['Михаил Болсуновский', 6200], 'js' => ['Руслан Устюгов', 4500], 'markup' => ['Евгения Толстокорова', 4000]];
$errorOne = '';
$errorTwo = '';

if (isset($_POST['submitOne'])) {
    if (isset($_POST['courses']) && array_key_exists($_POST['courses'], $courses)) {
        $successOne = "Преводаватель: {$courses[$_POST['courses']][0]}. Цена: {$courses[$_POST['courses']][1]}грн.";
    } else {
        $errorOne = 'Incorrect course value';
    }
}

//10. Создать форму которая считает стоимость пиццы + доставка.
$pizzaArray = ['С беконом' => 50, 'С говядиной' => 55, 'С салями' => '60', 'С грибами' => '65', 'Веганская' => 70];
$drinkArray = ['Не выбрано' => 0, 'cola' => 20, 'fanta' => '20', 'sprite' => '20'];

if (isset($_GET['submitTwo'])) {
    if (!isset($_GET['deliveryRange']) || !is_numeric($_GET['deliveryRange'])) {
        $errorTwo = 'Incorrect delivery range';
    } else {
        $pizza = $_GET['pizza'];
        $drink = $_GET['drink'];
        $deliveryRange = $_GET['deliveryRange'];
        if (isset($_GET['promocode'])) {
            $promocode = 0.9;
        } else {
            $promocode = 1;
        }
        $successTwo = 'Общая стоимость заказа: ' . ($pizza + $drink + $deliveryRange * 3) * $promocode;
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h4>6. Пользователь выбирает название курса из трех вариантов и видит его стоимость и имя куратора.</h4>

<form action="" method="post">
    <label for="courses">Выбирите курс</label>
    <select name="courses">
        <option value="php">PHP/MYSQL/AJAX</option>
        <option value="js">Javascript</option>
        <option value="markup">Верстка</option>
    </select>
    <input type="submit" value="submit" name="submitOne">
</form>
<?php echo $successOne; ?>
<?php echo $errorOne; ?>

<h4>10. Создать форму которая считает стоимость пиццы + доставка. </h4>

<form action="" method="get">
    <label for="pizza">Выбирите пиццу</label>

    <select name="pizza">
        <?php foreach ($pizzaArray as $key => $value) { ?>
        <option
            value="<?php echo $value; ?>"
            <?php echo isset($_GET['pizza']) && $_GET['pizza'] == $value ?  ' selected' : ''; ?>>
            <?php echo $key; ?>
        </option>
        <?php }   ?>
    </select>
    <label for="drink">Выбирите напиток</label>
    <select name="drink">
        <?php foreach ($drinkArray as $key => $value) { ?>
           <option
            value="<?php echo $value; ?>"
            <?php echo isset($_GET['drink']) && $_GET['drink'] == $value ?  ' selected'  : ''; ?>>
            <?php echo $key; ?>
        </option>
        <?php }   ?>
    </select>
    <label for="deliveryRange">Расстояние доставки</label>
    <input type="text" name="deliveryRange">
    <label for="promocode">У Вас есть промокод?</label>
    <input type="checkbox" name="promocode" <?php echo $_GET['promocode'] == 'on' ?  ' checked'  : ''; ?> >
    <input type="submit" value="submit" name="submitTwo">
</form>
<?php echo $successTwo; ?>
<?php echo $errorTwo; ?>
</body>
<style>
    label, input {
        display: block;
        margin: 5px;
    }
</style>
</html>
