<?php
  try{
    include_once('../db/connection.php');
    include_once('../function.php');
    $message ="";
    $output ="";
    $titleErrorMessage ="";
    if( isset($_REQUEST['add']) ){
      $title       = $_REQUEST['title'];
      $description = $_REQUEST['description'];
      $stateId     = $_REQUEST['state_id']; 
      $countryId   = $_REQUEST['Country_id'];
      $validationErrorMessage = false;
      if( empty($title) || empty($description) || empty($stateId) || empty($countryId)){
        $ErrorMessage = "<p class='callout callout-danger '><i class='icon fa fa-ban'> </i> Fill the blank field</p>";
        $validationErrorMessage = true;
      }                               
      if( $validationErrorMessage == false ){
        $fetch = $pdo->prepare("SELECT * FROM `".DISTRICT."` WHERE `title` = :title AND `state_id` = :stateId");
        $result = $fetch->execute(['title' => $title, 'stateId' => $stateId]); 
        $rowCount = $fetch->rowCount();
        if( $rowCount < 1 ){
          $row = [
            'title'       => $title,
            'description' => $description,
            'stateId'     => $stateId,
            'countryId'   => $countryId
          ];
          $query  = "
            INSERT 
            INTO
              `".DISTRICT."` 
              (`title`,`description`,`state_id`,`country_id`)
            VALUES
            (:title , :description , :stateId , :countryId)
          ";
          $stmt     = $pdo->prepare($query);
          $responce = $stmt->execute($row);

          if($responce !== false){
            displayMessage('Data insert successfully' ,'success','check');
          }else{
            displayMessage('Your data is not inserted' ,'danger','ban');
          }
        }else{
          debug($_REQUEST);
           $selectQuery =  $pdo->query("SELECT `id`,`title` FROM ".STATE." WHERE id =".$stateId);
          while( $fetch = $selectQuery->fetch() ){ 
              displayMessage( 'District name : "'.$title.'" already include for "'.$fetch['title'].'"' ,'danger','ban');
          }  
        }
      }    
    }      
  }catch(PDOException $e){
    $message = "<h3 class='text-red'><i class='icon fa fa-ban'></i> your record is not insert please contact the developer</h3>";
    echo $e->getMessage();
  } 
?>