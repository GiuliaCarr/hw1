<?php

require_once 'auth.php';
if (!$userid = checkAuth())
    exit;

header('Content-Type: application/json');

$conn = mysqli_connect($dbname['host'], $dbname['user'], $dbname['password'], $dbname['name']);

$userid = mysqli_real_escape_string($conn, $userid);


$query = "SELECT user AS userid, propic AS propic from profile where user = $userid";

$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

$profileArray = array();
while ($entry = mysqli_fetch_assoc($res)) {
    
    $profileArray[] = array(
        'userid' => $entry['userid'],
        'propic' => $entry['propic']
       
    );
}
echo json_encode($profileArray);

exit;


?>