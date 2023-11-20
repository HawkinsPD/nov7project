<?php

//function getImg()
//{
//    $imagesArray = [
//        'red' => 'Taylor_Swift_-_Red.png',
//        'evermore' => 'Taylor_Swift_-_Evermore.png',
//        'midnights' => 'Taylor_Swift_—_Midnights.png'
//    ];
//    return <<<HTML
//    <script type="text/javascript" src="functions.js"></script>
//
//    <script>
//        getImg();
//        //inside /getImages   imagesArray foreach[imagesArray create html anchor]
//        //addAnchorArray($imagesArray);
//    </script>
//
//HTML;
//}
//
//echo getImg();

class GetImg implements RouteInterface
{
    public function route(): string
    {
        if (isset($_GET['userId'])) {
            return <<<HTML
            <script type="text/javascript" src="functions.js"></script>
         
            <script>
                getImg();
            </script>
HTML;
        }else {
            echo 'enter userId';
        }
    }
}