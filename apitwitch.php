<?php


require_once 'auth.php';


if (!checkAuth()) exit;


header('Content-Type: application/json');

Twitch();


function Twitch()
{
    $client_id = 'tsu6j0knufg9r6719kdynytyae1sob';
    $client_secret = '4e3132z7ln3ktlvgd2ka2zmj5v9ugf';

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://id.twitch.tv/oauth2/token');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($curl, CURLOPT_POST, 1);

    curl_setopt($curl, CURLOPT_POSTFIELDS, 'client_id=tsu6j0knufg9r6719kdynytyae1sob&client_secret=4e3132z7ln3ktlvgd2ka2zmj5v9ugf&grant_type=client_credentials'); 
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/x-www-form-urlencoded')); 
    $token=json_decode(curl_exec($curl), true);
    curl_close($curl);    



    
   
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://api.twitch.tv/helix/streams?&game_id=513181&type=live');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token['access_token'],'Client-Id: tsu6j0knufg9r6719kdynytyae1sob')); 
    $res=curl_exec($curl);
    curl_close($curl);

    echo $res;

}





?>