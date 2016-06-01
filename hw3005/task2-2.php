<?php


if (isset($_COOKIE['name'])) {
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

<a href="task2-1.php">Next page</a>
</body>
</html>
