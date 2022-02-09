<?php

$inactive = 300;
ini_set('session.gc_maxlifetime', $inactive);

session_start();

if (isset($_SESSION['testing']) && (time() - $_SESSION['testing'] > $inactive)) {
$_SESSION['active'] = false;
}

$_SESSION['testing'] = time();

if ($_SESSION['active'] == false) {
header("Location: ../index.php");
}

?>