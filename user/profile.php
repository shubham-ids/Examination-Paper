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
                      <input type="text" class="form-control editDisableInput" value="<?php echo $row['firstname']; ?>" >
                    </div>
                    <div class="form-group editGroup">
                      <label>Lastname :</label>
                      <input type="text" class="form-control editDisableInput" value="<?php echo $row['lastname']; ?>" >
                    </div>
                    <div class="form-group editGroup">
                      <label>Username :</label>
                      <input type="text" class="form-control editDisableInput" value="<?php echo $row['username']; ?>" >
                    </div>
                    <div class="form-group editGroup">
                      <label>Email :</label>
                      <input type="text" class="form-control editDisableInput" value="<?php echo $row['email']; ?>" >
                    </div>  
                    <div class="form-group editGroup">
                      <label>Activity Logo :</label>
                      <input type="text" class="form-control editDisableInput" value="<?php echo $activityLogo ?>" >
                    </div>  
                    <div class="form-group editGroup">
                      <label>Status Logo :</label>
                      <input type="text" class="form-control editDisableInput" value="<?php echo $status; ?>" >
                    </div>                                      
                    <div class="form-group ">
                      <label>BLock / Unblock User:</label>
                      <p class="">Click the submit button then user is blocked And click again submit button then user is unblocked.</p>
                      <button class="btn btn-block btn-primary" name="UserBlock">Submit</button> 
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
      </div>
    <!-- content -->
    </section>
  </div>
</form>
<?php include_once('../footer.php'); ?>