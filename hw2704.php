<?php

header('Content-Type: text/html; charset=utf-8');

//1. Оформить функцию для вычисления выражения
echo '<h3>1. Оформить функцию для вычисления выражения</h3>';
function formulaResolve($x, $t, $s) {
    $result = (pow($x, 2) + pow(1 - pow($x, 2), 1/$t)) / exp(sin($x) + $s);
    return $result;
}

echo formulaResolve(0.5, 3, 1) . '<br>';
echo formulaResolve(1, 3, 1) . '<br>';

//2. Исключить из строки группы символов, расположенные между символами «/*», «*/» включая границы.
echo '<h3>2. Исключить из строки группы символов, расположенные между символами «/*», «*/» включая границы.</h3>';
function removeBetween($content, $start, $end) {
    $startPos = mb_strpos($content, $start);
    $endPos = mb_strpos($content, $end);
    if (!is_bool($startPos) && !is_bool($endPos) && $startPos < $endPos ) {
        $content = mb_substr($content, 0, $startPos) . mb_substr($content, $endPos + mb_strlen($endPos, 'UTF-8'));
        return removeBetween($content, $start, $end);
    }
    else {
        return $content  . '<br>';
    }
}
echo removeBetween('Исключить расположенные между символами «/*» расположенные«*/» включая границы', '/*', '*/');
echo removeBetween('Исключить/*» расположенные« расположенные*/  **** между символами «/*» расположенные«*/» включая границы.', '/*', '*/');
echo removeBetween('Исключить расположенные« расположенные*/  **** между символами «/*» расположенные» включая границы.', '/*', '*/');

//3. Дана строка, содержащая полное имя файла (например, 'D:\WebServers\home\testsite\www\myfile.txt'). Выделите из этой строки имя файла без расширения.
echo '<h3>2. Дана строка, содержащая полное имя файла (например, \'D:\WebServers\home\testsite\www\myfile.txt\'). Выделите из этой строки имя файла без расширения.</h3>';

function getFileName($path) {
    $dotSymbol = strrpos($path, '.');
    $slashSymbol = strrpos($path, '\\');
    if ($dotSymbol < $slashSymbol || is_bool($dotSymbol) || is_bool($slashSymbol) ) {
        echo 'Incorrect path <br>';
    }
    else {
        echo substr($path, $slashSymbol + 1, -(strlen($path) - $dotSymbol)) . '<br>';
    }
}
getFileName('D:\WebServers\home\testsite\www\myfile.txt');
getFileName('myfile.txt');
getFileName('d:\YandexDisk\ALIB\RU\bsload-all.txt');
getFileName('d:\YandexDisk\ALIB\RU\bsload-all');

//4. Дана строка. Если ее длина больше 10, то оставить в строке только первые 6 символов, иначе дополнить строку символами 'o' до длины 12.
echo '<h3>4. Дана строка. Если ее длина больше 10, то оставить в строке только первые 6 символов, иначе дополнить строку символами "o" до длины 12.</h3>';
function stringComplete($strToComplete) {
    if (mb_strlen($strToComplete, 'UTF-8') > 10) {
        $strToComplete = mb_substr($strToComplete, 0, 6, 'UTF-8');
    }
    else {
        while(mb_strlen($strToComplete, 'UTF-8') < 12) {
            $strToComplete .= 'o';
        }
    }
    return $strToComplete;
}
echo stringComplete('Дана строка. Если ее длина больше 10') . '<br>';
echo stringComplete('Дана') . '<br>';


//5. Удалите в строке все буквы 'x', за которыми следует 'abc'.
echo '<h3>5.Удалите в строке все буквы "x", за которыми следует "abc".</h3>';

function removeX($strXremove) {
    return str_replace('xabc', 'abc', $strXremove);
}
echo removeX('111xabc222abc333xabcabc') . '<br>';
echo removeX('ааааxabcббббxabcшшшшxabcabc') . '<br>';


//6. Дана строка. Преобразовать все символы кроме первого в нижний регистр.
echo '<h3>6. Дана строка. Преобразовать все символы кроме первого в нижний регистр.</h3>';

function strLower($stringFirstCap) {
    $firstChar = mb_substr($stringFirstCap, 0, 1, 'UTF-8');
    $restString = mb_substr($stringFirstCap, 1, mb_strlen($stringFirstCap), 'UTF-8');
    $resultstring = $firstChar . mb_strtolower($restString, 'UTF-8');

    return  $resultstring;
}
echo strLower('Дана строка. Преобразовать все символы кроме первого в нижний регистр.') . '<br>';
echo strLower('ДАна строка. ПРЕОБРАЗОВАТЬ все символы кроме первого в нижний регистр.') . '<br>';

//7. Пользователь вводит email. Осуществить проверку на корректность (длина больше восьми, присутствует символ , после которого присутствует символ '.', между этими двумя символами есть хотя бы две буквы, оканчивается на 'ru', 'com', 'net' или 'by', символ '_' может встречаться только один раз, до символа могут быть только цифры, буквы и символ '_').
echo '<h3>7. Пользователь вводит email. Осуществить проверку на корректность (длина больше восьми, присутствует символ , после которого присутствует символ '.', между этими двумя символами есть хотя бы две буквы, оканчивается на "ru", "com", "net" или "by", символ "_" может встречаться только один раз, до символа могут быть только цифры, буквы и символ "_").</h3>';

function emailIsValid($emailstring)
{
    $errormessage = ' is not valid <br>';
    $successmessage = ' is valid! Good to use! <br>';
    if (checkLength($emailstring) && checkSlash($emailstring) && checkDomain($emailstring) && chekLogin($emailstring)) {
        return 'E-mail ' . $emailstring . $successmessage;
    } else {
        return 'E-mail ' . $emailstring . $errormessage;
    }
}

function checkLength($emailstring)
{
    return strlen($emailstring) > 8;
}

function dogCheck($emailstring)
{
    if (substr_count($emailstring, '@') != 1) {
        return false;
    } else {
        return strpos($emailstring, '@');
    }
}

function checkDot($emailstring)
{
    $dog = dogCheck($emailstring);
    $dot = strrpos($emailstring, '.');
    if (!is_bool($dot) && !is_bool($dog) && ($dot - $dog) > 2) {
        return $dot;
    } else {
        return false;
    }
}

function checkSlash($emailstring)
{
    if (substr_count($emailstring, '_') > 1) {
        return false;
    } else {
        return true;
    }
}

function checkDomain($emailstring)
{
    $validDomains = ['ru', 'com', 'net', 'by'];
    $dot = checkDot($emailstring);
    $currentDomain = substr($emailstring, $dot + 1);
    return in_array($currentDomain, $validDomains);
}

function chekLogin($emailstring)
{
    $symbolArray = array_merge(range('a', 'z'), range(0, 9), ['_']);
    $dog = dogCheck($emailstring);
    $logString = substr($emailstring, 0, $dog);
    $logArray = str_split(strtolower($logString));
    $noValidSymbols = array_diff($logArray, $symbolArray);
    return count($noValidSymbols) == 0;
}

echo emailIsValid('che!ck@this.com');
echo emailIsValid('Chec1k@this.com');
echo emailIsValid('checkthis.com');
echo emailIsValid('check@thiscom');
echo emailIsValid('check@s.com');
echo emailIsValid('check@this.com');
echo emailIsValid('ch_eck@this.com');
echo emailIsValid('ch__eck@this.by');