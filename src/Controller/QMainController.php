<?php

namespace App\Controller;

use App\Controller\DirOne\DirTwo\SomeClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class QMainController extends AbstractController
{
    public function __construct()
    {
        $con = new SomeClass();
    }
}