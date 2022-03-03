<?php

include "main.php";

if((isset($_GET['category']) )& ( $_GET['category'] != "All categories")) {
  $selected = $_GET['category'];
 // echo $selected;
   $id=display("SELECT id , parent_id from categories where categories.name='$selected';");
   $ids=$id[0]->id;
   $idp=$id[0]->parent_id;
   $bdd=connectDB("salma", "salma");
   if ($ids==$idp){
    $sth1 = $bdd->prepare("SELECT products.id as id, products.name as name, products.price as price , products.image as image,categories.name as category_name from products inner join categories on products.category_id=categories.id where categories.parent_id='$idp';");

   }
   else {
    $sth1 = $bdd->prepare("SELECT products.id as id, products.name as name, products.price as price , products.image as image,categories.name as category_name from products inner join categories on products.category_id=categories.id where categories.id='$ids';");

   }
   $sth1->execute();
   $products=$sth1->fetchAll(PDO::FETCH_OBJ);
  // echo $products->name;
} else {
    $products=display("SELECT  products.id as id,products.name as name, products.price as price , products.image as image,categories.name as category_name FROM products inner join categories on products.category_id=categories.id;");
}

$bdd=connectDB("salma", "salma");
$sth = $bdd->prepare("SELECT *  FROM categories ORDER BY parent_id;");
$sth->execute();
$categories=$sth->fetchAll(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="searchbar.css">
    <link rel="stylesheet" href="grid.css">
    <script language="javascript" type="text/javascript" >
    
    </script>
    <script src="https://kit.fontawesome.com/1639541e2a.js" crossorigin="anonymous"></script>
    <title>myshop</title>
  </head>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light fw-bolder justify-content-between">
        <img class="navbar-brand" src="images/Logo.png" alt="Logo"/>
        <img class="d-md-none" src="images/Cart Button.png" alt="Cart"/>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a href="#" class="nav-link">HOME</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">SHOP</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">MAGAZINE</a>
          </ul>
          <ul class="navbar-nav">
            <li class="nav-item d-none d-md-block newmargin">
              <img src="images/Cart Button.png" alt="Cart"/>
            </li>
            <li class="nav-item">
              <a href="Dashboard.php" class="nav-link">ADMIN-HOME</a>
            </li>
            <li class="nav-item">
              <a href="sign-in.php" class="nav-link">LOGOUT</a>
            </li class="nav-item">
          </ul>
        </div>
      </nav>
    </header>
    <body>

    <div class="container">
      <div class="row" >
        <form action="search_bar.php" method="GET">
          <div class=BoxContainer>
          <input type="text" class="input" placeholder="Search a product">
          <div class="search_button">
          <button type="submit" name="search"><i class="fas fa-search"></i></button>
          </div>
          </div> 
          </form>
         
  
      </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
          <!---FILTER FOR MOBILE-->
          <div class="filtermobile  col-md-3  col-sm-6">
            <select class="form-select" >
              <option selected>FILTER BY</option>
              <optgroup label="Collection">
                <option>Tables</option>
                <option>Chaires</option>
              </optgroup>
              <optgroup label="Color">
                <option>Green</option>
                <option>Red</option>
                <option>Brun</option>
              </optgroup>
              <optgroup label="Category">
                  <option>natural</option>
                  <option>natural</option>
              </optgroup>
            </select>
            <div>PRICE RANGE</div>
            <input type="range" min="1" max="100" value="50">
          </div>
          <!---FILTER FOR COMPUTER-->
          <div class="filter col">
            <h3>FILTER BY</h3>
            <div>
              <select>
                <option value="0">Collection</option>
              </select>
            </div>
            <div>
              <select>
                <option value="1">Color</option>
              </select>
            </div>
            <div>    <form action="" method="post">  
                    <select  name="category" id="category" onChange="doReload(this.value);" >
                           <option value="All categories">---All Category---</option>
                           <?php foreach($categories as $category): ?>
                               <option value=<?= $category->name?>
                               <?php
                               if ($category->name == $_GET['category']){ ?>
                               selected <?php } ?>
                               >
                               <?= $category->name?></option>
                           <?php endforeach; ?>

                     </select>           

                  </form>
            </div>
 

            <div>Price range
              <input type="range" min="1" max="100" value="50">
            </div>
          </div>
          <!---CARDS FOR EACH PRODUCT-->
          <?php foreach($products as $product): ?>
            <div class="card col">
              <img src="<?= $product->image ?>" class="mx-auto d-block" alt="baloncoire style nature">
              <div class="titre">
                <p class="name"><?= $product->name ?></p>
                <p class="price"><?= $product->price ?> €</p>
              </div>
              <div class="bas-cart">
                <div>
                  <p><?= $product->category_name ?></p>
                  <div class="start">
                    <img src="images/Star - On .png">
                    <img src="images/Star - On .png">
                    <img src="images/Star .png">
                    <img src="images/Star .png">
                    <img src="images/Star .png">
                  </div>
                </div>
              <div>
                <img src="images/Cart Button.png" alt="panier">
              </div>
            </div>
          </div>
        <?php endforeach; ?>
  </body>
</html>
