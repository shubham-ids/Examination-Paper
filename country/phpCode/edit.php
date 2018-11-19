<?php 
try{
  include_once('../db/connection.php');
  include_once('../function.php');
  $message = "";
// This method is used to get the Id is blank then page jump to listing page 
  if( ! $_REQUEST['id'] ){
    header('location: listing.php');
    echo "Your request is blank";
    return;
  }
  $id = $_REQUEST['id'];
  if(!isset($_REQUEST['status'])){
      $status = "";
  }   
  if(isset($_REQUEST['edit'])){
  $title       = $_REQUEST['title'];
  $description = $_REQUEST['description'];  
    
  // This methos is used to display the required message
  $validationErrorMessage = false;
  if( empty($title) || empty($description) ){
    $ErrorMessage = "<p class='callout callout-danger '><i class='icon fa fa-ban'> </i> Fill the blank field</p>";
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
    $fetch = $pdo->prepare("SELECT * FROM `".COUNTRY."` WHERE title = :title ");
    $result = $fetch->execute(['title' => $title]); 
    $rowCount = $fetch->rowCount();
    if($rowCount < 1){ 
      $rows = [
        'id'          => $id, 
        'title'       => $title,
        'description' => $description
      ];
    // Update query
        $query =" 
          UPDATE 
            `".COUNTRY."` 
            SET
            `title`        = :title,
            `description`  = :description
            WHERE 
            `id` = :id
          ";    
        $updateQuery = $pdo->prepare($query);
        $response = $updateQuery->execute($rows);

    // This method is used to dispay the success and not success message
    // when response are not equal of false then success message are display
    // else not success message are display

      if( $response !== false ){
        displayMessage('Record update successfull !' ,'success','check');
      }else{
        displayMessage('Your Record is not updated !' ,'danger','ban');
      }         
    }else{
      displayMessage( $title.' is already include!' ,'danger','ban');
    } 
  } // Closed the breases is validation error message are true
}

// This method is used to fatch the data in databade using Id
  $query = "SELECT * FROM ".COUNTRY." WHERE id = :id";
  $selectQuery = $pdo->prepare($query);
  $selectQuery->execute([ 'id' => $id] );
  $row = $selectQuery->fetch();
}catch(PDOException $e){
    echo "Not display the record contact the developer";
    echo $e->getMessage();
}
?>