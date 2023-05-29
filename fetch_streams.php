<?php

require_once 'auth.php';
if (!$userid = checkAuth())
    exit;

header('Content-Type: application/json');

$conn = mysqli_connect($dbname['host'], $dbname['user'], $dbname['password'], $dbname['name']);

$userid = mysqli_real_escape_string($conn, $userid);





$query = "SELECT user AS userid, name AS name, content AS content from streams where user = $userid";

$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

$streamsArray = array();
while ($entry = mysqli_fetch_assoc($res)) {
    
    $streamsArray[] = array(
        'userid' => $entry['userid'],
        'name' => $entry['name'],
        'content' => json_decode($entry['content'])
    );
}
echo json_encode($streamsArray);

exit;


?>