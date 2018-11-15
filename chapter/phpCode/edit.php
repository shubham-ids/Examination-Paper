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
  $id = $_REQUEST['id'];
  if(!isset($_REQUEST['status'])){
      $status = "";
  }   
  if(isset($_REQUEST['edit'])){
    $title         = $_REQUEST['title'];
    $description   = $_REQUEST['description'];
    $limitMarks    = $_REQUEST['limit-marks'];
    $subjectClass  = $_REQUEST['classSubject']; 
    $validationErrorMessage = false;
    if(empty($title) ){
      $titleErrorMessage      = requiredMessage();
      $validationErrorMessage = true;
    }  
    if(empty($description) ){
      $descriptionErrorMessage = requiredMessage();;
      $validationErrorMessage  = true;
    }
    if(empty($limitMarks) ){
      $limitMarkErrorMessage   = requiredMessage();;
      $validationErrorMessage  = true;
    }  
    if(empty($subjectClass) ){
      $classSubjectErrorMessage = requiredMessage();;
      $validationErrorMessage   = true;
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
    $fetch    = $pdo->prepare("SELECT * FROM `".CHAPTER."` WHERE `title` = :title");
    $result   = $fetch->execute(['title' => $title]);  
    $rowCount = $fetch->rowCount();
    if($rowCount < 1){ 
      $rows = [
        'id'           => $id, 
        'title'        => $title,
        'description'  => $description,
        'limitMarks'   => $limitMarks,
        'classSubject' => $subjectClass
      ];
    // Update query
        $query =" 
          UPDATE 
            `".CHAPTER."` 
            SET
            `title`       = :title,
            `description` = :description,
            `limit-marks` = :limitMarks,
            `classSubject`= :classSubject
            WHERE 
            `id` = :id
          ";    
        $updateQuery = $pdo->prepare($query);
        $response = $updateQuery->execute($rows);

    // This method is used to dispay the success and not success message
    // when response are not equal of false then success message are display
    // else not success message are display

      if( $response !== false ){
        displayMessage('Record updated successfully' ,'success','check');;
      }else{
         displayMessage('Your record is not updated' ,'danger','ban');
      }         
    }else{
      $selectQuery  =  $pdo->query("SELECT * FROM ".SUBJECT." WHERE id =".$subjectClass); 
      while( $fetch = $selectQuery->fetch() ){ 
        displayMessage( 'This chapter name '.$title.' is already include for '.$fetch['title'].' subject' ,'danger','ban');
      } 
    } 
  } // Closed the breases is validation error message are true
}

// This method is used to fatch the data in databade using Id
  $query = "SELECT * FROM ".CHAPTER." WHERE id = :id";
  $selectQuery = $pdo->prepare($query);
  $selectQuery->execute([ 'id' => $id] );
  $row = $selectQuery->fetch();
}catch(PDOException $e){
    echo "Not display the record contact the developer";
    echo $e->getMessage();
}
?>