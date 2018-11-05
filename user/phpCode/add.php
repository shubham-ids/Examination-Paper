<?php
  include_once('../db/connection.php');
  $message = "";
  try{
    if(isset($_REQUEST['add'])){    
      $firstname = $_POST['firstname'];
      $lastname  = $_POST['lastname'];
      $username  = $_POST['username'];
      $email     = $_POST['email'];
      $password  = $_POST['password'];
      $Cpassword = $_POST['Cpassword'];
      $activity  = $_POST['activity']; 
      
      $status = (empty($status)) ? 'deactivate' : $status;
    // This methos is used to display the required message
      $validationErrorMessage = false;
      if(empty($firstname)){
        $firstnameErrorMessage  = "This field is required";
        $validationErrorMessage = true;
      }
      if(empty($lastname)){
        $lastnameErrorMessage   = "This field is required";
        $validationErrorMessage = true;
      }
      if(empty($username)){
        $usernameErrorMessage   = "This field is required";
        $validationErrorMessage = true;
      }      
      if(empty($email)){
        $emailErrorMessage      = "This field is required";
        $validationErrorMessage = true;
      }
      if(empty($password)){
        $passwordErrorMessage   = "This field is required";
        $validationErrorMessage = true;
      } 
      if(empty($Cpassword)){
        $CpasswordErrorMessage   = "This field is required";
        $validationErrorMessage = true;
      } 
      
      if($validationErrorMessage == false){
        $query = "
          SELECT 
          * 
          FROM 
            ".USER." 
            WHERE 
            email    = :email 
          OR
            username = :username
            ";
        $selectQuery = $pdo->prepare($query);
        $selectQuery->execute( [
          'email'    => $email , 
          'username' => $username
        ] );
        $row = $selectQuery->rowCount();
        if($row < 1){
          $rows = [ 
            'firstname' => $firstname,
            'lastname'  => $lastname,
            'username'  => $username,
            'email'     => $email,
            'password'  => md5($password),
            'activity'  => $activity
          ];      
          $query =  "
            INSERT  
            INTO ".USER."
              (`firstname`, `lastname`, `username`,`email`,`password`,`activity`) 
              VALUES 
              ( :firstname, :lastname , :username , :email , :password , :activity)
            ";
          $insert = $pdo->prepare($query);
          $insert->execute( $rows );

          if($insert !== false){
            $message = "<p class='alert alert-success'>Successful registration!</p>";
          }else{
            $message = "<p class='alert alert-danger'>registration Error!</p>";
            //echo $pdo->error;
          }        
        }else{
          $message = "<p class='alert alert-danger'>Username and Email is already include!</p>";  
        }          
      }              
    }
}catch(PDOException $e){
    $message = "your record is not insert please contact the developer";
    //echo $e->getMessage();
  } 
?>