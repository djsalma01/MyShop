<?php

start_session();
require('connect_db.php');
$email = $_POST['emailadd'];
$password = $_POST['password'];
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$result = $conn->prepare("SELECT * FROM users WHERE email='$email' AND password='$password';");
$result = display();
$result->bindParam(":email", $email);
$result->bindParam(":password", $password);
$result->execute();
$email = $result->fetch(PDO::FETCH_ASSOC);

if ($email) {
    $_SESSION['emailadd'] = $email['name'];
    header("Location:index.php");
} else {
    header("Location:stayLogged?error=An error occured.php");
    exit();
}
