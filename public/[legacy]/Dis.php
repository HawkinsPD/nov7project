<?php

class Dis implements DeserializerInterface
{
    /**
     * @return array<Item>
     */
    public function dis(array $getContent): array
    {
        $arrayOfObj = [];
        $arrayOfArrays = $getContent;
        foreach ($arrayOfArrays as $tag => $itemArray) {
            $element = new Item();
            $element
                ->setTag($tag)
                ->setText($itemArray["text"])
                ->setStyle($itemArray["style"]);
            $arrayOfObj[] = $element;
        }
        return $arrayOfObj;
    }
}