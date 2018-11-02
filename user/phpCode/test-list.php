<?php
include_once('../../db/connection.php');
try{
  $query = "SELECT * FROM ".CUSTOMER;
  $selectQuery  = $pdo1->prepare($query);
  $selectQuery->execute();
    foreach( $selectQuery as $row ){
    	$firstname = $row['contactFirstName'];
      $lastname  = $row['contactLastName']; 
      $username  = $row['contactFirstName'].$row['contactLastName'];
      $email     = $row['contactFirstName']."@".$row['contactLastName'].'.com'; 
      $password  = $row['contactFirstName'];

      $rows = [ 
            'firstname' => $firstname,
            'lastname'  => $lastname,
            'username'  => $username,
            'email'     => $email,
            'password'  => md5($password)
          ];        
          $query =  "
            INSERT  
            INTO ".USER."
              (`firstname`, `lastname`, `username`,`email`,`password`) 
              VALUES 
              ( :firstname, :lastname , :username , :email , :password )
            ";
          $insert   = $pdo->prepare($query);
          $responce = $insert->execute( $rows );



    }
      // echo "<pre>";
      //   print_r( $row );
      // echo "</pre>";
      //  $username  = $row['contactFirstName'].$row['contactLastName'];
      //  $email     = $row['contactFirstName']."@".$row['contactLastName']; 
      // echo $email;
//echo $e->getMessage();
  die;
}catch(PDOException $e){
    echo "Not display the record contact the developer";
    echo $e->getMessage();
  }
?>