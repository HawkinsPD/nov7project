<?php

class DesJSON implements DesInterface
{
    public function deserialize(string $data, string $valute): string
    {
        // TODO: Implement deserialize() method.
        $dataContent = file_get_contents($data);
        $jsonDecode = json_decode($dataContent, true);
        return $jsonDecode['Valute'][$valute]['Value'];
    }
}