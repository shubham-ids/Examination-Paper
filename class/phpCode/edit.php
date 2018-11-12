<?php 
include_once('../db/connection.php');
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
      $status = "";
  }   
  if(isset($_REQUEST['edit'])){
  $title       = $_REQUEST['title'];
  $description = $_REQUEST['description'];
  $duration    = $_REQUEST['duration'];   
    
  // This methos is used to display the required message
    $validationErrorMessage = false;
    
    if(empty($title)){
      $titleErrorMessage      = "<p class='text-red validationRequired'><i class='icon fa fa-ban'></i> This field is required</p>";
      $validationErrorMessage = true;
    }
    if(empty($description)){
      $descriptionErrorMessage = "<p class='text-red validationRequired'><i class='icon fa fa-ban'></i> This field is required</p>";
      $validationErrorMessage  = true;
    }
    if(empty($duration)){
      $durationErrorMessage   = "<p class='text-red validationRequired'><i class='icon fa fa-ban'></i> This field is required</p>";
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
    $fetch = $pdo->prepare("SELECT * FROM `".CLASSES."` WHERE title = :title ");
    $result = $fetch->execute(['title' => $title]); 
    $rowCount = $fetch->rowCount();
    if($rowCount < 1){ 
      $rows = [
        'id'          => $id, 
        'title'       => $title,
        'description' => $description,
        'duration'    => $duration
      ];
    // Update query
        $query =" 
          UPDATE 
            `".CLASSES."` 
            SET
            `title`        = :title,
            `description`  = :description,
            `duration`     = :duration 
            WHERE 
            `id` = :id
          ";    
        $updateQuery = $pdo->prepare($query);
        $response = $updateQuery->execute($rows);

    // This method is used to dispay the success and not success message
    // when response are not equal of false then success message are display
    // else not success message are display

      if( $response !== false ){
        $message = "<p class='alert alert-success'>Record update successfull !</p>";
      }else{
        $message = "<p class='alert alert-danger'>Your Record is not updated !</p>";
      }         
    }else{
      $message   = "<p class='alert alert-danger'>".$title." is already include!</p>";
    } 
  } // Closed the breases is validation error message are true
}

// This method is used to fatch the data in databade using Id
  $query = "SELECT * FROM ".CLASSES." WHERE id = :id";
  $selectQuery = $pdo->prepare($query);
  $selectQuery->execute([ 'id' => $id] );
  $row = $selectQuery->fetch();
}catch(PDOException $e){
    echo "Not display the record contact the developer";
    echo $e->getMessage();
}
?>