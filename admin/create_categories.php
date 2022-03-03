<?php
session_start();
include "connect_db_admin.php";
$bdd=connectDB("salma", "salma");
if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $parent_id=$_POST["parent_id"];

    $CreateCategory = $bdd->query("INSERT INTO categories(name,parent_id) VALUES('$name','$parent_id')");
    if ($CreateCategory->rowCount() >= 1){
        echo "Data inserted succesfully !";
        header('location: menu_categories.php');
        exit();
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
    <title>Create a Category</title>
  </head>
  <body>
      <div class="container my-5">
      <form method="post">
  <div class="mb-3">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Enter your category Name" name= "name" autocomplete="off">
  </div>
  <div class="mb-3">
    <label>Parent_id</label>
    <input type="int" class="form-control" placeholder="Enter your category parent_id" name= "parent_id" autocomplete="off">
  </div>

  <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
</form>
  </body>
</html>
