<?php
  include_once('db/connection.php');
  include_once('function.php');
# CSC -> is a table name.it is full form of class , subject , chapters
    $query = "SELECT 
    (SELECT COUNT(*) FROM `class`) As Classes, 
    (SELECT COUNT(*) FROM `subject`) As Subject,
    (SELECT COUNT(*) FROM `chapters`) As Chapter";
    $stmt = $pdo->prepare($query);
    $exe  = $stmt->execute();
    $CSC  = $stmt->fetch(PDO::FETCH_ASSOC);
 
#<!-- Query of user table -->
  $query    = "SELECT 
                (SELECT count(*) FROM `".USER."`) as users,
                (SELECT count(*) FROM `".USER."` WHERE `username` LIMIT 1,25) as new,
                (SELECT count(`status`) FROM `".USER."` WHERE `status` = 'block') as block,
                (SELECT count(`status`) FROM `".USER."` WHERE `status` = 'unblock') as unblock
              ";
  $user     = $pdo->prepare($query);
  $response = $user->execute();
  $all      = $user->fetch(PDO::FETCH_ASSOC);
  ?>