<?php 
  include_once('db/connection.php');
  if(isset($_REQUEST['back'])){
    header('Location:user/register.php');
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
            <h1>Terms Condition:</h1>
          </div>
          <div class="box-body">
            <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
              <div class="row">                      
                <div class="col-sm-12">                                     
                  <div class="form-group ">
                    <label>Condition</label>
                      <p>- Terms Condition -</p>
                      <p>User can click the terms condition then goto profile page.</p>
                      <p>User can not click the terms conditon then user can not goto the profile page.</p>
                    <button class="btn btn-block btn-primary" name="back">Back Page</button> 
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