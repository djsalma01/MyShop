<?php
session_start();
include_once "connect_db_admin.php";
$bdd=connectDB("salma", "salma");
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
    $RecupMember = $bdd->prepare('SELECT * FROM products WHERE id = ?');
    $RecupMember->execute(array($getid));
    if($RecupMember->rowCount()>0){
        $deleteUser = $bdd->prepare('DELETE FROM products WHERE id=?');
        $deleteUser->execute(array($getid));

        header('location: menu_products.php');
    }else{
        echo"None product have been find";
    }
    }
else{
    echo "No recuperation of the product";
}



