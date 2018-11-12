<?php
  try{
    include_once('../db/connection.php');
    include_once('../function.php');
    $message ="";
    if( isset($_REQUEST['add']) ){
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
              (`title`,`description`,`limit-marks`,`subject`)
            VALUES
            (:title , :description  , :limitMarks, :classSubject)
          ";
          $stmt     = $pdo->prepare($query);
          $responce = $stmt->execute($row);
          if($responce !== false){
            $message = "<p class='callout callout-success '><i class='icon fa fa-check'> </i> Data insert successfully</p>";
          }else{
            $message = "<p class='callout callout-ban '><i class='icon fa fa-check'> </i> Data is not insert !</p>";
          }
        }else{
          $message = "<p class='callout callout-danger '><i class='icon fa fa-ban'> </i> The ".$title." are already Include !</p>"; 
        }
      }    
    }
  }catch(PDOException $e){
    $message = "<h3 class='text-red'><i class='icon fa fa-ban'></i> your record is not insert please contact the developer</h3>";
    echo $e->getMessage();
  } 
?>