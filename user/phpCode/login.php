<?php
include('../db/connection.php');
include('../function.php');
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
    // This method is used to   
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
        $_SESSION['user'] = $email;
        echo "<pre>";
          print_r($_SESSION);
        echo "</pre>";
      // This Email and password only for Admin
        if($email == "shubham@jyoti"){
          return header('location:../index.php');
        }
        // This method is used to user can checked the activity and then go to demo page
        if($row['status'] == 'block'){
          return header('location:../505.php'); 
        }        
        if( $row['activity'] == 'activate' ){
          return header('Location:../demo.php');
        }
        $message = "<div class='form-group has-success'><label for='has-success'><i class='fa fa-check'> WellCome ". $row['firstname']."</i></label></div>";
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