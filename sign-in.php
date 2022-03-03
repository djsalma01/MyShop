<?php

include "connect_db.php";
$conn = connectDB("salma", "salma");

if (isset($_POST['emailadd']) && isset($_POST['password'])) {
    session_start();
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    /*VALIDATE EMAIL SYNTAXE*/
    $email = validate($_POST['emailadd']);
    function validateEmail($email) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return $email;
        }
        else {
            header("Location: interface_login.php?error=Sorry, invalid email address");
            exit();
        }
    }

    /*VALIDATE EMAIL AND PASSWORD SYNTAX*/
    $emailadd = validateEmail($email);
    $pass = validate($_POST['password']);

    /************ERROR HANDLING************/
    /*HANDLING IF EMAIL FIELD IS EMPTY*/
    if (empty($emailadd)) {
        header("Location: interface_login.php?error=Email Address is required");
        exit();
    /*HANDLING IF PASSWORD FIELD IS EMPTY*/
    } else if (empty($pass)) {
        header("Location: interface_login.php?error=Password is required");
        exit();
    /*HANDLING IF BOTH EMAIL AND PASSWORD FIELDS ARE EMPTY*/
    } else if (empty($pass) && empty($pass)) {
        header("Location: interface_login.php?error=Please insert your information");
        exit();
    /*IF EVERYTHING IS OKAY, ENTER INTO THE WEBSITE*/
    } else {
        $sql = "SELECT id FROM users WHERE email='$emailadd' AND password='$pass'";
        $result = $conn->query($sql);
        if (($result->rowCount()) == 1) {
            $data = $conn->prepare("SELECT admin FROM users WHERE email = '$emailadd' AND password = '$pass';");
            if ($data->execute()) {
                $rows = $data->fetchAll(PDO::FETCH_OBJ);
                $Admin = $rows[0]->admin;
            }
            if ($Admin == 1) {
                header("Location:Dashboard.php");
                exit();
            } else {
                header("Location:index.php");
                exit();
            }
        } else {
            header("Location: interface_login.php?error=Error from your email or password");
            exit();
        }
    }
} else {
    header("Location: interface_login.php");
    exit();
}