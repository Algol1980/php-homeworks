<?php
header('Content-Type: text/html; charset=utf-8');
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 13.05.2016
 * Time: 15:36
 */


function removeDoubles($arr, $column)
{
    $resultArr = [];
    $val = [];
    foreach ($arr as $value) {
        if (!in_array($value[$column], $val)) {
            $val[] = $value[$column];
            $resultArr[] = $value;
        }
    }
    return $resultArr;
}

if (isset($_POST['submitFirst'])) {
    $errorMessageOne = '';
    if ($_FILES['fileToCompareFirst']['error'] != UPLOAD_ERR_OK) {
        $errorMessageOne .= $_FILES['fileToCompareFirst']['error'] . '<br>';
    }
    if ($_FILES['fileToCompareSecond']['error'] != UPLOAD_ERR_OK) {
        $errorMessageOne .= $_FILES['fileToCompareSecond']['error'] . '<br>';
    } else {
        $firstFile = file($_FILES['fileToCompareFirst']['name'], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $secondFile = file($_FILES['fileToCompareSecond']['name'], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        $successMessageOne = implode('<br>', array_intersect($firstFile, $secondFile));
    }
}

if (isset($_POST['submitSecond'])) {
    if ($_FILES['removeDoubles']['error'] != UPLOAD_ERR_OK) {
        $errorMessageOne = $_FILES['removeDoubles']['error'];
    } else {
        $login = 0;
        $email = 2;
        $filename = explode('.', $_FILES['removeDoubles']['name'])[0] . '_filtered.txt';
        $usersArr = file($_FILES['removeDoubles']['name'], FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($usersArr as $key => $value) {
            $newarr[$key] = explode(':', $value);
        }
        $newarr = removeDoubles(removeDoubles($newarr, $login), $email);
        foreach ($newarr as $key => $value) {
            $resultArray[$key] = implode(':', $value);
        }
        $successMessageTwo = implode('<br>', $resultArray);
        file_put_contents($filename, implode("\r\n", $resultArray));
    }
}

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h4>Даны два файлы со словами (нужно создать форму для их загрузки), разделенными пробелами. Вывести строки, которые
    встречаются в обоих файлах. Оформить функцию.</h4>

<form action="hw1105.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToCompareFirst"><br>
    <input type="file" name="fileToCompareSecond"><br>
    <input type="submit" name="submitFirst">
</form>
<?php echo $errorMessageOne; ?>
<?php echo $successMessageOne; ?>


<h4>Дан файл (загрузка через форму). Каждая строка содержит имя, пароль и email, разделенные символами ':' (двоеточие).
    Удалить строки с повторами email. Удалить строки, в которых имена совпадают.</h4>

<form action="hw1105.php" method="post" enctype="multipart/form-data">
    <input type="file" name="removeDoubles"><br>
    <input type="submit" name="submitSecond">
</form>
<?php echo $errorMessageTwo; ?>
<?php echo $successMessageTwo; ?>
</body>
</html>
