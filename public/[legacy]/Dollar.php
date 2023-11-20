<?php

class Dollar
{
    /**
     * @var DeserializerInterface[]
     */
    private array $deserializer;
    public string $valute;
//    public function __construct(string $fileName, DesInterface $deserializer, string $valute)
    public function __construct(array $deserializerArr, string $valute)
    {

        $this->deserializer = $deserializerArr;
        $this->valute = $valute;
    }

//    private function getContent(): string
//    {
//        $dataContents = file_get_contents($this->dataString);
//        return $dataContents;
//    }

    public function write(): string
    {
        $result = [];
        for ($i = 0; $i <= count($this->deserializer)-1; $i+=2) {

            $result[] = $this->deserializer[$i];
            $arrayItem = $this->deserializer[$i+1]->des($this->deserializer[$i], $this->valute);
            $result[] = $arrayItem;
        }

        return json_encode($result, true);
    }

}