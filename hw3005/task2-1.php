<?php

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    setcookie('name', $name);
}
elseif (isset($_COOKIE['name'])) {
    $name = $_COOKIE['name'];
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php echo isset($name) ? "<h3>Hi {$name}</h3>" : ""; ?>
<form action="" method="post">
    <label for="name">Введите пожалуйста имя:</label>
    <input type="text" name="name">
    <input type="submit">
</form>
<a href="task2-2.php">Next page</a>
</body>
</html>
