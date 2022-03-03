<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link rel="stylesheet" href="Dashboard.css">
<link rel="stylesheet" href="grid.css">
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
<a href="#" class="nav-link">ADMIN-HOME</a>
</li>
<li class="nav-item">
<a href="index.php" class="nav-link">MYSHOP</a>
</li>
</ul>
<ul class="navbar-nav">
<li class="nav-item d-none d-md-block newmargin">
<img src="images/Cart Button.png" alt="Cart"/>
</li>
<li class="nav-item">
<a href="interface_login.php" class="nav-link">LOG-OUT</a>
</li>
</ul>
</div>
</nav>
</header>
<body>
<div class="container">
<div class="row">
<div class="col-md-4">
<div class="content"> <a href="http://localhost:8080/menu_member.php">
<div class="content-overlay"></div> <img class="content-image" src="images/users.jpg">
<div class="content-details fadeIn-bottom">
<h3 class="content-title">Users</h3>

</div>
</a> </div>
</div>
<div class="col-md-4">
<div class="content"> <a href="http://localhost:8080/menu_products.php">
<div class="content-overlay"></div> <img class="content-image" src="images/products.jpg">
<div class="content-details fadeIn-bottom">
<h3 class="content-title">Products</h3>

</div>
</a> </div>
</div>

<div class="col-md-4">
    <div class="content"> <a href="http://localhost:8080/menu_categories.php">
    <div class="content-overlay"></div> <img class="content-image" src="images/cat.jpg">
    <div class="content-details fadeIn-bottom">
    <h3 class="content-title">Categories</h3>
    
    </div>
    </a> </div>
    </div>
</div>



</div>
</div>
</body>
</html>
