<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 05.05.2016
 * Time: 15:30
 */

function listErrors($errArr)
{
    $errorMessage = '<ul>';
    foreach ($errArr as $value) {
        $errorMessage .= '<li>' . $value . '</li>';
    }
    $errorMessage .= '</ul>';
    return $errorMessage;
}

// 1. Доделать задачу: Пользователь вводит свой имя, пароль, email. Если вся информация указана, то показать эти данные после фразы 'Регистрация прошла успешно', иначе сообщить какое из полей оказалось не заполненным.
$required = ['mail', 'login', 'pass'];
if (count($_POST) > 0 && isset($_POST['submitOne'])) {
    foreach ($required as $value) {
        if (!isset($value, $_POST) || empty($_POST[$value])) {
            $errorArray[] = 'Incorrect ' . $value;
        }
    }
    if (isset($errorArray)) {
        $errorMessageOne = listErrors($errorArray);
    } else {
        $successMessage = 'Регистрация прошла успешно!<br> E-mail: ' . $_POST['mail'] . '<br> Login: ' . $_POST['login'] . '<br> Password: ' . $_POST['pass'] . '<br>';
    }

}
// 2. Создать форму для решения уровнения (x + y) * z , результат должен вычислятся в при помощи функции.
$vars = ['varX', 'varY', 'varZ'];
if (count($_POST) > 0 && isset($_POST['submitTwo'])) {
    foreach ($vars as $value) {
        if (!isset($value, $_POST) || empty($_POST[$value]) || !is_numeric($_POST[$value])) {
            $errorArrayTwo[] = 'Incorrect ' . $value;
        }

    }
    if (isset($errorArrayTwo)) {
        $errorMessageTwo = listErrors($errorArrayTwo);
    } else {
        $result = ($_POST['varX'] + $_POST['varY']) * $_POST['varZ'];
    }
}

//3. Cоздать 3 кнопки с названиями 1, 2, 3, расположенные друг над другом. При нажатии на любую кнопку порядок меняется таким образом, что нажатая кнопка становится на первое место.
function listButtons($arr)
{
    $listBtns = '';
    foreach ($arr as $value) {
        $listBtns .= '<p><a name="' . $value . '" href="hw0405.php?value=' . $value . '">' . $value . '</a></p>';
    }
    return $listBtns;
}

$buttonValues = ['1', '2', '3'];
if (count($_GET) > 0 && in_array($_GET['value'], $buttonValues)) {
    $topValue = $_GET['value'];
    $topValueKey = array_search($topValue, $buttonValues);
    unset($buttonValues[$topValueKey]);
    array_unshift($buttonValues, $topValue);
    $list = listButtons($buttonValues);
} else {
    $list = listButtons($buttonValues);
}

//4. Пользователь выбирает из выпадающего списка страну (Турция, Египет или Италия), вводит количество дней для отдыха и указывает, ...

if (isset($_POST['submitFour'])) {
    if (!isset($_POST['days']) || !is_numeric($_POST['days'])) {
        $errorMessageFour = 'Incorrect days value';
    } else {
        $increase = $_POST['country'];
        if (isset($_POST['discount'])) {
            $discount = 0.95;
        } else {
            $discount = 1;
        }
        $days = intval($_POST['days']);
        $resultFour = $days * 400 * $increase * $discount;
        $successMessageFour = 'Стоимость отдыха: ' . $resultFour;
    }

}


?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h4>1. Доделать задачу: Пользователь вводит свой имя, пароль, email. Если вся информация указана, то показать эти данные
    после фразы 'Регистрация прошла успешно', иначе сообщить какое из полей оказалось не заполненным.</h4>

<form action="hw0405.php" method="POST">
    <input type="text" name="mail">
    <input type="text" name="login">
    <input type="password" name="pass">
    <input type="submit" value="submit" name="submitOne">
</form>
<?php echo $successMessage; ?>
<?php echo $errorMessageOne; ?>

<h4>2. Создать форму для решения уровнения (x + y) * z , результат должен вычислятся в при помощи функции.</h4>

<form action="hw0405.php" method="POST">
    <input type="text" name="varX">
    <input type="text" name="varY">
    <input type="text" name="varZ">
    <input type="submit" value="submit" name="submitTwo">
</form>
<?php echo $result; ?>
<?php echo $errorMessageTwo; ?>

<h4>3. Cоздать 3 кнопки с названиями 1, 2, 3, расположенные друг над другом. При нажатии на любую кнопку порядок
    меняется таким образом, что нажатая кнопка становится на первое место.</h4>
<?php echo $list; ?>


<h4>4. Пользователь выбирает из выпадающего списка страну (Турция, Египет или Италия), вводит количество дней для отдыха
    и указывает, ...</h4>

<form action="hw0405.php" method="POST">
    <label for="country">Выбирите страну</label>
    <select name="country">
        <option value="1">Турция</option>
        <option value="1.1">Египет</option>
        <option value="1.12">Италия</option>
    </select>
    <label for="discount">Скидка:</label>
    <input type="checkbox" name="discount">
    <label for="discount">Количество дней:</label>
    <input type="text" name="days">
    <input type="submit" value="submit" name="submitFour">
</form>
<?php echo $errorMessageFour; ?>
<?php echo $successMessageFour; ?>

</body>
<style>
    a {
        display: inline-block;
        padding: 10px 20px;
        background-color: #094C6A;
        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
        border-radius: 6px;
        color: #fff;
        text-decoration: none;
    }
</style>
</html>