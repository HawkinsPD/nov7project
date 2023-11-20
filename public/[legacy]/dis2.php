<?php

$jsonFile = file_get_contents("test1.json");
$jsonDecode = json_decode($jsonFile, true);

//echo $jsonDecode[2];

function ave(array $jsonDecode): ?string
{
    foreach ($jsonDecode as $itemArray) {
        if (array_key_exists('text', $itemArray)) {
            $tag = $itemArray['tag'];
            $style = $itemArray['style'];
            $text = $itemArray['text'];
            $string .= "<$tag style='$style'>$text<$tag></n>";
        }
    }
    return $string;
}

echo(ave($jsonDecode));