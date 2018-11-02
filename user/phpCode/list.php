<?php
include_once('../db/connection.php');
$message = "";
try{

//This method is used to delete the multiple of record without loop
  
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