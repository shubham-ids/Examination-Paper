<?php
  define('HOST','localhost');
  define('USERNAME','root');
  define('PASSWORD','');

  define('CLASSICMODEL','classicmodels'); // Database classicmodel
  define('CUSTOMER','customers');        // classicmodel => tablename{ customers}
 
  define('EXAM','examination');  // 2 database examination
  define('USER','user');         // emamination => tablename{ user }
  define('CLASSES','class');
  define('SUBJECT','subject');
  define('CHAPTER','chapters');
  define('COUNTRY','country');
  define('STATE','state');
  define('DISTRICT','district');
  define('CITY','city');
  // Database connectivity
  $dsn1 = 'mysql:dbname='.CLASSICMODEL.';host=127.0.0.1'; # Data Source Name
  $dsn  = 'mysql:dbname='.EXAM.';host=127.0.0.1;charset=utf8'; # Data Source Name
  try{
    $pdo1 = new PDO($dsn1,USERNAME,PASSWORD);
    $pdo = new PDO($dsn,USERNAME,PASSWORD);
    #$pdo = new PDO($dsn,USERNAME,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
  	//echo "connection is successfull";
    session_start();  // Start the session
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Display the error in mysqli database
  }catch (PDOException $e){
    echo 'Connection failed: ' . $e->getMessage();
  }
  # Move to cofig file
  ini_set('display_startup_errors', 1);
  ini_set('display_errors', 1);
  error_reporting(-1);
?>