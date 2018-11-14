<?php
include_once('../db/connection.php');
include_once('../function.php');
$message = "";
try{
  include('../config.php');
// This custom function is used to delete of the multiple records
  if( $multiAction == 'deleted' ){
    foreach( $user as $id ){
      DeleteAction( CLASSES , $id); 
    }
  }   
// This method is used to delete the row in database using PDO 
  if( $task == 'delete' ){
    $id = $_REQUEST['id'];
    DeleteAction( CLASSES , $id); 
  }
// This method is used to search of the value form database   
  if(!empty($searchBar)){
    $queryPart   = "
      WHERE
        `title` LIKE :searchBar
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
      `".CLASSES."`
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