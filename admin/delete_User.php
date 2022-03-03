<?php
session_start();
include_once "connect_db_admin.php";
$bdd=connectDB("salma", "salma");
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $RecupMember = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $RecupMember->execute(array($getid));
    if($RecupMember->rowCount()>0){
        $deleteUser = $bdd->prepare('DELETE FROM users WHERE id=?');
        $deleteUser->execute(array($getid));

        header('location: menu_member.php');
    }else{
        echo"None of members have been find";
    }
    }
else{
    echo "No recuperation of the username";
}
