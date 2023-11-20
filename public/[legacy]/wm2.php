<?php
//include "Item.php";

require_once("Item.php");

$jsonFile = file_get_contents("test.json");
$jsonDecode = json_decode($jsonFile, true);

$objArr = [];
function clObj($jsonDecode)
{
    foreach ($jsonDecode as $keyTag0 => $itemArray) {
        if (array_key_exists('text', $itemArray)) {
            $keyTag = $keyTag0;
            $style = $itemArray['style'];
            $text = $itemArray['text'];
            $element = new Item($keyTag, $style, $text);
            $element->keyTag = $keyTag0;
            $element->style = $style;
            $element->text = $text;
            $objArr[] = $element;
            echo $element->keyTag;
        }
    }
    return;
}
clObj($jsonDecode);

function ave(array $jsonDecode): ?string
{
    foreach ($jsonDecode as $keyTag => $itemArray) {
        $style = $itemArray['style'];
        $text = $itemArray['text'];
        $string .= "< $keyTag style='$style'>$text<$keyTag ></n>";
    }
    return $string;
}

echo ave($objArr);

?>