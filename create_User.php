<?php
session_start();
include "connect_db_admin.php";
$bdd=connectDB("salma", "salma");
if(isset($_POST["submit"])){
    $Name=$_POST["Name"];
    $Email=$_POST["Email"];
    $Password=$_POST["Password"];
    if($_POST["ch1"]){
$admin=1;
    }
    else $admin=0;
    

    $CreateMember = $bdd->query("INSERT INTO users (username,email,password,admin) VALUES('$Name','$Email','$Password','$admin')");
    if ($CreateMember->rowCount()>=1){
        header('location: menu_member.php');
    }else{
        error_log($e->getMessage()."\n");
    }

}
?>

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Create a new user</title>
  </head>
  <body>
      <div class="container my-5">
      <form method="post">
  <div class="mb-3">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Enter your Name" name= "Name" autocomplete="off">
  </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" class="form-control" placeholder="Enter your Email" name= "Email" autocomplete="off">
  </div>
  <div class="mb-3">
    <label>Password</label>
    <input type="password" class="form-control" placeholder="Enter your Password" name= "Password" autocomplete="off">
  </div>
  <div class="form-check">
<input class="form-check-input" type="checkbox" value="1" name="ch1">
<label class="form-check-label" for="flexCheckDefault">
Admin
</label>
</div>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>
  </body>
</html>
