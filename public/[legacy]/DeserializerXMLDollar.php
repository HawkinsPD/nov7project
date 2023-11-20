<?php

class DeserializerXMLDollar implements DesInterface
{
    public function des(string $dataString, string $valute): string
    {
        $xml = simplexml_load_string(file_get_contents($dataString));
        $xmlJsonEncode = json_encode($xml);
        $xmlJsonDecode = json_decode($xmlJsonEncode, true);
        $result = '';
        foreach ($xmlJsonDecode as $key) {
            for ($i = 0; $i <= count($key); $i++)
                if ($key[$i]['CharCode'] == $valute) {
                    $result = ($key[$i]['Value']);
                }
        }
        return $result;
    }
}