<?php
include "main.php";

$products=display("SELECT * FROM products;");


?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Products List</title>
</head>
<body>
<div class="container">
    <button class="btn btn-primary my-5"><a href="create_products.php" class="text-light">Add Product</a></button>
</body>
</html>
<table class="table">
  <thead>
    <tr class="table-success">
      <th scope="col">id</th>
      <th scope="col">name</th>    
      <th scope="col">price</th>
      <th scope="col">category_id</th>    
      <th scope="col">image</th>
      <th scope="col"> </th>
    </tr>
  </thead>
  <tbody>
  <?php
foreach($products as $info):?>
<tr>
<td><?= $info->id?></td>
<td><?= $info->name?></td>
<td><?= $info->price?></td>
<td><?= $info->category_id?></td>
<td><?= $info->image?></td>
<td>
        <button class="btn btn-primary"><a href="update_products.php?uid=<?= $info->id ?>" class="text-light">Update</a></button>
        <button class="btn btn-danger"><a href="delete_products.php?id=<?= $info->id ?>" class="text-light">Delete</a></button>
</td>
</tr>
<?php endforeach; ?>



  </tbody>
</table>
</div>
</body>
</html>
