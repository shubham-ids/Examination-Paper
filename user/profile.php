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
        <?php echo $row['firstname']; ?>
        <small>Profile</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL; ?>index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo URL; ?>user/listing.php">Useres Profile</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">General :</h3>
            </div>
            <?php echo $message; ?>
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">                      
                  <div class="col-sm-12">
                    <div class="form-group editGroup">
                      <label>Firstname :</label>
                      <input type="text" class="form-control editDisableInput" name="firstname" value="<?php echo $row['firstname']; ?>" >
                      <div class = "serverErrorMessage">
                        <?php
                          if(isset( $firstnameErrorMessage ) === true){
                            echo $emailErrorMessage;
                          } 
                        ?>
                      </div>        
                    </div>
                    <div class="form-group editGroup">
                      <label>Lastname :</label>
                      <input type="text" class="form-control editDisableInput" name="lastname" value="<?php echo $row['lastname']; ?>" >
                      <div class = "serverErrorMessage">
                        <?php
                          if(isset( $lastnameErrorMessage ) === true){
                            echo $emailErrorMessage;
                          } 
                        ?>
                      </div>                       
                    </div>
                    <div class="form-group editGroup">
                      <label>Username :</label>
                      <input type="text" class="form-control editDisableInput" name="username" value="<?php echo $row['username']; ?>" >
                      <div class = "serverErrorMessage">
                        <?php
                          if(isset( $usernameErrorMessage ) === true){
                            echo $emailErrorMessage;
                          } 
                        ?>
                      </div>                       
                    </div>
                    <div class="form-group editGroup">
                      <label>Email :</label>
                      <input type="text" class="form-control editDisableInput" name="email" value="<?php echo $row['email']; ?>" >
                      <div class = "serverErrorMessage">
                        <?php
                          if(isset( $emailErrorMessage ) === true){
                            echo $emailErrorMessage;
                          } 
                        ?>
                      </div>                       
                    </div>  
                    <div class="form-group editGroup">
                      <label>Activity Logo :</label>
                      <input type="text" class="form-control editDisableInput" value="<?php echo $activityLogo ?>" disabled="">
                    </div>  
                    <div class="form-group editGroup">
                      <label>Status Logo :</label>
                      <input type="text" class="form-control editDisableInput" value="<?php echo $row['status']; ?>" disabled="">
                    </div>    
                    <div class="form-group editGroup">
                      <label> Block User</label>
                      <?php
                        if( $row['status'] == 'block' ){
                          $check = 'checked';
                        } 
                      ?>
                      <input type="checkbox" id="statusUser" name="status" value="block" <?php echo isset($check) ? $check :''; ?> > 
                      <p class="userstatus"></p>
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