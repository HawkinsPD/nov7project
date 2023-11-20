<?php
class ImagesDatabaseService
{
    public $con;
    public function createImage()
    {
        $images = "CREATE TABLE IF NOT EXISTS images (
            id SERIAL,
            url VARCHAR (2048)
            )";
        $this->pdo->exec($images);
    }
    public function insertData($url)
    {
        $insert = "INSERT INTO images (url) VALUES (?)";
        $stmt = $this->pdo->prepare($insert);
        $stmt->execute([$url]);
    }
    public function selectData($id)
    {
        $select = "SELECT url FROM images WHERE id = $id";
        $stmt = $this->pdo->query($select);
        $res = $stmt->fetchAll();
        return $res;
    }
     public function __construct()
    {
        if ($con){
            return $con;
        }else {
            $this->con = new Connection;
            $this->pdo = $this->con->connect();
        }
    }
}// symfony
// composer
// mkdir name