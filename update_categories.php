<?php
include "main.php";

if(isset($_GET['uid'])){
$id=$_GET['uid'];

$categoryToUpdatre=display("SELECT * FROM categories WHERE id='$id';");
}

if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $parent_id=$_POST["parent_id"];

    
    //if( require("connect_db_admin.php")){
        $bdd=connectDB("salma", "salma");
        $sth = $bdd->prepare("UPDATE categories SET name='$name', parent_id='$parent_id' WHERE id='$id';");
        $sth->execute();

      if ($sth) {

 
       header("Location: menu_categories.php?success=successfully updated");
	exit();
      }else {
          header("Location: /menu_categories.php?error=error");
	exit();
 
      }
       


 }
   
 



//}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Update the category</title>
  </head>
  <body>
      <div class="container my-5">
      <form method="post">
  <div class="mb-3">
    <label> Name</label>
    <input type="text" class="form-control" name= "name" value="<?= $categoryToUpdatre[0]->name ?>" >
  </div>
  <div class="mb-3">
    <label>Parent id</label>
    <input type="int" class="form-control"  name= "parent_id" value="<?= $categoryToUpdatre[0]->parent_id ?>">
  </div>
  
  <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>
  </body>
</html>
