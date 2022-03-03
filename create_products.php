<?php
session_start();
include "connect_db_admin.php";
$bdd=connectDB("salma", "salma");
if(isset($_POST["submit"])){
    $name=$_POST["name"];
    $price=$_POST["price"];
    $category_name=$_POST["category_name"];
    

     $sth = $bdd->prepare("SELECT id FROM categories where name='$category_name';");
     $sth->execute();
    $category=$sth->fetchAll(PDO::FETCH_OBJ);
    $category=$category[0]->id;
   
    $image=$_POST["image"];
    $Createproduct= $bdd->query("INSERT INTO products(name,price,category_id,image) VALUES('$name','$price','$category','$image');");
    if ($Createproduct->rowCount() >= 1){
      //  echo "Data inserted succesfully !";
        header('location: menu_products.php');
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
    <title>Create a Product</title>
  </head>
  <body>
      <div class="container my-5">
      <form method="post">
  <div class="mb-3">
    <label>Name</label>
    <input type="text" class="form-control" placeholder="Enter your Product Name" name= "name" autocomplete="off">
  </div>
  <div class="mb-3">
    <label>Price</label>
    <input type="int" class="form-control" placeholder="Enter your Product price" name= "price" autocomplete="off">
  </div>
    <div class="mb-3">
    <label>category_name</label>
    <input type="text" class="form-control" placeholder="Enter your product category_name " name= "category_name" autocomplete="off">
  </div>
    <div class="mb-3">
    <label>image</label>
    <input type="text" class="form-control" placeholder="Enter your Product image path" name= "image" autocomplete="off">
  </div>

  <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
</form>
  </body>
</html>
