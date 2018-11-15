<?php 
include_once('../db/connection.php');
include_once('../function.php');
$message = "";
try{
// This method is used to get the Id is blank then page jump to listing page 
  if( ! $_REQUEST['id'] ){
    header('location: listing.php');
    echo "Your request is blank";
    return;
  }
  $id     = $_REQUEST['id'];
  if(!isset($_REQUEST['status'])){
      $_REQUEST['status'] = "";
  }   
  if(isset($_REQUEST['edit'])){
    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $username  = $_POST['username'];
    $email     = $_POST['email']; 
    $status    = $_REQUEST['status'];   
    
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
  // This method is used to when validation error message is false
  // Then this statement is executed 
  // Else this method is display the error  
    if( $validationErrorMessage == false ){  
  // This method is used to fatch the email in database
  // This <> sign is mean by not equal to...
  // This sign is used in query  
  // This mehod is used to checked the email
  // If email is already insert database then display the error 
  // Else database in wich store the data
      $status    = empty($status) ? 'Unblock' : $status; 
    $query = "
      SELECT 
      * 
      FROM 
        ".USER." 
        WHERE 
        email = :email 
        &&
        id <> :id
        LIMIT 1
        ";
    $selectQuery = $pdo->prepare($query);
    $selectQuery->execute([
      'email' => $email, 
      'id'    => $id
    ] );
    $rowCount = $selectQuery->rowCount();
      if($rowCount < 1){ 

        $rows = [
          'id'        => $id, 
          'firstname' => $firstname,
          'lastname'  => $lastname,
          'username'  => $username,
          'email'     => $email,
          'status'    => $status
        ];
    // Update query
        $query =" 
          UPDATE 
            `".USER."` 
            SET
            `firstname` = :firstname,
            `lastname`  = :lastname,
            `username`  = :username, 
            `email`     = :email,
            `status`    = :status
            WHERE 
            `id` = :id
          ";    
      $updateQuery = $pdo->prepare($query);
      $response = $updateQuery->execute($rows);
      
    // var_dump($response);
    // This method is used to dispay the success and not success message
    // when response are not equal of false then success message are display
    // else not success message are display

      if( $response !== false ){
        displayMessage('User update successfull' ,'success','check');
      }else{
        displayMessage('User is not updated' ,'danger','ban');
      }         
    }else{
      displayMessage('Email is already include' ,'danger','ban');
    } 
  } // Closed the breases is validation error message are true
}

// This method is used to fatch the data in databade using Id
  $query = "SELECT * FROM ".USER." WHERE id = :id";
  $selectQuery = $pdo->prepare($query);
  $selectQuery->execute([ 'id' => $id] );
  $row = $selectQuery->fetch();
  $activityLogo = (!empty($row['activity'])) ? $row['activity'] : 'deactivate';
}catch(PDOException $e){
    echo "Not display the record contact the developer";
    //echo $e->getMessage();
}
?>