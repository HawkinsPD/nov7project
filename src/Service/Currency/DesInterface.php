<?php

namespace App\Service\Currency;

interface DesInterface
{
    public function deserialize(string $data, string $valute): string;
}