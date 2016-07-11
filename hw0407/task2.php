<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 06.07.2016
 * Time: 2:07
 */
$pattern = '/\d{4}-\d{2}-\d{2}/';
if (isset($_POST['date'])) {
    if (preg_match($pattern, $_POST['date'], $match)) {
        $currentTime = new DateTime();
        $ageDate = DateTime::createFromFormat('Y-m-d', $match[0]);
        $interval = $ageDate->diff($currentTime);
        $result = $interval->format('%y');

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
<form action="" method="post">
    <label for="date">Enter Birth Date:</label>
    <input type="text" name="date" placeholder="YYYY-MM-DD">
    <input type="submit">
</form>
<h4><?php if (isset($result)) {
        if ($interval->format('%y') >= 18) {
            echo "Дата рождения: " . $ageDate->format("Y-m-d");
        } else {
            echo "Возраст меньше 18 лет";
        }
    } else {
        echo "Неверный формат даты";
    }
    ?></h4>
</body>
</html>
