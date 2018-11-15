<?php
  try{
    include_once('../db/connection.php');
    include_once('../function.php');
    $message ="";
    if( isset($_REQUEST['add']) ){
      $title       = $_REQUEST['title'];
      $description = $_REQUEST['description'];
      $duration    = $_REQUEST['duration'];
      $validationErrorMessage = false;
      if(empty($title) || empty($description) || empty($duration) ){
        $ErrorMessage = "<p class='callout callout-danger '><i class='icon fa fa-ban'> </i> Fill the blank field</p>";
        $validationErrorMessage = true;
      }  
      if( $validationErrorMessage == false ){
        $fetch = $pdo->prepare("SELECT * FROM `".CLASSES."` WHERE title = :title ");
        $result = $fetch->execute(['title' => $title]); 
        $rowCount = $fetch->rowCount();
        if( $rowCount < 1 ){
          $row = [
            'title'       => $title,
            'description' => $description,
            'duration'    => $duration
          ];
          $query  = "INSERT INTO `".CLASSES."` (`title`,`description`,`duration`)VALUES(:title , :description , :duration)";
          $insert = $pdo->prepare($query);
          $responce = $insert->execute( $row );
          if($responce !== false){
            displayMessage('Data insert successfully' ,'success','check');
          }else{
            displayMessage('Your data is not inserted' ,'danger','ban');
          }
        }else{
          displayMessage( 'Title name is '.$title.' already exites' ,'danger','ban'); 
        }
      }    
    }
  }catch(PDOException $e){
    $message = "<h3 class='text-red'><i class='icon fa fa-ban'></i> your record is not insert please contact the developer</h3>";
    //echo $e->getMessage();
  } 
?>