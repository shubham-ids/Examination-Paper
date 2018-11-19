<?php
include('db/connection.php');
if(!empty($_REQUEST['CountryId'])){
  $state_id = isset($_REQUEST['state_id'])?$_REQUEST['state_id'] : '';
  $State  =  $pdo->prepare( "SELECT * FROM `".STATE."` WHERE `country_id` = ".$_REQUEST['CountryId'] );
  $res    = $State->execute();
  $rslt = $State->fetchAll();
  foreach( $rslt as $fetch ){ ?>
    <option 
    value="<?php echo $fetch['id']; ?>" <?php echo ($fetch['id'] == $state_id) ? " selected='selected' " : ''; ?>><?php echo $fetch['title'] ?></option>
<?php  }
}
?>  