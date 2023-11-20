<?php

class DeserializerJSonDollar implements DesInterface
{
    public function des(string $dataString, string $valute): string
    {
        $dataContents = file_get_contents($dataString);
        $jsonDecoded = json_decode($dataContents, true);
        return $jsonDecoded['Valute'][$valute]["Value"];
    }
}