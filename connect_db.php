<?php

function connectDb($username,$passwd) {
  /*SETTING THE NEEDED VARIABLES*/
  $host = "localhost";//host
  $db="my_shop";
  $port=3306;
  $dsn = "mysql:host=$host;dbname=$db;port=$port";

  /*ENTER YOUR DATA TO ACCESS TO THE DATABASE*/
  try {
    $pdo = new \PDO($dsn, $username, $passwd);
    return ($pdo);
  } catch(PDOException $e) { /*IF SOMETHING GOES WRONG, ERROR GETS DISPLAYED */
    error_log($e->getMessage()."\n");  
  }
}
?>