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
        <small>Add Chapter </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL; ?>index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Add Chapter</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Add of the new chapter using a subject</h3>
            </div>
            <div class="box-body">
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <?php echo $message; ?>
                <div class="row">                      
                  <div class="col-sm-12">
                    <div class="form-group editGroup">
                      <label>Chapter Name :</label>
                      <input 
                        type="text" 
                        class="form-control editDisableInput" 
                        name="title" 
                        placeholder="Enter Chapter Name" 
                        value="<?php echo empty($title) ? '' : $title; ?>" >
                      <?php
                        if(isset( $titleErrorMessage ) === true){
                          echo $titleErrorMessage;
                        } 
                      ?>      
                    </div>
                    <div class="form-group editGroup">
                      <label>Description :</label>
                      <textarea class="form-control editDisableInput" name="description" placeholder="Enter Description"><?php echo empty($description) ? '' : $description; ?></textarea>
                      <?php
                        if(isset( $descriptionErrorMessage ) === true){
                          echo $descriptionErrorMessage;
                        } 
                        ?>                     
                    </div>                  
                    <div class="form-group editGroup">
                      <label>Limit Marks :</label>
                      <input 
                        type="text" 
                        class="form-control " 
                        name="limit-marks" 
                        placeholder="Enter prectical Number" 
                        value="<?php echo empty($limitMarks) ? '' : $limitMarks; ?>" >
                      <?php
                        if(isset( $limitMarkErrorMessage ) === true){
                          echo $limitMarkErrorMessage;
                        } 
                      ?>                       
                    </div>  
                    <div class="form-group editGroup">
                      <label>Select Subject :</label>
                      <select class="form-control" name="classSubject">
                        <option value="">Subject</option>
                        <?php
                          $subjectClass = (empty($subjectClass)) ? '' : $subjectClass;
                          $selectQuery = $pdo->query( "SELECT `class`.* , `subject`.* FROM `class` , `subject` WHERE `class`.id = `subject`.classSubject");
                          while($fetch = $selectQuery->fetch() ){ ?>
                            <option value="<?php echo $fetch['id']; ?>" <?php echo ($fetch['id'] == $subjectClass) ? " selected='selected' " : ''; ?>>
                              <?php echo $fetch['title'] ."(". $fetch[1].")"; ?>
                            </option>
                        <?php } ?>
                      </select>
                      <?php
                        if(isset( $classSubjectErrorMessage ) === true){
                          echo $classSubjectErrorMessage;
                        } 
                      ?>                   
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
      </section>
      </div>
    <!-- content -->
  </form>
<?php include_once('../footer.php'); ?>