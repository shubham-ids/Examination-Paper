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
                          <option value = "">Select</option>
                          <option value = "deleted"> Delete </option>
                          <option value = "block">   Block  </option>
                          <?php 
                              $fetch = $selectQuery->fetch();
                              echo "<pre>";
                                print_r( $fetch );
                              echo "</pre>";
                              if($rowStatus['status'] == 'block'){ ?>
                              <option value = "block">unblock</option>
                           <?php   }
                            
                          ?>
                        </select>
                        <button class="btn btn-sm btn-primary btn-create" id="">Action</button>
                      </label>
                    </div>   
                   <!-- </form>  -->             
<!--                     <div class="dataTables_length col-sm-4" id="example1_length">
                      <label>Show 
                        <select name="example1_length" aria-controls="example1" class="form-control input-sm">
                          <option value="10">10</option>
                          <option value="25">25</option>
                          <option value="50">50</option>
                          <option value="100">100</option>
                        </select> entries
                      </label>
                    </div> -->
                  </div>
                  <div class="col-sm-4">
                    <div id="example1_filter" class="dataTables_filter">
                      <label>Search:
                        <div class="input-group input-group-sm">
                          <input 
                            type="search" 
                            class="form-control input-sm"
                            value="<?php echo isset($_REQUEST['searchBar']) ? $_REQUEST['searchBar'] : '' ;?>" 
                            placeholder="search.." 
                            aria-controls="" 
                            name="searchBar">
                          <span class="input-group-btn">
                            <button class="btn btn-info btn-flat"  type="submit" name="search">Go!</button>
                          </span>
                        </div>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th style="width: 74px"><input type="checkbox" class="checkAll"><i class="countChecked"></i></th>
                          <th>Serial Number</th>
                          <th>Firstname</th>
                          <th>Lastname</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Activity</th>
                          <th>Status</th>
                          <th class="actionIcon" align="center">Action&nbsp&nbsp<em class="fa fa-cog"></em></th>
                        </tr>
                      </thead>
                      <tbody>
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
                            <td>
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
                          <th><input type="checkbox" class="checkAll"><i class="countChecked"></i></th>
                          <th>Serial Number</th>
                          <th>Firstname</th>
                          <th>Lastname</th>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Activity</th>
                          <th>Status</th>
                          <th class="actionIcon" align="center">Action&nbsp&nbsp<em class="fa fa-cog"></em></th>
                        </tr>
                      </tfoot>
                    </table>               
                  </div>
                  <!-- col-sm-12-->
                </div><!-- row -->
                <div class="row">
                  <div class="col-sm-5">
                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                      Showing 1 to 10 of <?php echo $response; ?> entries
                    </div>
                  </div>
                  <div class="col-sm-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                      <ul class="pagination">
                      <?php
                      if( $currentPage  ){ 
                        $previous   = $currentPage-1;
                        $className  = ($currentPage == 1)? 'disabled' : '';
                        $linkOnload = ($currentPage == 1)? '#' : '';
                      ?>
                        <li class="<?php echo $className; ?>">
                          <a href="?searchBar=<?php echo $searchBar; ?>&multiAction=&page=<?php echo $previous.$linkOnload;?> ">Previous</a>
                        </li>
                     <?php }
                        for($j=1; $j <= $totalpages; $j++){ 
                          $className  = ($j == $currentPage)? 'active' : '';
                          $linkOnload = ($j == $currentPage)? '#' : '';
                       ?>
                      <li class="<?php echo $className; ?>">
                        <a href="?searchBar=<?php echo $searchBar; ?>&multiAction=&page=<?php echo $j.$linkOnload; ?>"><?php echo $j; ?></a>
                      </li>
                      <?php } ?>
                      <?php  
                        if( $currentPage ){
                          $next = $currentPage+1; 
                          $className  = ($currentPage == $totalpages)? 'disabled' : '';
                          $linkOnload = ($currentPage == $totalpages)? '#' : '';
                          ?>
                          <li class="<?php echo $className; ?>">
                            <a href="?searchBar=<?php echo $searchBar; ?>&multiAction=&page=<?php echo $next.$linkOnload;?> ">Next</a>
                          </li>
                       <?php }  ?>
                      </ul>
                    </div>
                  </div>
                </div>  
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