<?php
session_start();
include_once "connect_db_admin.php";
$bdd=connectDB("salma", "salma");
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $RecupMember = $bdd->prepare('SELECT * FROM categories WHERE id = ?');
    $RecupMember->execute(array($getid));
    if($RecupMember->rowCount()>0){
        $deleteUser = $bdd->prepare('DELETE FROM categories WHERE id=?');
        $deleteUser->execute(array($getid));

        header('location: menu_categories.php');
    }else{
        echo"None category have been find";
    }
    }
else{
    echo "No recuperation of the category";
}



