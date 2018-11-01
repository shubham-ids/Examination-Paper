<?php
  define('HOST','localhost');
  define('USERNAME','root');
  define('PASSWORD','');
  define('EXAM','examination');
  define('USER','user');
  // Database connectivity
  $dsn = 'mysql:dbname='.EXAM.';host=127.0.0.1'; # Data Source Name
  try{
    $pdo = new PDO($dsn,USERNAME,PASSWORD);
  	//echo "connection is successfull";
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Display the error in mysqli database
  }catch (PDOException $e){
    echo 'Connection failed: ' . $e->getMessage();
  }
  # Move to cofig file
  ini_set('display_startup_errors', 1);
  ini_set('display_errors', 1);
  error_reporting(-1);  
  define('URL','http://localhost/Examination-Paper/');
?>