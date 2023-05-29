<?php

require_once 'dbname.php';
session_start();

function checkAuth()
{
    
    if (isset($_SESSION['username'])) { 
        return $_SESSION['id']; 
    } else
        return 0;
}
?>