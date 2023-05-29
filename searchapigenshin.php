<?php


require_once 'auth.php';


if (!checkAuth()) exit;


header('Content-Type: application/json');

Characters();


function Characters()
{
    $query = urlencode($_GET["character"]);
    $url =  'https://api.genshin.dev/characters/'.$query;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);


echo $result;

}





?>