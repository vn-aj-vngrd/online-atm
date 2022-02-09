<?php

class Functions
{
    public function loginValidation()
    {
        $bool = false;
        foreach ($_SESSION['Users'] as $user) {
            if ($user['accNo'] == $_POST['accNo'] && $user['pin'] == $_POST['pin']) {
                $_SESSION['user'] =  array(
                    "accNo" => $user['accNo'],
                    "balance" => (float)$user['balance']
                );
                $_SESSION['active'] = true;
                header('Location: sections/home.php');
                $bool = true;
            }
        }

        if (!$bool) {
            $_SESSION['msg'] = "Card Number or Pin is invalid.";
        }
    }
    
    public function exitSession()
    {
        session_start();

        $_SESSION['active'] = false;
        unset($_SESSION['user']);
        header("Location: ../index.php");
    }

    public function withdraw()
    {
        $bool = false;
        for ($i = 0; $i < count($_SESSION['Users']) && $_SESSION['Users'][$i]['accNo'] != $_SESSION['user']['accNo']; $i++) {}
        if ($i < count($_SESSION['Users'])) {
            if ($_SESSION['Users'][$i]['balance'] >= $_POST['amount']) {
                $_SESSION['Users'][$i]['balance'] -= $_POST['amount'];
                $_SESSION['user']['balance'] = $_SESSION['Users'][$i]['balance'];
                $bool = true;

                $_SESSION['msg'] = "You have withdrawed a total amount of "."₱". $_POST['amount'];
                header("Location: exit.php");
            } 
        }

        if (!$bool) { 
            $_SESSION['err'] = "You have an insufficient balance.";
        }
    }

    public function deposit()
    {
        $bool = false;
        for ($i = 0; $i < count($_SESSION['Users']) && $_SESSION['Users'][$i]['accNo'] != $_SESSION['user']['accNo']; $i++) {}
        if ($i < count($_SESSION['Users'])) {
            $_SESSION['Users'][$i]['balance'] += $_POST['amount'];
            $_SESSION['user']['balance'] = $_SESSION['Users'][$i]['balance'];
            $bool = true;

            $_SESSION['msg'] = "You have deposited a total amount of "."₱". $_POST['amount'];
            header("Location: exit.php");
        }

        if (!$bool) {
            $_SESSION['err'] = "There is an error of depositing the amount to your account, please try again.";
        }
    }

    public function transfer()
    {
        $bool = false;
        for ($i = 0; $i < count($_SESSION['Users']) && $_SESSION['Users'][$i]['accNo'] != $_POST['trafNo'] ; $i++) {} // transfer acc number
        for ($j = 0; $j < count($_SESSION['Users']) && $_SESSION['Users'][$j]['accNo'] != $_SESSION['user']['accNo']; $j++) {} // current acc number
        if ($i < count($_SESSION['Users']) && $j < count($_SESSION['Users'])) {
            if ($_SESSION['Users'][$j]['balance'] >= $_POST['amount']) {
                $_SESSION['Users'][$i]['balance'] += $_POST['amount'];
                $_SESSION['Users'][$j]['balance'] -= $_POST['amount'];
                $_SESSION['user']['balance'] = $_SESSION['Users'][$j]['balance'];
                $bool = true;

                $_SESSION['msg'] = "You have transfer a total amount of "."₱". $_POST['amount']. " to Account Number: ". $_POST['trafNo'];
                header("Location: exit.php");
            }
        }

        if (!$bool) {
            $_SESSION['err'] = "There is an error of transferring the amount to Account Number: " . $_POST['trafNo'] . ", please try again.";
        }
       
    }
}

?>