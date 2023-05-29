<?php
require_once 'auth.php';
if (!$userid = checkAuth())
    exit;


Characters();
function Characters()
{
    global $dbname, $userid;

    $conn = mysqli_connect($dbname['host'], $dbname['user'], $dbname['password'], $dbname['name']);


    $userid = mysqli_real_escape_string($conn, $userid);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $vision = mysqli_real_escape_string($conn, $_POST['vision']);
    $nation = mysqli_real_escape_string($conn, $_POST['nation']);
    $birthday = mysqli_real_escape_string($conn, $_POST['birthday']);
    $affiliation = mysqli_real_escape_string($conn, $_POST['affiliation']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $weapon = mysqli_real_escape_string($conn, $_POST['weapon']);
    $card = mysqli_real_escape_string($conn, $_POST['card']);

   
    $query = "SELECT * FROM characters WHERE user = '$userid' AND name = '$name'";
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
   

    if (mysqli_num_rows($res) < 0) {
        echo json_encode(array('ok' => true));
        exit;
    }
   
    $query = "DELETE user FROM characters as user WHERE user = '$userid' AND name = '$name'" ;
    error_log($query);
   
    if (mysqli_query($conn, $query) or die(mysqli_error($conn))) {
        echo json_encode(array('ok' => true));
        exit;
    }

    mysqli_close($conn);
    echo json_encode(array('ok' => false));
}
?>