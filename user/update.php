<?php 
  include_once('phpCode/edit.php');
  include_once('../header.php'); 
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">General :</h3>
            </div>
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">                      
                  <div class="col-sm-12">
                    <div class="form-group editGroup">
                      <label>Firstname :</label>
                      <input type="text" class="form-control editDisableInput" placeholder="<?php echo $row['firstname']; ?>" disabled="">
                    </div>
                    <div class="form-group editGroup">
                      <label>Lastname :</label>
                      <input type="text" class="form-control editDisableInput" placeholder="<?php echo $row['lastname']; ?>" disabled="">
                    </div>
                    <div class="form-group editGroup">
                      <label>Username :</label>
                      <input type="text" class="form-control editDisableInput" placeholder="<?php echo $row['username']; ?>" disabled="">
                    </div>
                    <div class="form-group editGroup">
                      <label>Email :</label>
                      <input type="text" class="form-control editDisableInput" placeholder="<?php echo $row['email']; ?>" disabled="">
                    </div>  
                    <div class="form-group editGroup">
                      <label>Activity Logo :</label>
                      <input type="text" class="form-control editDisableInput" placeholder="<?php echo $activityLogo ?>" disabled="">
                    </div>
                    <div class="form-group">
                    <button class="btn btn-block btn-primary">Block</button> 
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