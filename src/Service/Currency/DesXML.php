<?php

namespace App\Service\Currency;

class DesXML implements DesInterface
{
    public function deserialize(string $data, string $valute): string
    {
        // TODO: Implement deserialize() method.
        $xml = simplexml_load_string(file_get_contents($data));
        $xmlEncode = json_encode($xml);
        $xmlDecode = json_decode($xmlEncode, true);
        $result = '';
        foreach ($xmlDecode as $key) {
                for ($i = 0; $i <= count($key); $i++)
                    if (isset($key[$i])) {
                        if ($key[$i]['CharCode'] == $valute) {
                            $result = ($key[$i]['Value']);
                        }
                    }
        }
        return json_encode($result);
    }
}