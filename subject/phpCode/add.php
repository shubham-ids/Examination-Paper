<?php
  try{
    include_once('../db/connection.php');
    include_once('../function.php');
    $message ="";
    $titleErrorMessage ="";
    if( isset($_REQUEST['add']) ){
      $title         = $_REQUEST['title'];
      $description   = $_REQUEST['description'];
      $precticalNo   = $_REQUEST['prectical-no'];
      $theoreticalNo = $_REQUEST['theoretical-no'];
      $ExamTime      = $_REQUEST['examination-time'];
      $subjectClass  = $_REQUEST['classSubject']; 

      $validationErrorMessage = false;
      if(empty($title) ){
        $titleErrorMessage = requiredMessage();
        $validationErrorMessage = true;
      }  
      if(empty($description) ){
        $descriptionErrorMessage = requiredMessage();
        $validationErrorMessage  = true;
      }
      if(empty($ExamTime) ){
        $examTimeErrorMessage   = requiredMessage();
        $validationErrorMessage = true;
      }  
      if(empty($precticalNo) || empty($theoreticalNo)  ){
        $required  = requiredMessage();
        $validationErrorMessage = true;
      }  
      if(empty($subjectClass) ){
        $classSubjectErrorMessage = requiredMessage();
        $validationErrorMessage   = true;
      }                             
      if( $validationErrorMessage == false ){
        $fetch = $pdo->prepare("SELECT * FROM `".SUBJECT."` WHERE `title` = :title AND `classSubject` = :subjectClass");
        $result = $fetch->execute(['title' => $title, 'subjectClass' => $subjectClass]); 
        $rowCount = $fetch->rowCount();
        if( $rowCount < 1 ){
          $row = [
            'title'            => $title,
            'description'      => $description,
            'precticalNo'      => $precticalNo,
            'theoreticalNo'    => $theoreticalNo,
            'examination_time' => $ExamTime,
            'classSubject'     => $subjectClass

          ];
          $query  = "
            INSERT 
            INTO
              `".SUBJECT."` 
              (`title`,`description`,`prectical-no`,`theoretical-no`,`examination-time`,`classSubject`)
            VALUES
            (:title , :description  , :precticalNo , :theoreticalNo , :examination_time , :classSubject)
          ";
          $stmt     = $pdo->prepare($query);
          $responce = $stmt->execute($row);
          if($responce !== false){
            displayMessage('Data insert successfully' ,'success','check');
          }else{
            displayMessage('Your data is not inserted' ,'danger','ban');
          }
        }else{
          $selectQuery  =  $pdo->query("SELECT * FROM ".CLASSES." WHERE id =".$subjectClass); 
          while( $fetch = $selectQuery->fetch() ){ 
              displayMessage( 'This '.$title.' already include for '.$fetch['title'].'' ,'danger','ban');
          }  
        }
      }    
    }
  }catch(PDOException $e){
    $message = "<h3 class='text-red'><i class='icon fa fa-ban'></i> your record is not insert please contact the developer</h3>";
    echo $e->getMessage();
  } 
?>