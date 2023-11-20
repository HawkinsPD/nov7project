<?php
require_once "autoload.php";

$con = new Connection();
$pdo = $con->connect();

function echoCurrency()
{
    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    if ($uri === '/') {
        $homePage = new HomePage();
        return $homePage->route();
    }elseif ($uri === '/save') { //html save form
        $saveImg = new SaveImg();
        return $saveImg->route();
    }elseif ($uri === '/getImages' && isset($_GET['userId'])) {
        $getImg = new GetImg();
        return $getImg->route();
    }elseif ($uri === '/get-data') {
        $getData = new GetData();
        return $getData->getData();
    }elseif ($uri === '/saveMe') { //file save
        $saveMe = new SaveMe();
        return $saveMe->saveMe();
    }
}

echo echoCurrency();

//$bravo = pg_connect("host=postgres port=5432 dbname=postgres password=root user=root");
//
//if ($pdo) {
//    echo 'bravo';
//}
//
//$employee = $pdo->query("SELECT * FROM employee")->fetchAll();
//print_r($employee);
//

$images = "CREATE TABLE IF NOT EXISTS images (
        id SERIAL,
        url VARCHAR (2048)
        )";
$pdo->exec($images);


//$url = 'honeymoon';
//$insert = "INSERT INTO images (url) VALUES (?)";
//
//$stmt = $pdo->prepare($insert);
//$stmt->execute([$url]);


?>

