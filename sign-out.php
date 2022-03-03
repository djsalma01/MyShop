<?php

session_start();

/*LOGOUT FUNCTIONALITY BY UNSETTING THE ID KEY
AND BRINGING BACK THE USER TO THE LOGIN PAGE*/

if (isset($_SESSION['id'])) {
    unset($_SESSION['id']);
}

header("Location: interface_login.php");
die();