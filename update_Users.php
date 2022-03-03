<?php
include "main.php";
 
if(isset($_GET['uid'])){
$id=$_GET['uid'];
 
$update=display("SELECT * FROM users WHERE id='$id';");
}
 
if(isset($_POST["submit"])){
    $Name=$_POST["Name"];
    $Email=$_POST["Email"];
    $Password=$_POST["Password"];
    if($_POST["ch1"]){
      $admin=1;
          }
          else $admin=0;
        
    
    //if( require("connect_db_admin.php")){
        $bdd=connectDB("salma", "salma");
        $sth = $bdd->prepare("UPDATE users SET username='$Name',email='$Email',password='$Password' ,admin='$admin' WHERE id='$id';");
        $sth->execute();
 
      if ($sth) {
 
 
       header("Location: menu_member.php?success=successfully updated");
    exit();
      }else {
          header("Location: menu_member.php?error=error");
    exit();

      }
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update the member</title>
  </head>
  <body>
  <div class="container my-5">
  <form method="post">
       <div class="mb-3">
       <label>First Name</label>
       <input type="text" class="form-control" name="Name" value="<?=$update[0]->username?>">
        </div>
  <div class="mb-3">
    <label>Email</label>
    <input type="email" class="form-control" value="<?=$update[0]->email?>" name= "Email" >
  </div>
      <div class="mb-3">
    <label>Password</label>
    <input type="password" class="form-control" value="<?=$update[0]->password?>" name= "Password">
      </div>
      <div class="form-check">
<input class="form-check-input" type="checkbox"  <?php if(!$update[0]->admin)  {echo '';}
 else {echo 'checked="checked"';}?> name="ch1">
<label class="form-check-label" for="flexCheckDefault">
Admin
</label>
</div>

      <button type="submit" class="btn btn-primary" name="submit">Update</button>
   </form>
  </body>
</html>
