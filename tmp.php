<form method="POST">
    <input name="word" type="text" />
    <input name="translate" type="text" />
    <input type="submit" value="Add" />
</form>

<?php

if(
    isset($_POST['word']) &&
    isset($_POST['translate']) &&
    !empty($_POST['word']) &&
    !empty($_POST['translate'])
) {
    $db = fopen("words.db", 'a+');
    fputcsv($db, [
        $_POST['word'], $_POST['translate']
    ]);
    fclose($db);
}

$db = fopen("words.db", "r");

?>

<table width="100%" border="1">
    <thead>
    <tr>
        <th><a href="?hide=<?php echo isset($_GET['hide']) && $_GET['hide'] == 'left' ? 'none' : 'left' ?>">Hide</a></th>
        <th><a href="?hide=<?php echo isset($_GET['hide']) && $_GET['hide'] == 'right' ? 'none' : 'right' ?>">Hide</a></th>
    </tr>
    </thead>
    <tbody>
    <?php

    if(isset($_GET['page']) && $_GET['page'] > 1) {

        for ($i = 0; $i < 20 * $_GET['page']; $i++) {
            fgetcsv($db);
        }
    }

    for($i=0;$i<20 && !feof($db); $i++) {
        $array = fgetcsv($db);
        if(!empty($array)) {
            echo "<tr><td width='50%'>".
                ((isset($_GET['hide']) && $_GET['hide'] == 'left') ? '' : $array[0]).
                "</td><td width='50%'>".
                ((isset($_GET['hide']) && $_GET['hide'] == 'right') ? '' : $array[1]).
                "</td></tr>\n";
        }
    }

    ?>
    </tbody>
</table>