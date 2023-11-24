<?php

namespace App\Controller;


use App\Service\Currency\Dollar;
use App\Service\Currency\DesJSON;
use App\Service\Currency\DesXML;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CurrencyController extends AbstractController
{
    #[Route('/currency/{cur}', name: 'currency')]
    public function currency($cur): Response
    {
        $dollar = new Dollar(
            [
                'https://www.cbr-xml-daily.ru/daily_json.js',
                new DesJSON(),
                'https://www.cbr-xml-daily.ru/daily_utf8.xml',
                new DesXML()
            ],
            "$cur"
        );
    return new Response($dollar->write());
    }
}