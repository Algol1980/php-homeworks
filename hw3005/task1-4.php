<?php
session_start();
$currentPage = basename(__FILE__);
if (!isset($_SESSION['pages'])) {
    $_SESSION['pages'] = [];
    $_SESSION['pages'][] = $currentPage;
} elseif (!in_array($currentPage, $_SESSION['pages'])) {
    $_SESSION['pages'][] = $currentPage;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<a href="task1-1.php">Next Page</a>
<ul>
<?php foreach ($_SESSION['pages'] as $value ) { ?>
 <li><?php echo $value; ?></li>
    <?php }?>
</ul>
</body>
</html>
