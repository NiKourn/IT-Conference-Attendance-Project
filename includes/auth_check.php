<?php
    //if userid not exists
    if(!isset($_SESSION['userid'])){
        header('Location: login.php');
    }else{}

?>