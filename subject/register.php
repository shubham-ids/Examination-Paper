<?php 
  //include_once('phpCode/edit.php');
  include_once('../header.php');
  include_once('../sideBar.php'); 
?>
<form method="post">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <small>Add Subject </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL; ?>index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Subject</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">General :</h3>
            </div>
            <?php //echo $message; ?>
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">                      
                  <div class="col-sm-12">
                    <div class="form-group editGroup">
                      <label>Title :</label>
                      <input type="text" class="form-control editDisableInput" name="title" placeholder="Enter Title" value="" >
                      <div class = "serverErrorMessage">
                        <?php
                          if(isset( $titleErrorMessage ) === true){
                            echo $emailErrorMessage;
                          } 
                        ?>
                      </div>        
                    </div>
                    <div class="form-group editGroup">
                      <label>Description :</label>
                      <textarea class="form-control editDisableInput" name="description" placeholder="Enter Description"></textarea>
                      <div class = "serverErrorMessage">
                        <?php
                          if(isset( $descriptionErrorMessage ) === true){
                            echo $emailErrorMessage;
                          } 
                        ?>
                      </div>                       
                    </div>
                    <div class="form-group editGroup">
                      <label>Exam Time :</label>
                      <input type="text" class="form-control editDisableInput" name="examination-time" placeholder="Enter Title" value="" >
                      <div class = "serverErrorMessage">
                        <?php
                          if(isset( $descriptionErrorMessage ) === true){
                            echo $emailErrorMessage;
                          } 
                        ?>
                      </div>                       
                    </div>                  
                    <div class="form-group editGroup">
                      <label>Marks :</label>
                      <input type="text" class="form-control " name="prectical-no" placeholder="Enter prectical Number"   value="" >
                      <input type="text" class="form-control " name="theoretical-no" placeholder="Enter Theoretical Number" value="" >
                      <div class = "serverErrorMessage">
                        <?php
                          if(isset( $durationErrorMessage ) === true){
                            echo $emailErrorMessage;
                          } 
                        ?>
                      </div>                       
                    </div> 
                    <div class="form-group editGroup">
                      <label>Select Class :</label>
                      <select class="form-control">
                        <option>option 1</option>
                        <option>option 2</option>
                        <option>option 3</option>
                        <option>option 4</option>
                        <option>option 5</option>
                      </select>
                    </div>                                                    
                    <div class="form-group ">
                      <button class="btn btn-block btn-primary" name="add">Submit</button> 
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