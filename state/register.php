<?php 
  include_once('phpCode/add.php');
  include_once('../header.php');
  include_once('../sideBar.php'); 
?>
<form method="post">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Add State </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL; ?>index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add State</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add the new State using country</h3>
            </div>
            <div class="box-body">
              <?php
                if(isset( $ErrorMessage ) == true){
                  echo $ErrorMessage;
                } 
                echo $message;
              ?>         
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">                      
                  <div class="col-sm-12">
                    <?php 
                      addInputField('State :','title','Enter State Name',empty($title) ? '' : $title);
                      addTextareaField('Description :','description','Enter Description',empty($description) ? '' : $description);?>
                      <div class="form-group editGroup">
                        <label>Select Country :</label>
                        <select class="form-control" name="country_id">
                          <option value="">Select</option>
                          <?php
                            $countryId = empty($countryId) ? '' : $countryId;
                            while( $fetch = $selectQuery->fetch() ){  ?>
                            <option value="<?php echo $fetch['id']; ?>" <?php echo ($fetch['id'] == $countryId) ? " selected='selected' " : ''; ?> >
                                <?php echo $fetch['title']; ?>                
                            </option>
                          <?php } ?>
                        </select>                  
                      </div>  
                     <?php addButtonField('add','Submit'); ?>                                                             
                  </div>
                </div>
              </div>      
            </div>
          </div>
          <!-- box -->
          </div>
        <!-- col-xs-12 -->
        </div>
      <!-- row -->
      </section>
      </div>
    <!-- content -->
</form>
<?php include_once('../footer.php'); ?>+
-