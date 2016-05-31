<pre>
	<?php 
		echo 'Hello Word!'; 
		?>
</pre>



<h1>This is an <?php # echo 'simple';?> example </h1>
<p>The header above will say 'This is an  example'.</p>

<?php 
$str = <<<EOD
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis, eum modi itaque odio quasi molestiae voluptate magnam atque neque pariatur eius eaque explicabo autem possimus, repellendus sit cum fugit alias! <br>
Ipsum neque, vel repellendus ex exercitationem earum ipsa sed odio fugiat! Modi sit, ratione, blanditiis assumenda fugit ipsa ab officia tenetur consequatur autem nostrum iure dicta fugiat deleniti placeat laboriosam.<br>
Unde dolores reprehenderit suscipit facere, quos voluptates culpa consequatur nostrum atque illo, natus incidunt sed! Sit nihil eveniet quod vel officiis provident. Eos molestias aspernatur maiores magnam, aliquam obcaecati itaque!<br>
EOD;

echo $str;
?>
<?php 
 echo 'TOO'.'TOO'.'TOO'."</br>";
 echo 'TOO'.PHP_EOL.'TOO'.PHP_EOL.'TOO';
 echo "<pre>".'TOO'.PHP_EOL.'TOO'.PHP_EOL.'TOO'."</pre>";
 ?>

<?php
// Показываем все ошибки
error_reporting(E_ALL);

class beers {
    const softdrink = 'rootbeer';
    public static $ale = 'ipa';
}

$rootbeer = 'A & W';
$ipa = 'Alexander Keith\'s';

// Это работает, выводит: Я бы хотел A & W
echo "Я бы хотел {${beers::softdrink}}\n";

// Это тоже работает, выводит: Я бы хотел Alexander Keith's
echo "Я бы хотел {${beers::$ale}}\n";
?>