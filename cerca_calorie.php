<?php
    session_start();
    if(!isset($_SESSION["email"])){
        header("Location: login.php");
        exit;
    }

cibo();

function cibo() {

    $accessKey = 'ffaaf8c1f93b8a78165bdfb1bfff0423';
    $accessid = "737c9897";
    $alimento_input = urlencode($_GET["q"]);
    $url = 'https://api.edamam.com/api/nutrition-data?' . 'app_id=' . $accessid . '&app_key=' . $accessKey . '&ingr=' . $alimento_input;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $res=curl_exec($ch);
    curl_close($ch);
    echo $res;
}
?>