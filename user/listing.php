<?php 
  include_once('phpCode/list.php');
  include_once('../header.php'); 
?>
<form method="get">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Table of records</h3>
            </div>
            <?php echo $message; ?>
            <!-- /.box-header -->
            <div class="box-body" >
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">                      
                  <div class="col-sm-8">
                  <!--  <form> -->
                      <div class="dataTables_length col-sm-4" id="example1_length">
                        <label>
                          <select aria-controls="example1" name="multiAction" class="form-control input-sm">
                            <option value="">Select</option>
                            <option value="deleted">Delete</option>
                          </select>
                          <button class="btn btn-sm btn-primary btn-create" id="actionButton">Action</button>
                        </label>
                      </div>   
                   <!-- </form>  -->             
                    <div class="dataTables_length col-sm-4" id="example1_length">
                      <label>Show 
                        <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                          <option value="10">10</option>
                          <option value="25">25</option>
                          <option value="50">50</option>
                          <option value="100">100</option>
                        </select> entries
                      </label>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div id="example1_filter" class="dataTables_filter">
                      <label>Search:<input type="search" class="form-control input-sm" placeholder="" aria-controls="example1"></label>
                    </div>
                  </div>
                </div>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th class="actionIcon" align="center">Action&nbsp&nbsp<em class="fa fa-cog"></em></th>
                      <th><input type="checkbox" class="checkAll"></th>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Username</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php 
                    foreach( $selectQuery as $row ){ ?>
                      <tr>
                        <td align="left">
                          <a 
                            class = "btn btn-default"
                            title = "Edit">
                            <em class="fa fa-pencil"></em>
                          </a>
                          <a 
                            class = "btn btn-danger deleteAjax"
                            id    = "<?php echo $row['id']; ?>"
                            data-placement = "right">
                            <em class="fa fa-trash"></em>
                          </a>
                        </td>
                        <td><input type="checkbox" name="users[]" class="checkItem" value="<?php echo $row['id']; ?>"></td>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                      </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <th><input type="checkbox" class="checkAll"></th>
                      <th>Firstname</th>
                      <th>Lastname</th>
                      <th>Username</th>
                      <th>Email</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!--.data wrapper -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</form>  
<?php include_once('../footer.php'); ?>