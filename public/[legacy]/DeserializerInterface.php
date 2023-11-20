<?php

interface DeserializerInterface
{
    /**
     * @param array<string> $getContent
     * @return array<Item>
     */
    public function dis(array $getContent): array;
}