<?php 
    $_SESSION['active'] = false;
    
    if(empty($_SESSION['Users'])) {
        // initialize Users
        $_SESSION['Users'][] = array(
            "accNo" => "0001",
            "pin" => "1234",
            "balance" => (double)100000.50
        );
        $_SESSION['Users'][] = array(
            "accNo" => "0002",
            "pin" => "4321",
            "balance" => (double)50000.25
        );
    }
?>