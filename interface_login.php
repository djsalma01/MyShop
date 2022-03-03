<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="sign-in.css">
    <title>myshop</title>
  </head>
  <body>
    <!---LOGIN HTML AND PHP-->
    <form action="sign-in.php" method="post">
      <h2>Welcome Back!</h2>
      <!---CHECKING WHEN THERE'S AN ERROR 'check sign_in.php for more info'-->
      <?php if (isset($_GET['error'])) { ?>
        <p class="error"><?php echo $_GET['error'];?></p>
      <?php } ?>
      <!---CHECKING WHEN THERE'S A VALIDATION 'check sign_in.php for more info'-->
      <?php if (isset($_GET['validated'])) { ?>
        <p class="validated"><?php echo $_GET['validated'];?></p>
      <?php } ?>
      <!---DISPLAYING INPUTS AND BUTTONS-->
      <label>Email</label>
      <input type="text" name="emailadd" placeholder="Email address">
      <label>Password</label>
      <input type="password" name="password" placeholder="Password">
      <button type="submit" name="login" href="stayLogged.php">Log In</button>
      <a type="submit" href="register.php">Sign Up</a>
    </form>
  </body>
</html>