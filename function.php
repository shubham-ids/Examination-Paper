<?php
// This method is used to Constant Variable name
  define('URL','http://localhost/Examination-Paper/');
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
 * Function Name : DependentTable
 * Parameter     : $requestName -> Isme server se jo request name aai hai uskol define krna hai.
                 : $tableName -> Enter the table name
                 : $databaseColumn -> Enter the table in which include column name 
                 : $name -> Enter the select dropdown field name
 * Return        : true
 */
function DependentTable($requestName , $tableName , $databaseColumn , $name ){
  global $pdo;
  if(!empty($_REQUEST[$requestName])){
    $State  =  $pdo->prepare( "SELECT * FROM `".$tableName."` WHERE `".$databaseColumn."` = ".$_REQUEST[$requestName] );
    $res    = $State->execute();
    $rslt = $State->fetchAll();
    echo "<option value=''>Select ".$tableName."</option>";
    foreach( $rslt as $fetch ){ ?>
      <option value="<?php echo $fetch['id']; ?>" <?php echo ($name == $fetch['id']) ? 'selected ="selected" ' : '' ?>><?php echo $fetch['title']; ?></option>
<?php 
    }
  } 
  return true; 
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
* Function Name : Querystring
* Parameter     : $totalpages  -> PerPage of records
                : $currentPage -> current page of the value
* Return        : Empty
*/
function Querystring($totalpages , $currentPage  ){
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
}  

/*
* Function Name : displayMessage
* Parameter     : $messsage -> app output message ko kaha shiw krwana chahte ho
                : $input    -> kya show krwana chahte ho
                : $msgIcon  -> Display the message icon
* Return        : $message                
*/
  function displayMessage($input , $msgStatus , $msgIcon){
    global $message;
    return $message = "<p class='callout callout-".$msgStatus."'><i class='icon fa fa-".$msgIcon."'></i> " .$input."</p>"; 
  }

/*
 * Function Name : requiredMessage
 * parameter     : null
 * Return        : blankFieldMessage
*/  
  function requiredMessage(){
    return $blankFieldMessage = "<p class='text-red validationRequired'><i class='icon fa fa-ban'> </i> Fill the blank field</p>";
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
 *  Function Name : addSelectFIeld()
 *  Parameters    : $lableName -> Display of the name for lable tag
                  : $name -> Enter the field of the name 
                  : $id -> Enter the name of ID
 *  Return        : Empty                
*/
  function addSelectFIeld($lableName , $name ,$id){ ?>
    <div class="form-group editGroup" >
      <label><?php echo $lableName ?> :</label>
      <select class="form-control" name="<?php echo $name; ?>" id="<?php echo $id ?>" disabled="">
        <option value="">Select</option>
      </select>                  
    </div> 
<?php     
  } 
/*
 * Function Name : countryFetchData()
 * Parameters    : $country -> This parameter is used to enter the field name
 * Return        : Empty
*/
  function countryFetchData($country){
    global $pdo; 
?>
    <div class="form-group editGroup">
      <label>Country :</label>
      <select class="form-control" name="Country_id" id="country">
        <option value="">Select</option>
        <?php
           $query = "SELECT * FROM ".COUNTRY;
           $Cntry  =  $pdo->prepare($query);
           $Cntry->execute(); 
          while( $fetch = $Cntry->fetch() ){ ?>
        <option value="<?php echo $fetch['id']; ?>" <?php echo ($country == $fetch['id']) ? 'selected="selected"' : ''  ?> >
            <?php echo $fetch['title']; ?>                
        </option>
      <?php } ?>
      </select>                  
  </div>
<?php                      
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
              $next       = ($response == 0)?'#':'';
              $next       = $currentPage+1; 
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
      <select name="<?php echo $fieldname; ?>" id="dataEntries" aria-controls="example1" class="form-control input-sm">
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
<?php
/*
 * Function Name : addLabelField
 * Parameters    : $iconName -> Enter only icon last name eg:-> fa fa-"falg" <- write only double coat name
                 : $fieldLableName -> Display of the name
                 : $url -> Enter your file path eg:-> folder/filename.php
 * Return        : true
*/
  function addLabelField($iconName,$fieldLableName , $url){ ?>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-<?php echo $iconName; ?>"></i> <span><?php echo $fieldLableName; ?></span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <?php foreach($url as $key => $value){ ?>
          <li><a href="<?php echo URL; ?><?php echo $value; ?>"><i class="fa fa-circle-o"> </i><?php echo $key; ?></a></li>
        <?php } ?>
      </ul>
    </li> 
<?php return true;} ?>  
<?php
/*
 * Function Name : addInputField
 * Parameter     : $LableName -> Display of the lable name
                 : $fieldName -> Enter field name
                 : placeholder-> Enter Placeholder
 * Return        : true                
*/
function addInputField($LableName,$fieldName,$placeholder,$value){ ?>
  <div class="form-group editGroup">
    <label><?php echo $LableName; ?></label>
    <input 
      type="text" 
      class="form-control editDisableInput"
      name="<?php echo $fieldName; ?>" 
      placeholder="<?php echo $placeholder; ?>" 
      value="<?php echo $value; ?>" >  
  </div>
<?php return true;} ?>
<?php
/*
 * Function Name : addTextareaField
 * Parameter     : $LableName -> Display of the lable name
                 : $fieldName -> Enter field name
                 : placeholder-> Enter Placeholder
 * Return        : true  
*/ 
  function addTextareaField($LableName,$fieldName,$placeholder,$value ){ ?>
    <div class="form-group editGroup">
      <label><?php echo $LableName; ?></label>
      <textarea 
        class="form-control editDisableInput" 
        name="<?php echo $fieldName; ?>" 
        placeholder="<?php echo $placeholder; ?>"><?php echo $value; ?></textarea>                     
    </div>
<?php return true;} ?>
<?php
/*
* Function Name : addButtonField
* Parameter     : $fieldName -> Enter field name
                : $displayName -> Show displayName
* Return        : true                
*/
  function addButtonField($fieldName,$displayName){ ?>
    <div class="form-group ">
      <button class="btn btn-block btn-primary" name="<?php echo $fieldName; ?>"><?php echo $displayName; ?></button> 
    </div>  
<?php return true;} ?>