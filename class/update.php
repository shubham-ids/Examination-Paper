<?php 
  include_once('phpCode/edit.php');
  include_once('../header.php');
  include_once('../sideBar.php'); 
?>
<form method="post">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Class
        <small><a href="listing.php">Back page</a></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL; ?>index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="listing.php">All Classes</a></li>
        <li class="active">Add Class</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Update of the class</h3>
            </div>
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">                      
                  <div class="col-sm-12">
                    <?php echo $message; ?>
                    <div class="form-group editGroup">
                      <label>Class Name :</label>
                      <input 
                        type="text" 
                        class="form-control editDisableInput"
                        name="title" 
                        placeholder="Enter Class Name" 
                        value="<?php echo $row['title']; ?>" >
                        <?php
                          if(isset( $titleErrorMessage ) == true){
                            echo $titleErrorMessage;
                          } 
                        ?>  
                    </div>
                    <div class="form-group editGroup">
                      <label>Description :</label>
                      <textarea class="form-control editDisableInput" name="description" placeholder="Enter Description"><?php echo $row['description'];; ?></textarea>  
                      <?php
                        if(isset( $descriptionErrorMessage ) == true){
                          echo $descriptionErrorMessage;
                        } 
                      ?>                                          
                    </div>
                    <div class="form-group editGroup">
                      <label>Duration :</label>
                      <input 
                        type="text" 
                        class="form-control editDisableInput" 
                        name="duration" 
                        placeholder="Enter Duration" 
                        value="<?php echo $row['duration']; ?>" >  
                        <?php
                          if(isset( $durationErrorMessage ) == true){
                            echo $durationErrorMessage;
                          } 
                        ?>                                            
                    </div>                                  
                    <div class="form-group ">
                      <button class="btn btn-block btn-primary" name="edit">Submit</button> 
                    </div>                                 
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
<?php include_once('../footer.php'); ?>