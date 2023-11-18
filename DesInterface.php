<?php

interface DesInterface
{
    public function deserialize(string $data, string $valute): string;
}