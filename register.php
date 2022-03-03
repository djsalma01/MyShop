<?php
include_once "connect_db.php";
$bdd=connectDB("salma", "salma");

  $name=$_POST["username"];
  $email=$_POST["email"];
  $password=$_POST["password"];
  $password2=$_POST["password2"];
  $date=date('d/m/Y');
  


  if(!empty($name) AND !empty($email) AND !empty($password) AND !empty($password2)){
      if(filter_var($email, FILTER_VALIDATE_EMAIL)){
          if($password==$password2){
             if(strlen($name)<=50){
                $TestEmail=$bdd->query("SELECT id FROM users WHERE email='$email'");

                if($TestEmail->rowCount()<1){
                    
                    $bdd->query("INSERT INTO users (username, email, password, admin) VALUES ('$name ' , '$email' , '$password' ,0)");
                    
                    header("Location: index.php");
                    exit();
                    
                   } 
                     else {header("Location: interface_register.php?error=This Email has already been used");
                        exit();}
                 } 
                 else 
                  {header("Location: interface_register.php?error=Your name has over than 50 characters");
                    exit();}
             }
             else {header("Location: interface_register.php?error=your two password doesn't correspond");
                exit();}
         }
         else  {header("Location: interface_register.php?error=Your Email is invalid");
            exit();}
     }
     else {header("Location: interface_register.php?error=One or more field is/are empty");
        exit();}


