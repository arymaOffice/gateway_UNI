<?php

    /* acquisizione parametri in get */

    $orderID = filter_var($_GET['orderID'],FILTER_SANITIZE_NUMBER_INT);
    $userID = filter_var($_GET['userID'],FILTER_SANITIZE_NUMBER_INT);
    $email = filter_var($_GET['email'],FILTER_SANITIZE_EMAIL);

    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        if($email != '' && $userID != '' && $email != '' ){

        }
    }

?>