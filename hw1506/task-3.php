<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 20.06.2016
 * Time: 15:03
 */

if (isset($_POST['task3']) && !empty($_POST['text'])) {
    $pattern = '/\[(.+)\]\((http?(s:|:)\/\/.+)\)/';
    $linkPattern = '<a href="$2">$1</a>';
    $str = preg_replace($pattern, $linkPattern, $_POST['text']);
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
    <input type="submit" name="task3">
</form>
<p><?php echo isset($str) ? $str : ''; ?></p>
</body>
</html>
