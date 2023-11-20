<?php
//$json_file = file_get_contents("test.json");
//$json_decode = json_decode($json_file, true);
//
//function ave($json_decode) {
//    foreach($json_decode as $keyTag => $itemArray) {
////            echo $keyTag, "<br>";
//        $s .= "<$keyTag ";
//        $style = $itemArray['style'];
//        echo $style;
//        foreach($itemArray as $keyKey => $keyValue) {
////            echo $keyKey . ' '. $keyValue, "<br>";
//        }
//        $s .= "$keyKey=" . "'$keyValue'>" ;
//        foreach($itemArray as $keyKey => $keyValue) {
//            $s .= $keyValue . "</$keyTag> </n>";
//            break;
//        }
//    }
//    return $s;
//}
//
//echo ave($json_decode);
//
//?>
<!---->
<!---->
<?php
////
////echo "
////<h1 style='margin-bottom: 1rem'>title</h1>
////<div style='color: red'>main content</div>
////";
//
//// -> /Users/roughty/php/docker docker-compose up -d
//// docker-compose down
//// docker ps


//include "Item.php";

require_once "autoload.php";

//$jsonFile = file_get_contents("test.json");
//$jsonDecode = json_decode($jsonFile, true);
//
///** @var array<Item> $objArr */
//$objArr = [];
//
//function clObj($jsonDecode): void
//{
//    foreach ($jsonDecode as $keyTag0 => $itemArray) {
//        if (array_key_exists('text', $itemArray)) {
//            $keyTag = $keyTag0;
//            $style = $itemArray['style'];
//            $text = $itemArray['text'];
//            $element = new Item();
//
//            $element
//                ->setTag($keyTag)
//                ->setText($text)
//                ->setStyle($style);
//
//            $objArr[] = $element;
//            echo $element->keyTag;
//        }
//    }
//}
//
//clObj($jsonDecode);
//
///**
// * @param array<array<string, string>> $jsonDecode
// */function ave(array $jsonDecode): ?string
//{
//    foreach ($jsonDecode as $keyTag => $itemArray) {
//        $style = $itemArray['style'];
//        $text = $itemArray['text'];
//        $string .= "< $keyTag style='$style'>$text<$keyTag ></n>";
//    }
//    return $string;
//}
//
//echo ave($objArr);
$json = file_get_contents("https://www.cbr-xml-daily.ru/daily_json.js");
$jsObj = json_decode($json, true);
print_r ($jsObj['Valute']['USD']["Value"]);

//foreach($jsObj as $key => $value){
//    print_r ($value['USD']);
//}

$xml = simplexml_load_string(file_get_contents('https://www.cbr-xml-daily.ru/daily_utf8.xml'));
$xmlJsonEncode = json_encode($xml);
$xmlJsonDecode = json_decode($xmlJsonEncode, true);
//print_r ($xmlJsonDecode['Valute']);
foreach ($xmlJsonDecode as $key) {
    for ($i = 0; $i <= count($key); $i++)
        if ($key[$i]['CharCode'] == 'USD') {
            echo($key[$i]['Value']);
        }
}
//    if (($value[$key]['CharCode']) == 'USD') {
//        print_r ($value['Value']);
//    }
    //print_r ($value[3]);


//$result = [];
//foreach ($xmlJsonDecode as $key => $value){
//    $result .= $value['Value'];
//}

// $writer = new HtmlWriter("test.json", new Dis());
 $writer = new HtmlWriter("test1.json", new AnotherDeserializer());
 echo $writer->write();


// $xml = file("https://www.cbr-xml-daily.ru/daily_utf8.xml");
// $xmlObj = xml_parse($xml);
//
//foreach ($jsObj as $key => $value) {
//    $result = '';
//    if ($key == "Date") {
//        $result .= $value;
//    }
//    elseif ($key == "Valute") {
//        foreach ($jsObj as $key1 => $value1) {
//            if ($jsObj == "AUD") {
//                $result .= $jsObj;
//            }
//        }
//    }
//}
$dollarJSon = new Dollar("https://www.cbr-xml-daily.ru/daily_json.js", new DeserializerJSonDollar(), 'USD');
echo $dollarJSon->write();

$dollarXML = new Dollar("https://www.cbr-xml-daily.ru/daily_utf8.xml", new DeserializerXMLDollar(), 'USD');
echo $dollarXML->write();

//"<script> const interval = setInterval() {
//    alert
//}</script>";

//function ave(array $jsonDecode): ?string
//{
//    foreach ($jsonDecode as $keyTag => $itemArray) {
//        if (array_key_exists('text', $itemArray)) {
//
//            $string .= "<$keyTag style='$style'>$text<$keyTag></n>";
//        }
//    }
//    return $string;
//}
//
//echo ave();