<?php
require_once 'auth.php';
if (!$userid = checkAuth())
    exit;


Changes();
function Changes()
{
    global $dbname, $userid;

    $conn = mysqli_connect($dbname['host'], $dbname['user'], $dbname['password'], $dbname['name']);


    $userid = mysqli_real_escape_string($conn, $userid);
    $propic = mysqli_real_escape_string($conn, $_POST['propic']);

    
    $query = "SELECT * FROM profile WHERE user = '$userid'";
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
  
    if (mysqli_num_rows($res) > 0) {
        $query = "DELETE propic  FROM profile as propic WHERE user = '$userid'";
        $res1 = mysqli_query($conn, $query) or die(mysqli_error($conn));
    }
   
    $query = "INSERT INTO profile ( user,propic) VALUES('$userid','$propic')";
    error_log($query);
    
    if (mysqli_query($conn, $query) or die(mysqli_error($conn))) {
        echo json_encode(array('ok' => true));
        exit;
    }

    mysqli_close($conn);
    echo json_encode(array('ok' => false));
}
?>