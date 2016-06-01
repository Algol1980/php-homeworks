<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 01.06.2016
 * Time: 17:16
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

if (isset($_POST['exit'])) {
    setcookie('user', '', time()-1);

}

$required = ['login', 'email', 'pass'];

if (count($_POST) > 0 && isset($_POST['newuser'])) {
    foreach ($required as $value) {
        if (!isset($value, $_POST) || empty($_POST[$value])) {
            $errorArray[] = 'Incorrect ' . $value;
        }
    }
    if (isset($errorArray)) {
        $errorMessage = listErrors($errorArray);
    }
    else {
        $cookieHash = md5($_POST['login'] . $_POST['email'] . $_POST['pass']);
        setcookie('user', $cookieHash);
    }

}

if (isset($_COOKIE['user'])) {
    $exit = '<input type="submit" name="exit" value="Выход">';
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
    <label for="login">Login:</label>
    <input type="text" name="login" >
    <label for="email">E-mail:</label>
    <input type="text" name="email" >
    <label for="pass">Password</label>
    <input type="text" name="pass" >
    <input type="submit" name="newuser">
    <?php echo (isset($exit)) ? $exit : ''; ?>
</form>
<?php echo (isset($errorMessage)) ? $errorMessage : ''; ?>
</body>
<style>
    label, input {
        display: block;
        margin: 10px;
    }
</style>
</html>
