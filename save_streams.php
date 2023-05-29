<?php
require_once 'auth.php';
if (!$userid = checkAuth())
    exit;


Streams();
function Streams()
{
    global $dbname, $userid;

    $conn = mysqli_connect($dbname['host'], $dbname['user'], $dbname['password'], $dbname['name']);


    $userid = mysqli_real_escape_string($conn, $userid);
    $thumbnail_url = mysqli_real_escape_string($conn, $_POST['thumbnail_url']);
    $user_login = mysqli_real_escape_string($conn, $_POST['user_login']);
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $language = mysqli_real_escape_string($conn, $_POST['language']);

  
    $query = "SELECT * FROM streams WHERE user = '$userid' AND name = '$user_login'";
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
  
    if (mysqli_num_rows($res) > 0) {
        echo json_encode(array('ok' => true));
        exit;
    }
   
    $query = "INSERT INTO streams (name, user, content) VALUES('$user_login','$userid', JSON_OBJECT('user_login', '$user_login', 'thumbnail_url', '$thumbnail_url', 'user_name', '$user_name', 'title', '$title', 'language', '$language'))";
    error_log($query);

    if (mysqli_query($conn, $query) or die(mysqli_error($conn))) {
        echo json_encode(array('ok' => true));
        exit;
    }

    mysqli_close($conn);
    echo json_encode(array('ok' => false));
}
?>