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
        All Subject
        <small><a href="register.php">Add new </a></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL; ?>index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Subject</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Subjects</h3>
            </div>
            <div id="outputMessage">
              <?php echo $message; ?>
            </div> 
            <!-- /.box-header -->
            <div class="box-body" >
              <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <div class="row">                      
                  <div class="col-sm-8">
                  <!--  <form> -->
                    <div class="dataTables_length col-sm-2" id="example1_length">
                      <label>Action :
                        <select aria-controls="example1" name="multiAction" class="form-control input-sm bulkaction">
                          <option value="">Select</option>
                          <option value="deleted"> Delete </option>
                        </select>
                      </label>
                    </div>   
                   <!-- </form>  -->             
                    <div class="dataTables_length col-sm-4" id="example1_length">
                      <label>Show 
                        <select name="showEntries" aria-controls="example1" class="form-control input-sm">
                          <!--<option disabled=""> Select entries <?php echo $entries; ?></option>-->
                           <option value="10" <?php echo ($record_perpage == '10') ? "selected='selected'" : "" ; ?>>10</option>
                          <option value="15"  <?php echo ($record_perpage == '15') ? "selected='selected'" : "" ; ?>>15</option>
                          <option value="25"  <?php echo ($record_perpage == '25') ? "selected='selected'" : "" ; ?>>25</option>
                        </select> entries
                        <button class="btn btn-sm btn-primary btn-create" id="actionButton">Action</button>
                      </label>
                    </div>
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
                          <th>Subject</th>
                          <th>Description</th>
                          <th>Prectical Number</th>
                          <th>Theoretical-no</th>
                          <th>Examination Time</th>
                          <th>Class</th>
                          <th>Create On</th>
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
                        foreach( $result as $row ){
                          $query = "SELECT * FROM `class` WHERE `id` = (SELECT `classSubject` FROM `subject` WHERE `classSubject` =".$row['classSubject'].")";
                          $subQuery = $pdo->query($query);
                         ?>
                          <tr>
                            <td><input type="checkbox" name="users[]" class="checkItem" value="<?php echo $row['id']; ?>"></td>
                            <td><?php echo ++$limitPosition; ?></td>
                            <td><?php echo $row['title']; ?></td>
                            <td>
                              <?php 
                                $string = $row['description'];
                                echo mb_strimwidth($string, 0, 20, "....."); 
                              ?>    
                            </td>
                            <td><?php echo $row['prectical-no']; ?></td>
                            <td><?php echo $row['theoretical-no']; ?></td>
                            <td><?php echo $row['examination-time']; ?></td>
                            <td>
                              <?php $fetch = $subQuery->fetch(); 
                              ?>
                              <?php echo ( $row['classSubject'] == $fetch['id'] ) ? $fetch['title'] : $row['classSubject'] ; ?>             
                            </td>
                            <td><?php echo $row['create-on']; ?></td>
                            <td align="left">
                              <a 
                                href  = "update.php?task=edit&id=<?php echo $row['id']; ?>"
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
                          <th>Subject</th>
                          <th>Description</th>
                          <th>Prectical Number</th>
                          <th>Theoretical-no</th>
                          <th>Examination Time</th>
                          <th>Class</th>
                          <th>Create On</th>
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
                          <a 
                            href="?searchBar=<?php echo $searchBar; ?>&multiAction=&order=<?php echo $order == 'desc'?'asc':'desc'; ?>&page=<?php echo $previous.$linkOnload;?> ">
                            Previous</a>
                        </li>
                     <?php }
                        for($j=1; $j <= $totalpages; $j++){ 
                          $className  = ($j == $currentPage)? 'active' : '';
                          $linkOnload = ($j == $currentPage)? '#' : '';
                       ?>
                      <li class="<?php echo $className; ?>">
                        <a href="?searchBar=<?php echo $searchBar; ?>&multiAction=&order=<?php echo $order == 'desc'?'asc':'desc'; ?>&page=<?php echo $j.$linkOnload; ?>"><?php echo $j; ?></a>
                      </li>
                      <?php } ?>
                      <?php  
                        if( $currentPage ){
                          $next       = $currentPage+1; 
                          $next       = ($response == 0)?'#':'';
                          $className  = ($currentPage == $totalpages)? 'disabled' : '';
                          $className  = ($response == 0)?'disabled':'';
                          $linkOnload = ($currentPage == $totalpages)? '#' : '';
                          ?>
                          <li class="<?php echo $className; ?>">
                            <a 
                              href="?searchBar=<?php echo $searchBar; ?>&multiAction=&order=<?php echo $order == 'desc'?'asc':'desc'; ?>&page=<?php echo $next.$linkOnload;?>">Next</a>
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