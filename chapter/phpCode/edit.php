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
  $id = $_REQUEST['id'];
  if(!isset($_REQUEST['status'])){
      $status = "";
  }   
  if(isset($_REQUEST['edit'])){
    $title         = $_REQUEST['title'];
    $description   = $_REQUEST['description'];
    $limitMarks    = $_REQUEST['limit-marks'];
    $subjectClass  = $_REQUEST['subject']; 
    $validationErrorMessage = false;
    if(empty($title) ){
      $titleErrorMessage      = "<p class='text-red validationRequired'><i class='icon fa fa-ban'> </i> Fill the blank field</p>";
      $validationErrorMessage = true;
    }  
    if(empty($description) ){
      $descriptionErrorMessage = "<p class='text-red validationRequired '><i class='icon fa fa-ban'> </i> Fill the blank field</p>";
      $validationErrorMessage  = true;
    }
    if(empty($limitMarks) ){
      $limitMarkErrorMessage   = "<p class='text-red validationRequired '><i class='icon fa fa-ban'> </i> Fill the blank field</p>";
      $validationErrorMessage  = true;
    }  
    if(empty($subjectClass) ){
      $classSubjectErrorMessage = "<p class='text-red validationRequired '><i class='icon fa fa-ban'> </i> Fill the blank field</p>";
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
            `subject`     = :classSubject
            WHERE 
            `id` = :id
          ";    
        $updateQuery = $pdo->prepare($query);
        $response = $updateQuery->execute($rows);

    // This method is used to dispay the success and not success message
    // when response are not equal of false then success message are display
    // else not success message are display

      if( $response !== false ){
        $message = "<p class='alert alert-success'><i class='icon fa fa-check'></i>Record update successfull !</p>";
      }else{
        $message = "<p class='alert alert-danger'><i class='icon fa fa-ban'></i>Your Record is not updated !</p>";
      }         
    }else{
      $message   = "<p class='alert alert-danger'><i class='icon fa fa-ban'></i>".$title." is already include!</p>";
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