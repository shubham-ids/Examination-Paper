<?php
include_once('../db/connection.php');
include_once('../function.php');
$message = "";
try{
  include_once('../config.php');
// This custom function is used to delete of the multiple records
  if( $multiAction == 'deleted' ){
    foreach( $user as $id ){
      DeleteAction( USER , $id); 
    }
  }   
// This method is used to delete the row in database using PDO 
  if( $task == 'delete' ){
    $id = $_REQUEST['id'];
    DeleteAction( USER , $id); 
  }
// This method is use to Admin can block the multiple users
  if($multiAction == 'block'){
    foreach( $user as $id ){
      $query    = $pdo->prepare("UPDATE `".USER."` SET `status` = :status WHERE id = :id " );
      $responce = $query->execute([
        'status' => $multiAction,
        'id'     => $id
      ]);
      if( $responce !== false ){
        $message = "<p class='alert alert-success'>Multiple user are block Successfull</p>";
      }
    }
  }
// This method is use to Admin can Unblock the multiple users
  if($multiAction == 'unblock'){
    foreach( $user as $id ){
      $query    = $pdo->prepare("UPDATE `".USER."` SET `status` = :status WHERE id = :id " );
      $responce = $query->execute([
        'status' => $multiAction,
        'id'     => $id
      ]);
      if( $responce !== false ){
        $message = "<p class='alert alert-success'>Multiple user are Unblock Successfull</p>";
      }
    }
  }   
// This method is used to search of the value form database   
  if(!empty($searchBar)){
    $queryPart   = "
      WHERE
        `firstname` LIKE :searchBar
      OR
        `email`     LIKE :searchBar
    ";
  } 
// This method is used to Ascending / Descending Order  
  if(!empty($orderBy)){
    $orderPart = " ORDER BY `$orderBy` $order ";
  } 
  $query = "
    SELECT
    SQL_CALC_FOUND_ROWS
     *
    FROM
      `".USER."`
      {$queryPart}
      {$orderPart}
    LIMIT :limitPosition , :record_perpage 
    ";  

  $selectQuery = $pdo->prepare($query);

  if(!empty($searchBar)){
    $selectQuery-> bindValue(':searchBar', '%'.$searchBar.'%');
  }

  // I have used this because
  // PDO was converting the value into string
  $selectQuery-> bindValue(':limitPosition', $limitPosition, PDO::PARAM_INT);
  $selectQuery-> bindValue(':record_perpage', $record_perpage, PDO::PARAM_INT);
  $selectQuery-> execute();
  
  $statement  = $pdo->query('SELECT FOUND_ROWS()');
  $response   = $statement->fetchColumn();

  $totalpages = ceil( $response / $record_perpage );
  $result     = $selectQuery->fetchAll();

  Querystring($totalpages , $currentPage);
}catch(PDOException $e){
    echo "Not display the record contact the developer";
    echo $e->getMessage();
  }
?>