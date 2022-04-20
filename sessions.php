<?php
    session_start();

    if($_SESSION["currentUser"]==NULL){
        header("Location: index");
    }
    
?>