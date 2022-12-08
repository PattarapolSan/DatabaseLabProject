<?php 
    require_once("./php/config.php");
    $_SESSION = [];
    session_unset();
    session_destroy();
    mysqli_query($conn, "UPDATE site_user set remember = 0 WHERE remember = 1 ");
    header("location: index.php")
?>