<?php
include_once('../db/connection.php');
$message = "";
try{
 $multiDelete = (isset($_REQUEST['multiAction'])) ? $_REQUEST['multiAction'] : '';
 $userDelete  = (isset($_REQUEST['users']))       ? $_REQUEST['users']       : '';

// This method is used to multiple record delete in databases    
  if( $multiDelete == 'deleted' ){
    foreach(  $userDelete as $id ){
      $query       = "DELETE FROM `".USER."` WHERE id = :id ";
      $deleteQuery = $pdo->prepare($query);
      $results     = $deleteQuery->execute(['id' => $id]);
      if( $results !== false ){
        $message = "<p class='alert alert-success'>Records are deleted successfull</p>";
      }else{
        $message = "<p class='alert alert-danger'>Email is already include!</p>"; 
      }        
    }        
    $message =  "<p class='alert alert-danger'>Please select atleast one checkbox</p>";
  }

//This method is used to delete the multiple of record without loop
  // if( $multiDelete  == 'deleted' ){
  //   $query = "DELETE FROM `".USER."` WHERE id IN (':id') ";

  //   $deleteQuery = $pdo->prepare($query);
  //   $response    = $deleteQuery->execute(['id' =>  implode("','", $_REQUEST['users']) ]);

  //   if($response !== false){
  //     $message = "<p class='alert alert-success'>Your records are delete successfull</p>";
  //   }else{
  //     $message = "<p class='alert alert-danger'>Your record is not delete</p>";
  //   }  
  // }
// This method is used to delete the row in database using PDO 
  if( isset($_REQUEST['task']) && $_REQUEST['task'] == 'delete' ){
    $id = [
      'id' => $_REQUEST['id']
    ];
    $query       = "DELETE FROM `".USER."` WHERE id = :id ";
    $deleteQuery = $pdo->prepare($query);
    $result      = $deleteQuery->execute($id);
    if( $result !== false ){
      //header('Location: listing.php');
      $message = "<p class='alert alert-success'>Record is delete successfull</p>";
    }else{
      $message = "<p class='alert alert-danger'>Your record is not delete</p>";
    }
  }     
  $query = "SELECT * FROM ".USER;
  $selectQuery  = $pdo->prepare($query);
  $selectQuery->execute();
}catch(PDOException $e){
    echo "Not display the record contact the developer";
    //echo $e->getMessage();
  }
?>