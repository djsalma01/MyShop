<?php

if (isset($_POST['login'])) {
    $email = $_POST["emailadd"];
    $password = $_POST["password"];

    setsession("emailadd", $email, time() + 60*60*24*345);
    setsession("password", $password, time() + 60*60*24*345);
    header("Location: index.php");
} else if (isset($_SESSION['emailadd']) && isset($_SESSION['password'])) {
    header("Location: index.php");
}

?>

