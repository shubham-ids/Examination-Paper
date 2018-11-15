<?php
  include_once('../db/connection.php');
  include_once('../function.php');
  $message = "";
  try{
    $activity = (!isset($_POST['activity']) ? '' : $_POST['activity'] );
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
        $firstnameErrorMessage  = requiredMessage();
        $validationErrorMessage = true;
      }
      if(empty($lastname)){
        $lastnameErrorMessage   = requiredMessage();
        $validationErrorMessage = true;
      }
      if(empty($username)){
        $usernameErrorMessage   = requiredMessage();
        $validationErrorMessage = true;
      }      
      if(empty($email)){
        $emailErrorMessage      = requiredMessage();
        $validationErrorMessage = true;
      }
      if(empty($password)){
        $passwordErrorMessage   = requiredMessage();
        $validationErrorMessage = true;
      } 
      if(empty($Cpassword)){
        $CpasswordErrorMessage   = requiredMessage();
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
            displayMessage('Successful registration!' ,'success','check');
          }else{
            displayMessage('registration Error!' ,'danger','ban');
            //echo $pdo->error;
          }        
        }else{
          displayMessage('Username: '.$username.' and Email: '.$email.' is already include' ,'danger','ban');
        }          
      }              
    }
}catch(PDOException $e){
    $message = "your record is not insert please contact the developer";
    //echo $e->getMessage();
  } 
?>