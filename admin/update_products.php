<?php
include "main.php";

if(isset($_GET['uid'])){
$id=$_GET['uid'];

$product=display("SELECT * , categories.name as category_name FROM products inner join categories on products.category_id=categories.id where products.id='$id';");
}

if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $price=$_POST["price"];
    $categories=$_POST["categories_name"];  
    $image=$_POST["image"];

    
    //if( require("connect_db_admin.php")){
        $bdd=connectDB("salma", "salma");
        $sth = $bdd->prepare("UPDATE products SET name='$name', price='$price', categories.name='$categories', image='$image' WHERE id='$id';");
        $sth->execute();

      if ($sth) {

 
       header("Location: menu_products.php?success=successfully updated");
	exit();
      }else {
          header("Location: menu_products.php?error=error");
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
    <input type="text" class="form-control" name= "name" value="<?= $product[0]->name ?>" >
  </div>
  <div class="mb-3">
    <label>Price</label>
    <input type="int" class="form-control"  name= "price" value="<?= $product[0]->price ?>">
  </div>
    <div class="mb-3">
    <label>category name</label>
    <input type="int" class="form-control"  name= "categories_name" value="<?= $product[0]->category_name ?>">
  </div>
    <div class="mb-3">
    <label>image</label>
    <input type="int" class="form-control"  name= "image" value="<?= $product[0]->image ?>">
  </div>
  <button type="submit" class="btn btn-primary" name="submit">Update</button>
</form>
  </body>
</html>
