<?php 
  include_once('db/connection.php');
  if(isset($_REQUEST['logout'])){
    header('Location:user/login.php');
  }
  include_once('user/userheader.php'); 
?>
<form method="post">
  <!-- Content Header (Page header) -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <div class="box-header">
            <h1>wellcome User:</h1>
          </div>
          <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row">                      
                <div class="col-sm-12">                                     
                  <div class="form-group ">
                    <label>Profile:</label>
                    <p class="">Click the Logout button and back to login page.</p>
                    <button class="btn btn-block btn-primary" name="logout">Logout</button> 
                  </div>                                 
              </div>
            </div>      
          </div>
        </div>
        <!-- box -->
        </div>
      <!-- col-xs-12 -->
      </div>
    <!-- row -->>
  </section>
</form>
<?php include_once('user/userfooter.php'); ?>