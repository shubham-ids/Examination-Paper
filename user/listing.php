<?php 
  include_once('phpCode/list.php');
  include_once('../header.php'); 
  include_once('../sideBar.php');
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
        <li><a href="<?php echo URL; ?>index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User Profiles</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users of records</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" >
              <div id="outputMessage">
                <?php echo $message; ?>
              </div> 
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">                      
                  <div class="col-sm-8">
                  <!--  <form> -->
                    <?php
                      $addField = [
                          'deleted' => 'Delete',
                          'block'   => 'Block',
                          'unblock' => 'Unblock'
                        ];
                      bulkAction('multiAction' , $addField);
                    ?>
                    <?php
                      $optionFieldValue = [
                        '10' => '10',
                        '20' => '20',
                        '30' => '30'
                      ];
                      showEnteriesField('showEntries' , $optionFieldValue , $record_perpage);
                    ?>
                  </div>
                  <?php searchField('searchBar'); ?>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <?php
                            $tableHeadName = [
                              'firstname'        => 'First Name',
                              'lastname'  => 'Last Name',
                              'username' => 'User Name',
                              'email'  => 'Email',
                              'activity'    => 'Activity',
                              'status' => 'Status'
                            ];
                            renderTableHead( $tableHeadName , $order , $currentPage);
                          ?>                                                    
                          <th class="actionIcon" align="center">Action&nbsp&nbsp<em class="fa fa-cog"></em></th>              
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          if(!empty($searchBar)){
                            if($response == "0"){
                              $message = "<p class='text-red'>No matching records found</p>";                            
                        ?>
                        <tr class="odd">
                          <td class="dataTables_empty text-center" colspan="9" valign="top">
                            <?php echo $message; ?>
                          </td>
                        </tr>
                        <?php 
                          }
                            }   
                        ?>
                      <?php 
                        foreach( $result as $row ){ ?>
                          <tr>
                            <td><input type="checkbox" name="users[]" class="checkItem" value="<?php echo $row['id']; ?>"></td>
                            <td><?php echo ++$limitPosition; ?></td>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td>
                              <?php
                                 $activityLogo = (empty($row['activity']))    ? 'Deactivate' : $row['activity'] ;  
                                 echo $activityLogo; 
                              ?>
                            </td>
                            <td class="statusAction">
                              <?php 
                                $status = empty($row['status']) ? 'unblock' : $row['status']; 
                                echo $status;
                              ?>  
                            </td>
                            <td align="left">
                              <a 
                                href  = "profile.php?task=profile&id=<?php echo $row['id']; ?>"
                                class = "btn btn-default"
                                title = "profile">
                                <em class="fa fa-pencil"></em>
                              </a>
                              <a 
                                title  = "Delete" 
                                class  = "btn btn-danger deleteAjax"
                                id     = "<?php echo $row['id']; ?>">
                                <em class="fa fa-trash"></em>
                              </a>
                            </td>                            
                          </tr>
                      <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <?php renderTableHead( $tableHeadName , $order , $currentPage); ?>
                          <th class="actionIcon" align="center">Action&nbsp&nbsp<em class="fa fa-cog"></em></th>
                        </tr>
                      </tfoot>
                    </table>               
                  </div>
                  <!-- col-sm-12-->
                </div><!-- row -->
               <?php pagination($currentPage , $record_perpage , $searchBar , $response , $totalpages); ?>
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