<?php 
    
    require_once 'dbname.php';


    header('Content-Type: application/json');
    
    $conn = mysqli_connect($dbname['host'], $dbname['user'], $dbname['password'], $dbname['name']);

    $username = mysqli_real_escape_string($conn, $_GET["q"]);

    $query = "SELECT username FROM users
                WHERE username = '$username'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));

    mysqli_close($conn);
?>