<?php
/**
 * Created by PhpStorm.
 * User: Алексей
 * Date: 17.05.2016
 * Time: 13:54
 */
$rows = 0;
$wordsPerPage = 20;

$file = fopen('words.csv', 'r');
if ($file) {
    while ($line = fgetcsv($file) != false) {
        $rows++;
    }
}
fclose($file);

if (isset($_GET['value']) && is_numeric($_GET['value']) && $_GET['value'] > 0) {
    $pageNumber = $_GET['value'];

} else {
    $pageNumber = 1;
}

if ($rows > 0) {
    $totalPages = ceil($rows / $wordsPerPage);
}

function renderTable($wordsPerPage, $pagenumber)
{
    $i = 0;
    $wordListFile = fopen('words.csv', 'r');
    if ($pagenumber > 1) {
        $position = ($pagenumber - 1) * 20;
        while ($position > 0) {
            fgets($wordListFile);
            $position--;
        }
    }
    $resultstring = '';
    $resultstring .= '<table><tr><th><a href="?hide=' .
        (isset($_GET['hide']) && $_GET['hide'] == 'left' ? 'none' : 'left') .
        (isset($_GET['value']) ? '&value=' . $_GET['value'] : '') .
        '">Hide</a></th>
                     <th><a href="?hide=' .
        (isset($_GET['hide']) && $_GET['hide'] == 'right' ? 'none' : 'right') .
        (isset($_GET['value']) ? '&value=' . $_GET['value'] : '') .
        '">Hide</a></th></tr>';
    while (($line = fgetcsv($wordListFile)) !== false && $i < $wordsPerPage) {
        $resultstring .= "<tr><td>" .
            ((isset($_GET['hide']) && $_GET['hide'] == 'left') ? '' : $line[0]) .
            "</td><td>" .
            ((isset($_GET['hide']) && $_GET['hide'] == 'right') ? '' : $line[1]) . "</td></tr>";
        $i++;
    }
    $resultstring .= '</table>';
    fclose($wordListFile);
    return $resultstring;
}


function renderPagination($totalPages, $pageNumber)
{
    $back = '';
    $next = '';
    if ($pageNumber > 1) {
        $back = '<a href="?value=' .
            ($pageNumber - 1) . (isset($_GET['hide']) ? '&hide=' .
                $_GET['hide'] : '') . '">Back</a>';
    }
    if ($pageNumber < $totalPages) {
        $next = '<a href="?value=' .
            ($pageNumber + 1) . (isset($_GET['hide']) ? '&hide=' .
                $_GET['hide'] : '') . '">Next</a>';
    }
    return $back . $next;
}

if (isset($_POST['addWord'])) {
    if (isset($_POST['first']) &&
        isset($_POST['second']) &&
        !empty($_POST['first']) &&
        !empty($_POST['second'])
    ) {
        $wordAddFile = fopen('words.csv', 'a+');
        fputcsv($wordAddFile, [$_POST['first'], $_POST['second']]);
        fclose($wordAddFile);
    } else {

    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h4>Введите слово с переводом</h4>

<form action="" method="post">
    <input type="text" name="first">
    <input type="text" name="second">
    <input type="submit" name="addWord">
</form>

<?php echo renderTable($wordsPerPage, $pageNumber); ?>
<?php echo renderPagination($totalPages, $pageNumber); ?>

<style>
    body {
        font: 1em Tahoma, sans-serif;
    }

    table {
        margin-top: 40px;
        font-size: .8em;
        text-align: center;
        width: 40%;
        border-collapse: collapse;
    }

    th {
        padding: 5px;
        font-size: 1.2em;
    }

    tr:nth-child(even) {
        background-color: rgba(133, 255, 175, .5);
    }

    tr:nth-child(odd) {
        background-color: rgba(133, 255, 175, 1);
    }

    td {
        padding: 3px;
    }

    a {
        display: inline-block;
        padding: 8px 10px;
        color: #ffffff;
        background-color: #0d5cff;
        margin: 5px;
        border-radius: 4px;
        text-decoration: none;
    }
</style>
</body>
</html>