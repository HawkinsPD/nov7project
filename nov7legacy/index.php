<?php
require_once "autoload.php";

echo "test";


$dollar = new Dollar(
    [
        'https://www.cbr-xml-daily.ru/daily_json.js',
        new DesJSON(),
        'https://www.cbr-xml-daily.ru/daily_utf8.xml',
        new DesXML()
    ],
    'USD'
);
echo $dollar->write();