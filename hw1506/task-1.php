<?php
header('Content-Type: text/html; charset=windows-1251');
set_time_limit(0);

function imgUpload($path)
{
    $types = ['image/gif' => 'gif', 'image/jpeg' => 'jpg', 'image/png' => 'png'];
    $imgInfo = getimagesize($path);
    $file = file_get_contents($path);
    if ($imgInfo && array_key_exists($imgInfo['mime'], $types)) {
        $imageName = 'img_' . time() . '.' . $types[$imgInfo['mime']];
        if (file_put_contents('img/' . $imageName, $file)) {
            return $imageName;
        }
    } else {
        return false;
    }
}

$serials = file_get_contents("http://www.lostfilm.tv/serials.php");
$serials = mb_convert_encoding($serials, "utf-8", "windows-1251");
$serialsResult = [];
$matches = [];
$pattern = '/<a href="\/browse.php\?cat=(\d+)" class="bb_a">(.+)<br><span>\((.+)\)<\/span><\/a>/';
$patternImg = '/<img src="(\/Static\/posters\/poster.*\.(jpg|jpeg|png|gif))".+?>/';
$patternDescription = '/<span>(.{200,})?(<br>|<\/span>)/';

if (preg_match_all($pattern, $serials, $matches, PREG_SET_ORDER)) {
    foreach ($matches as $match) {
        sleep(1);
        if ($serial = file_get_contents("http://www.lostfilm.tv/browse.php?cat=" . $match[1])) {
            $serial = mb_convert_encoding($serial, "utf-8", "windows-1251");

            if (preg_match($patternImg, $serial, $serialMatch)) {
                $img = imgUpload('http://www.lostfilm.tv' . $serialMatch[1]);
            }
            if (preg_match($patternDescription, $serial, $serialMatch)) {
                $description = $serialMatch[1];
            }
            $serialsResult[] = ['id' => $match[1],
                'name' => $match[2],
                'nameEnglish' => $match[3],
                'image' => $img,
                'description' => $description];
        }
    }
    $jsonResult = json_encode($serialsResult);
    file_put_contents(__DIR__ . '/serials.json', $jsonResult);
}