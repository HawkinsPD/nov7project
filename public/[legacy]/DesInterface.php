<?php

interface DesInterface
{
    /**
     * @param string $dataString
     * @param $valute
     * @return string
     */
    public function des(string $dataString, string $valute): string;

//    public function getName(): string;
}