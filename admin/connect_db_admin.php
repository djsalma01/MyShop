<?php

function connectDb($username,$passwd) {
    $host = "localhost";//host
    $db="my_shop";
    $port=3306;
    $dsn = "mysql:host=$host;dbname=$db;port=$port";

    try {
      $pdo = new \PDO($dsn, $username, $passwd);
      //echo "connected"; 
      return ($pdo);
      
  
    } catch(PDOException $e) {
      error_log($e->getMessage()."\n");  
    }
  }
  ?>
