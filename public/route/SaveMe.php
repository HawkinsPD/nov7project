<?php

class SaveMe
{
    public function saveMe()
    {
        $url = $_GET['saveMe'];
        $fileName =  basename($url);
        file_put_contents($fileName, file_get_contents($url));

        $imagesClass = new ImagesDatabaseService();
        $createTable = $imagesClass->createImage();
        $insertData = $imagesClass->insertData($url);

        return json_encode($url);
    }

}