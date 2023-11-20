<?php

class GetData
{
    public function getData()
    {
        if ($_GET['userId'] === '01') {
            $imgArr = ['Taylor_Swift_-_Evermore.png'];
            return json_encode($imgArr);
        }elseif ($_GET['userId'] === '02') {
            $imgArr = ['Taylor_Swift_-_Red.png'];
            return json_encode($imgArr);
        }
    }
}