<?php


require_once 'auth.php';


if (!checkAuth()) exit;


header('Content-Type: application/json');

Characters();


function Characters()
{
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://api.genshin.dev/characters/all");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);


echo $result;

}





?>