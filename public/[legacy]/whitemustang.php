<?php
include "item.php";
$jsonFile = file_get_contents("test.json");
$jsonDecode = json_decode($jsonFile, true);

function ave(array $jsonDecode): ?string
{
    foreach ($jsonDecode as $keyTag => $itemArray) {
        if (array_key_exists('text', $itemArray)) {
            $style = $itemArray['style'];
            $text = $itemArray['text'];
            $string .= "<$keyTag style='$style'>$text<$keyTag></n>";
        }
    }
    return $string;
}

echo ave($jsonDecode);
?>
