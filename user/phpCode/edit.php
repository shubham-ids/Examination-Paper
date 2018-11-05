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
  $status = empty($_REQUEST['status']) ? 'Unblock' : $status;
  $id     = $_REQUEST['id'];
  if(isset($_REQUEST['UserBlock'])){     
    $selectQuery = $pdo->prepare( " SELECT `status` FROM ".USER." WHERE id = :id" );
    $result      = $selectQuery->execute( [ 'id' => $id ]);
    $row         = $selectQuery->fetch();

    if( $row['status'] == 'block' ){
      $status = 'unblock';
      $rows = [
      'id'     => $id, 
      'status' => $status
      ];    
      $block    = $pdo->prepare("UPDATE `".USER."` SET `status` = :status WHERE id = :id ");
      $responce = $block->execute($rows);
      if($responce !== false){
        $message = "<p class='alert alert-success'>User is Unblocked!</p>";
      }
    }else{ // row == 1
      $status = 'block';
      $rows = [
      'id'     => $id, 
      'status' => $status
      ];    
      $block    = $pdo->prepare("UPDATE `".USER."` SET `status` = :status WHERE id = :id ");
      $responce = $block->execute($rows);
      if($responce !== false){
        $message = "<p class='alert alert-success'>User is blocked!</p>";
      }     
    }
  }
// This method is used to fatch the data in databade using Id
  $query = "SELECT * FROM ".USER." WHERE id = :id";
  $selectQuery = $pdo->prepare($query);
  $selectQuery->execute([ 'id' => $id] );
  $row = $selectQuery->fetch();  
  $activityLogo = (!empty($row['activity'])) ? $row['activity'] : 'deactivate';

// echo "<pre>";
//   print_r($row);
// echo "</pre>";

}catch(PDOException $e){
    echo "Not display the record contact the developer";
    //echo $e->getMessage();
}
?>