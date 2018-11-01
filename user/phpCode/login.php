<?php
include('../db/connection.php');
$message = "";
try{
  if(isset($_REQUEST['login'])){
    $email    = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    
    $validationErrorMssage = false;
    if(empty($email)){
      $emailErrorMessage = "This field is required";
      $validationErrorMssage = true;
    }
    if(empty($password)){
      $passwordErrorMessage = "This field is required";
      $validationErrorMssage = true;
    }
    if($validationErrorMssage == false){
      $query = "
        SELECT 
        * 
        FROM 
          ".USER." 
          WHERE 
          email    = :email 
        AND
          password = :password
          ";
      $selectQuery = $pdo->prepare($query);
      $responce    = $selectQuery->execute( [
                      'email'    => $email , 
                      'password' => md5($password)
                    ] );
      $row = $selectQuery->fetch();
      $rowCount = $selectQuery->rowCount();
      if($rowCount > 0){
        $message = "Wellcome";
      }else{
        $message  = "Invalide email and password";
      }
    
    }  
  }
}catch(PDOException $e){
    $message = "your record is not insert please contact the developer";
    //echo $e->getMessage();
  } 
?>