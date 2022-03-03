<?php
include "main.php";

$categories=display("SELECT * FROM categories ORDER BY parent_id;");


?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Categories List</title>
</head>
<body>
<div class="container">
    <button class="btn btn-primary my-5"><a href="create_categories.php" class="text-light">Add Category</a></button>
</body>
</html>
<table class="table">
  <thead>
    <tr class="table-success">
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">patent_id</th>
      <th scope="col"> </th>
    </tr>
  </thead>
  <tbody>
  <?php
foreach($categories as $info):?>
<tr>
<td><?= $info->id?></td>
<td><?= $info->name?></td>
<td><?= $info->parent_id?></td>
<td>
        <button class="btn btn-primary"><a href="update_categories.php?uid=<?= $info->id ?>" class="text-light">Update</a></button>
        <button class="btn btn-danger"><a href="delete_categories.php?id=<?= $info->id ?>" class="text-light">Delete</a></button>
</td>
</tr>
<?php endforeach; ?>



  </tbody>
</table>
</div>
</body>
</html>
