<?php
 session_start();
    if(!isset($_SESSION["islogin"])){
        echo "<script> window.location = 'index.php'</script>";
    }
?>