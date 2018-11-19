<?php
  try{
    include_once('../db/connection.php');
    include_once('../function.php');
    $message ="";
    $titleErrorMessage ="";
    if( isset($_REQUEST['add']) ){
      $title       = $_REQUEST['title'];
      $description = $_REQUEST['description'];
      $countryId   = $_REQUEST['Country_id'];
      $stateId     = $_REQUEST['state_id'];
      $districtId  = $_REQUEST['district_id'];  
      $validationErrorMessage = false;
      if( empty($title) || empty($description) || empty($districtId) || empty($countryId) || empty($stateId)){
        $ErrorMessage = "<p class='callout callout-danger '><i class='icon fa fa-ban'> </i> Fill the blank field</p>";
        $validationErrorMessage = true;
      }                               
      if( $validationErrorMessage == false ){
        $fetch = $pdo->prepare("SELECT * FROM `".CITY."` WHERE `title` = :title AND `district_id` = :districtId");
        $result = $fetch->execute(['title' => $title, 'districtId' => $districtId]); 
        $rowCount = $fetch->rowCount();
        if( $rowCount < 1 ){
          $row = [
            'title'        => $title,
            'description'  => $description,
            'countryId'    => $countryId,
            'stateId'      => $stateId,
            'districtId'   => $districtId
          ];
          $query  = "
            INSERT 
            INTO
              `".CITY."` 
              (`title`,`description` ,`country_id`,`state_id`,`district_id`)
            VALUES
            (:title , :description ,:countryId , :stateId , :districtId )
          ";
          $stmt     = $pdo->prepare($query);
          $responce = $stmt->execute($row);
          if($responce !== false){
            displayMessage('Data insert successfully' ,'success','check');
          }else{
            displayMessage('Your data is not inserted' ,'danger','ban');
          }
        }else{
           $selectQuery  =  $pdo->query("SELECT `id`,`title` FROM ".DISTRICT." WHERE id =".$districtId);
          while( $fetch = $selectQuery->fetch() ){ 
              displayMessage( 'City name : "'.$title.'" already include for "'.$fetch['title'].'"' ,'danger','ban');
          }  
        }
      }    
    }
    $selectQuery  =  $pdo->query("SELECT `id`,`title` FROM ".DISTRICT);
  }catch(PDOException $e){
    $message = "<h3 class='text-red'><i class='icon fa fa-ban'></i> your record is not insert please contact the developer</h3>";
    echo $e->getMessage();
  } 
?>