<?php

namespace App\Controller;

use App\Service\ImageDatabaseService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\BinaryFileResponse;



class MainController extends AbstractController
{
    public function __construct(private ImageDatabaseService $service)
    {
    }

    #[Route('/homepage', name: 'home_page')]
    public function homePage(): Response
    {
        return new Response(
            <<<HTML
    <a href="/save">Save Images</a> <br>
    <a href="/getImages">Get Images</a>
HTML
        );
    }
    #[Route('/save', name: 'save')]
    public function save(): Response
    {
        return new Response(
            <<<HTML
    <script type="text/javascript" src="functions.js"></script>
    
    <form id="reset-me">
        enter url: <input id="url-input" type="text" name="Currency">
        <input onclick="saveImg(); resetForm('reset-me')" id="btn" type="button" value="save echo">
    </form>
HTML
        );
    }
    #[Route('/getImages', name: 'get_images')]
    public function getImages(Request $request): Response
    {
        if (isset($request->get['userId'])) {
            return new Response(
                'qwe'
            );
        } else {
            return new Response(
                'else'
            );
        }
    }
    #[Route('/get-data', name: 'get_data')]
    public function getData(): Response
    {
        return new Response($this->service->test());
//        $getDataClass = new ImageDatabaseServise();
//        return $getDataClass->selectData($_GET['userId']);
    }
}




//class MainController
//{
//    public function number()
//    {
//        $homePage = new HomePage();
//        return $homePage->route();
//    }
//}