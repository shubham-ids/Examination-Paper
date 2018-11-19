<?php
  try{
    include_once('../db/connection.php');
    include_once('../function.php');
    $message ="";
    $titleErrorMessage ="";
    if( isset($_REQUEST['add']) ){
      $title       = $_REQUEST['title'];
      $description = $_REQUEST['description'];
      $countryId   = $_REQUEST['country_id'];  
      $validationErrorMessage = false;
      if( empty($title) || empty($description) || empty($countryId)){
        $ErrorMessage = "<p class='callout callout-danger '><i class='icon fa fa-ban'> </i> Fill the blank field</p>";
        $validationErrorMessage = true;
      }                               
      if( $validationErrorMessage == false ){
        $fetch = $pdo->prepare("SELECT * FROM `".STATE."` WHERE `title` = :title AND `country_id` = :countryId");
        $result = $fetch->execute(['title' => $title, 'countryId' => $countryId]); 
        $rowCount = $fetch->rowCount();
        if( $rowCount < 1 ){
          $row = [
            'title'        => $title,
            'description'  => $description,
            'countryId'   => $countryId
          ];
          $query  = "
            INSERT 
            INTO
              `".STATE."` 
              (`title`,`description`,`country_id`)
            VALUES
            (:title , :description , :countryId)
          ";
          $stmt     = $pdo->prepare($query);
          $responce = $stmt->execute($row);
          if($responce !== false){
            displayMessage('Data insert successfully' ,'success','check');
          }else{
            displayMessage('Your data is not inserted' ,'danger','ban');
          }
        }else{
           $selectQuery  =  $pdo->query("SELECT `id`,`title` FROM ".COUNTRY." WHERE id =".$countryId);
          while( $fetch = $selectQuery->fetch() ){ 
              displayMessage( 'State name : "'.$title.'" already include for "'.$fetch['title'].'"' ,'danger','ban');
          }  
        }
      }    
    }
    $selectQuery  =  $pdo->query("SELECT `id`,`title` FROM ".COUNTRY);
  }catch(PDOException $e){
    $message = "<h3 class='text-red'><i class='icon fa fa-ban'></i> your record is not insert please contact the developer</h3>";
    echo $e->getMessage();
  } 
?>