<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 15.06.2016
 * Time: 1:53
 */

//1. Проверить введеный мак адресс на верность. Пример: 02:42:d3:48:08:83
header('Content-Type: text/html; charset=utf-8');

function checkMac($address)
{
    $pattern = '/([a-fA-F0-9]{2}:){5}[a-fA-F0-9]{2}/';
    if (preg_match($pattern, $address)) {
        return 'Address ' . $address . ' valid<br>';
    } else {
        return 'Address ' . $address . ' not valid<br>';
    }
}

function lookingForIp($tmpFile)
{
    $pattern = '/((25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)(\.(25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)){3})/';
    $ipArray = [];
    $tmpIp = [];
    if ($file = fopen($tmpFile, 'r')) {
        while (!feof($file)) {
            if ($line = fgets($file)) {
                if (preg_match_all($pattern, $line, $tmpIp)) {
                    foreach ($tmpIp[0] as $ip) {
                        array_push($ipArray, $ip);
                    }
                }
            }
        }
        fclose($file);
    }
    return $ipArray;
}


//2. Найти в css файле все hex цвета, заменить их на красный.

if (isset($_POST['task2']) && $_FILES['cssFile']['error'] == UPLOAD_ERR_OK) {
    if (is_uploaded_file($_FILES['cssFile']['tmp_name'])) {
        $file = fopen($_FILES['cssFile']['tmp_name'], 'r');
        $newFile = fopen(__DIR__ . '/result_' . $_FILES['cssFile']['name'], 'a+');
        $counter = 0;
        $pattern = '/#[a-fA-F0-9]{6}|#[a-fA-F0-9]{3}/';
        while (!feof($file)) {
            if ($line = fgets($file)) {
                $counter++;
                $line = preg_replace($pattern, '#ff0000', $line);
                fwrite($newFile, $line);
            }
        }
        fclose($file);
        fclose($newFile);
    }
}

function checkComplexity($password)
{
    $patternArray = ['/[a-z]/', '/[A-Z]/', '/[0-9]/', '/[-_\~!@\$%\^&\*\(\)\+`\";:<>\/\|]/'];
    foreach ($patternArray as $pattern) {
        if (!preg_match($pattern, $password)) {
            return 'Password need more complexity';
        }
    }
    return 'Password is OK';
}

//4. Выполнить поиск IP адресов (например 192.168.0.1) в строке, вернуть массив, оформит как функцию

if (isset($_POST['task4']) && $_FILES['logFile']['error'] == UPLOAD_ERR_OK) {
    if (is_uploaded_file($_FILES['logFile']['tmp_name'])) {
        $resultIp = lookingForIp($_FILES['logFile']['tmp_name']);
        var_dump($resultIp);
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
<h4>1. Проверить введеный мак адресс на верность. Пример: 02:42:d3:48:08:83</h4>
<?php echo checkMac('02:42:d3:48:08:83');
echo checkMac('68:94:2k:79:49:F1');
echo checkMac('30:B5:C2:18:76:62');
echo checkMac('64:77:9[:45:F9:D2'); ?>

<h4>2. Найти в css файле все hex цвета, заменить их на красный.</h4>

<form action="" method="post" enctype="multipart/form-data">
    <label for="cssFile">Файл для загрузки:</label><br>
    <input type="file" name="cssFile">
    <input type="submit" name="task2">
</form>

<h4>3. Выполнить задачу по проверке сложности пароля с использованием регулярных выражений. Пароль считатется сложным
    если в нем есть символы нижнего, верхнего регистра, числа, спец символы.</h4>
<?php echo checkComplexity('FFFFFFFFFF') . '<br>';
echo checkComplexity('Fd_ewrwe!1') . '<br>';
echo checkComplexity('F_!F') . '<br>';
echo checkComplexity('FFddf111FFFFF') . '<br>'; ?>

<h4>4. Выполнить поиск IP адресов (например 192.168.0.1) в строке, вернуть массив, оформит как функцию</h4>

<form action="" method="post" enctype="multipart/form-data">
    <label for="logFile">Файл для загрузки:</label><br>
    <input type="file" name="logFile">
    <input type="submit" name="task4">
</form>
<ul>
    <?php if (!empty($resultIp)):
        foreach ($resultIp as $ip): ?>
            <li><?php echo ' IP: ' . $ip ?></li>
        <?php endforeach;
    endif; ?>
</ul>

</body>
<style>
    ul {
        margin: 0;
        padding: 0;
        list-style: none;
    }
</style>
</html>
