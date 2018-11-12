<?php
  try{
    include_once('../db/connection.php');
    include_once('../function.php');
    $message ="";
    if( isset($_REQUEST['add']) ){
      $title         = $_REQUEST['title'];
      $description   = $_REQUEST['description'];
      $precticalNo   = $_REQUEST['prectical-no'];
      $theoreticalNo = $_REQUEST['theoretical-no'];
      $ExamTime      = $_REQUEST['examination-time'];
      $subjectClass  = $_REQUEST['classSubject']; 

      $validationErrorMessage = false;
      if(empty($title) ){
        $titleErrorMessage      = "<p class='text-red validationRequired'><i class='icon fa fa-ban'> </i> Fill the blank field</p>";
        $validationErrorMessage = true;
      }  
      if(empty($description) ){
        $descriptionErrorMessage = "<p class='text-red validationRequired '><i class='icon fa fa-ban'> </i> Fill the blank field</p>";
        $validationErrorMessage  = true;
      }
      if(empty($ExamTime) ){
        $examTimeErrorMessage   = "<p class='text-red validationRequired '><i class='icon fa fa-ban'> </i> Fill the blank field</p>";
        $validationErrorMessage = true;
      }  
      if(empty($precticalNo) ){
        $precticalErrorMessage  = "<p class='text-red  validationRequired'><i class='icon fa fa-ban'> </i> Fill the blank field</p>";
        $validationErrorMessage = true;
      } 
      if(empty($theoreticalNo) ){
        $theoreticalErrorMessage = "<p class='text-red validationRequired '><i class='icon fa fa-ban'> </i> Fill the blank field</p>";
        $validationErrorMessage  = true;
      }  
      if(empty($subjectClass) ){
        $classSubjectErrorMessage = "<p class='text-red validationRequired '><i class='icon fa fa-ban'> </i> Fill the blank field</p>";
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
            $message = "<p class='callout callout-success '><i class='icon fa fa-check'> </i> Data insert successfully</p>";
          }else{
            $message = "<p class='callout callout-ban '><i class='icon fa fa-check'> </i> Data is not insert</p>";
          }
        }else{
          $message = "<p class='callout callout-danger '><i class='icon fa fa-ban'> </i> This ".$title." already Include for ".$subjectClass." </p>"; 
        }
      }    
    }
  }catch(PDOException $e){
    $message = "<h3 class='text-red'><i class='icon fa fa-ban'></i> your record is not insert please contact the developer</h3>";
    echo $e->getMessage();
  } 
?>