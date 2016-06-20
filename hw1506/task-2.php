<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 20.06.2016
 * Time: 13:24
 */

if (isset($_POST['task2']) && !empty($_POST['text'])) {
    $pattern = '/([:|;]{1}-*(\({1,}|\){1,}|\[{1,}|\]{1,}))/';
    preg_match_all($pattern, $_POST['text'], $matches);
    if (!empty($matches)) {
        $result = 'Смайликов: ' .  count($matches[1]);
    }
    else {
        $result = 'Нет смайликов';
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
<form action="" method="post" enctype="multipart/form-data">
    <label for="text">Введите текст</label>
    <textarea name="text" id="" cols="30" rows="10"></textarea>
    <input type="submit" name="task2">
</form>
<p><?php echo isset($result) ?  $result : ''; ?></p>
</body>
</html>
