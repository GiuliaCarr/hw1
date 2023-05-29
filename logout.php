<?php
    include 'dbname.php';


    session_start();
    session_destroy();

    header('Location: login.php');
?>