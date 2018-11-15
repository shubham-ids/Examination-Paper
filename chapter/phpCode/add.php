<?php
  try{
    include_once('../db/connection.php');
    include_once('../function.php');
    $message ="";
    if( isset($_REQUEST['add']) ){
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
        $descriptionErrorMessage = requiredMessage();
        $validationErrorMessage  = true;
      }
      if(empty($limitMarks) ){
        $limitMarkErrorMessage   = requiredMessage();
        $validationErrorMessage  = true;
      }  
      if(empty($subjectClass) ){
        $classSubjectErrorMessage = requiredMessage();
        $validationErrorMessage   = true;
      }                             
      if( $validationErrorMessage == false ){
        $fetch = $pdo->prepare("SELECT * FROM `".CHAPTER."` WHERE `title` = :title");
        $result = $fetch->execute(['title' => $title]); 
        $rowCount = $fetch->rowCount();
        if( $rowCount < 1 ){
          $row = [
            'title'        => $title,
            'description'  => $description,
            'limitMarks'   => $limitMarks,
            'classSubject' => $subjectClass

          ];
          $query  = "
            INSERT 
            INTO
              `".CHAPTER."` 
              (`title`,`description`,`limit-marks`,`classSubject`)
            VALUES
            (:title , :description  , :limitMarks, :classSubject)
          ";
          $stmt     = $pdo->prepare($query);
          $responce = $stmt->execute($row);
          if($responce !== false){
            displayMessage('Data insert successfully' ,'success','check');
          }else{
            displayMessage('Your data is not inserted' ,'danger','ban');
          }
        }else{
          $selectQuery  =  $pdo->query("SELECT * FROM ".SUBJECT." WHERE id =".$subjectClass); 
          while( $fetch = $selectQuery->fetch() ){ 
            displayMessage( 'This chapter name '.$title.' is already include for '.$fetch['title'].' subject' ,'danger','ban');
          } 
        }
      }    
    }
  }catch(PDOException $e){
    $message = "<h3 class='text-red'><i class='icon fa fa-ban'></i> your record is not insert please contact the developer</h3>";
    echo $e->getMessage();
  } 
?>