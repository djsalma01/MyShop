<?php
include "main.php"; 
$Users=display("SELECT * FROM users;");
?>


<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Members Menu</title>
</head>
<body>
<div class="container">
    <button class="btn btn-primary my-5"><a href="create_User.php" class="text-light">Add User</a></button>
</body>
</html>
<table class="table">
  <thead>
    <tr class="table-success">
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Operations</th>
    </tr>
  </thead>
  <tbody>
<?php
foreach($Users as $info):?>
<tr>
<td><?= $info->id?></td>
<td><?= $info->username?></td>
<td><?= $info->email?></td>
<td><?= $info->password?></td>
<td>
        <button class="btn btn-primary"><a href="update_Users.php?uid=<?= $info->id ?>" class="text-light">Update</a></button>
        <button class="btn btn-danger"><a href="delete_User.php?id=<?= $info->id ?>" class="text-light">Delete</a></button>
</td>
</tr>
<?php endforeach; ?>
 
 
  </tbody>



</table>
</div>
</body>
</html>

