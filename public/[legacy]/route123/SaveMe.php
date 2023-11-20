<?php

class SaveMe
{
    public function saveMe()
    {
        $url = $_GET['saveMe'];
        $fileName =  basename($url);
        file_put_contents($fileName, file_get_contents($url));

//        $images = "CREATE TABLE IF NOT EXISTS images (
//        id SERIAL PRIMARY KEY,
//        url VARCHAR(2048)
//        )";
//        foreach ($images as $image) {
//            $pdo->exec($images);
//        }
//        $imagesInsert = "INSERT INTO images (url) VALUE ($url)";
//        $pdo->prepare($sql)->execute($data);

        return json_encode($url);
    }
}