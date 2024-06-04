<?php
    session_start();
    if(!isset($_SESSION["email"])){
        header("Location: login.php");
        exit;
    }

cibo();

function cibo() {

    $cibo = '13769a71a84741faaa9b0930614f1490';
    $query = urlencode($_GET["q"]);
    $url = 'https://api.spoonacular.com/recipes/complexSearch?apiKey='.$cibo.'&query='.$query.'&number=10';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $res=curl_exec($ch);
    curl_close($ch);
    echo $res;
}
?>