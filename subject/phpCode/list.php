<?php
include_once('../db/connection.php');
$message = "";
try{
  $multiAction  = (isset($_REQUEST['multiAction'])) ? $_REQUEST['multiAction'] : '';
  $searchBar    = (isset($_REQUEST['searchBar']) )  ? $_REQUEST['searchBar']   : '';
  $user         = (isset($_REQUEST['users']))       ? $_REQUEST['users']       : '';
  $page         = (isset($_REQUEST['page']) )       ? $_REQUEST['page']        : 1;
  $orderBy      = isset($_REQUEST['order-by'])      ? $_REQUEST['order-by']    : "";
  $order        = isset($_REQUEST['order'])         ? $_REQUEST['order']       : 'DESC';
  $entries      = isset($_REQUEST['showEntries'])   ? $_REQUEST['showEntries'] : '';

  $currentPage  = empty($page)      ? 1  : intval( $page );
  $searchBar    = empty($searchBar) ? '' : $searchBar;
  $entries      = empty($entries)   ? 10 : $entries;
  $currentPage  =($currentPage <= 0) ? 1  : $currentPage;
  
  $record_perpage = $entries;
  $queryPart      = "";
  $orderPart      = "";
  
  $record_perpage = intval($entries);
  $limitPosition  = ( $currentPage - 1) * $record_perpage;
  $queryPart      = "";

// This method is used to multiple record delete in databases    
  if( $multiAction == 'deleted' ){
    foreach(  $user as $id ){
      $query       = "DELETE FROM `".SUBJECT."` WHERE id = :id ";
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
// This method is use to Admin can block the multiple users
  if($multiAction == 'block'){
    foreach( $user as $id ){
      $query    = $pdo->prepare("UPDATE `".SUBJECT."` SET `status` = :status WHERE id = :id " );
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
      $query    = $pdo->prepare("UPDATE `".SUBJECT."` SET `status` = :status WHERE id = :id " );
      $responce = $query->execute([
        'status' => $multiAction,
        'id'     => $id
      ]);
      if( $responce !== false ){
        $message = "<p class='alert alert-success'>Multiple user are Unblock Successfull</p>";
      }
    }
  }   
// This method is used to delete the row in database using PDO 
  if( isset($_REQUEST['task']) && $_REQUEST['task'] == 'delete' ){
    $id = [
      'id' => $_REQUEST['id']
    ];
    $query       = "DELETE FROM `".SUBJECT."` WHERE id = :id ";
    $deleteQuery = $pdo->prepare($query);
    $result      = $deleteQuery->execute($id);
    if( $result !== false ){
      //header('Location: listing.php');
      $message = "<p class='alert alert-success'>Record is delete successfull</p>";
    }else{
      $message = "<p class='alert alert-danger'>Your record is not delete</p>";
    }
  }
// This method is used to search of the value form database   
  if(!empty($searchBar)){
    $queryPart   = "
      WHERE
        `title` LIKE :searchBar
    ";
  } 
// This method is used to Ascending / Descending Order  
  // if(!empty($orderBy)){
  //   $orderPart = " ORDER BY `$orderBy` $order ";
  // } 
  $query = "
    SELECT
    SQL_CALC_FOUND_ROWS
     *
    FROM
      `".SUBJECT."`
      {$queryPart}
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

  if($totalpages != 0 && $currentPage > $totalpages) {
  
    // This method is convert the Querystring to array using parse_str
    // QUERY_STRING are like url:?searchBar=Rahul&page=1 to 2

    parse_str($_SERVER['QUERY_STRING'], $queryArray); 
    $queryArray['page'] = $totalpages;

    // This method is used to convert the ArrayQuery to stringQuery
    // http_build_query is used to generate url-encoded string from the provided array

    $queryString =  http_build_query($queryArray);
    header("Location: ?".$queryString);
  }
}catch(PDOException $e){
    echo "Not display the record contact the developer";
    echo $e->getMessage();
  }
?>