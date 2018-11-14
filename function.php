<?php
/*
 * Function Name : debug
 * parameter     : $input -> find the variable of value
 * return        : false
*/
  function debug($input){
    var_dump($input);
    echo "<pre>";
      print_r($input);
    echo "</pre>";
  }
/*
 * Function Name : DeleteAction
 * Parameter     : $tableName -> write the table name from database
                 : $id        -> Send the delete record  id
 * Return        : true
*/
  function DeleteAction( $tableName , $id){
// This method is used to multiple record delete in databases    
    global $pdo;
    global $message;
   /* $query       = " DELETE FROM `".$tableName."` WHERE id IN (:id) ";
    $deleteQuery = $pdo->prepare($query);
    $results     = $deleteQuery->execute(['id' => implode("','", $ids)  ]);
    if( $results !== false ){
      $message = "<p class='callout callout-success '><i class='icon fa fa-check'> </i> Records delete successfull</p>";
    }else{
      $message = "<p class='callout callout-ban '><i class='icon fa fa-check'> </i> Your multiple Records are not delete !</p>";
    }        
  } */
    $query       = "DELETE FROM `".$tableName."` WHERE id = :id ";
    $deleteQuery = $pdo->prepare($query);
    $results     = $deleteQuery->execute( ['id' => $id] );
    if( $results !== false ){
      $message = "<p class='callout callout-success '><i class='icon fa fa-check'> </i> Record deleted successfully</p>";
    }else{
      $message = "<p class='callout callout-danger '><i class='icon fa fa-ban'></i> Your  Record is not deleted !</p>"; 
    } 
    return true;                 
  }  
/*
 * function Name : orderIcon
 * parameter     : $columnName  -> Mysql table column name
 *               : $customName  -> display the custom head name 
 *               : $order       -> set the default order value assending or dessending
 *               : $currentPage -> current page of the value
 * Return        : true           
*/
  function orderIcon( $columnName , $customName, $order , $currentPage ){ 
    $orderBy = isset($_REQUEST['order-by'])      ? $_REQUEST['order-by']    : "";
  ?>
    <a 
      href="?order-by=<?php echo $columnName; ?>&order=<?php echo $order == 'desc'?'asc':'desc'; ?>&page=<?php echo $currentPage; ?>"
      class="orderLink">
        <?php echo $customName; ?>
    </a>
<?php
    if($orderBy == $columnName){ ?>
      <i class="fa fa-sort-amount-<?php echo $order ?> order"></i>
<?php     
    }
    return true;
 } 
/*
* Function Name : renderTableHead
* parameter     : $tableHeadName -> write the database table column name
                    and write the name from user table head name using in array key value
*               : $odder         -> set the default order value in assending and dessending value
*               : $currentPage   -> set the current page value
* Return        : ture           -> Return the true value when accept the parameter value
                : false          -> Return  the false value when not accept the parameters
*/
  function renderTableHead( $tableHeadName , $order ,$currentPage ){
    echo '<th style="width: 74px"><input type="checkbox" class="checkAll"><i class="countChecked"></i></th>';
    echo '<th>Serial Number</th>';
    foreach($tableHeadName as $key => $value){
 ?>
      <th><?php orderIcon($key , $value , $order , $currentPage); ?></th>
<?php 
    }
    return false;
  }
/*
* Function Name : pagination
* Parameter     : $currentPage -> set the current page value
*               : $order       -> set the default order value in assending and dessending value
*               : $searchName  -> write the search field name
*               : $response    -> Fatch of all record 
*               : $totalpages  -> PerPage of records
* Return        : True
*/ 
  function pagination($currentPage , $record_perpage , $searchName , $response , $totalpages){ ?>
  <div class="row">
    <div class="col-sm-5">
      <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">                    
        Showing 1 to <?php echo $record_perpage; ?> of <?php echo $response; ?> entries
      </div>
    </div>
    <div class="col-sm-7">
      <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">    
        <ul class="pagination">
        <?php
          if( $currentPage  ){ 
            $previous   = $currentPage-1;
            $className  = ($currentPage == 1)? 'disabled' : '';
            $linkOnload = ($currentPage == 1)? '#' : '';
          ?>
            <li class="<?php echo $className; ?>">
              <a 
                href="?searchName=<?php echo $searchName; ?>&multiAction=&page=<?php echo $previous.$linkOnload;?> ">
                Previous</a>
            </li>
         <?php }
            for($j=1; $j <= $totalpages; $j++){ 
              $className  = ($j == $currentPage)? 'active' : '';
              $linkOnload = ($j == $currentPage)? '#' : '';
           ?>
          <li class="<?php echo $className; ?>">
            <a href="?searchName=<?php echo $searchName; ?>&multiAction=&page=<?php echo $j.$linkOnload; ?>"><?php echo $j; ?></a>
          </li>
          <?php } ?>
          <?php  
            if( $currentPage ){
              $next       = $currentPage+1; 
              $next       = ($response == 0)?'#':'';
              $className  = ($currentPage == $totalpages)? 'disabled' : '';
              $className  = ($response == 0)?'disabled':'';
              $linkOnload = ($currentPage == $totalpages)? '#' : '';
              ?>
              <li class="<?php echo $className; ?>">
                <a 
                  href="?searchName=<?php echo $searchName; ?>&multiAction=&page=<?php echo $next.$linkOnload;?>">Next</a>
              </li>
           <?php }  ?>
          </ul> 
        </div>
      </div>
    </div>    
 <?php 
   return true; 
       }
/*
* Function Name : showEnteriesField 
* Parameter     : $fieldname     -> write of the field name
                : $option        -> write of the value in array
                : record_perpage -> Display of the record
* Return        : true                
*/
 function showEnteriesField($fieldname , $option , $record_perpage){ ?>
  <div class="dataTables_length col-sm-4" id="example1_length">
    <label>Show 
      <select name="<?php echo $fieldname; ?>" aria-controls="example1" class="form-control input-sm">
        <?php foreach( $option as  $value ){ ?>
          <option 
            value="<?php echo $value; ?>" <?php echo ($record_perpage == $value) ? "selected='selected'" : "" ; ?>>
            <?php echo $value; ?>
          </option>
        <?php } ?>  
      </select> entries
      <button class="btn btn-sm btn-primary btn-create" id="">Action</button>
    </label>
  </div>
<?php return true; } ?> 
<?php 
/*
 * Function Name : searchField
 * Parameter     : $fieldName -> name of the field
 * Return        : true
 */ 
  function searchField($fieldName){ ?>      
    <div class="col-sm-4">
      <div id="example1_filter" class="dataTables_filter">
        <label>Search:
          <div class="input-group input-group-sm">
            <input 
              type="search" 
              class="form-control input-sm"
              value="<?php echo isset($_REQUEST[$fieldName]) ? $_REQUEST[$fieldName] : '' ;?>" 
              placeholder="search.." 
              aria-controls="" 
              name="<?php echo $fieldName; ?>">
            <span class="input-group-btn">
              <button class="btn btn-info btn-flat"  type="submit" name="search">Go!</button>
            </span>
          </div>
        </label>
      </div>
    </div>
<?php return true;} ?> 
<?php 
/*
 * Function Name : bulkAction
 * Parameter     : $fieldName -> write of the field name
                 : $addField  -> Add new option value
 * Return        : ture                
 */
  function bulkAction($fieldName , $addField){ ?>
    <div class="dataTables_length col-sm-4" id="example1_length">
      <label>Action :
        <select aria-controls="example1" name="<?php echo $fieldName; ?>" class="form-control input-sm bulkaction">
          <option value="">Select</option>
          <?php foreach( $addField as $key => $value ){ ?>
            <option value="<?php echo $key; ?>"><?php echo $value ?></option>
          <?php } ?>  
        </select>
        <button class="btn btn-sm btn-primary btn-create" id="actionButton">Action</button>
      </label>
    </div> 
<?php  return true;} ?>  