<?php 
  include_once('phpCode/list.php');
?>
<!--
  /**** Already variable name are use in function file: ***/
    $currentpage , $order , $tableHeadName - $key => $value ,$columnName , $customName , $order , $orderBy
    $searchName , $response , $totalpages , $fieldname , $option , $record_perpage,$fieldName  , $addField    
    $tableName , $id ,$queryArray,$queryString,$messsage , $input
-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Classes
        <small><a href="register.php">Add new </a></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo URL; ?>index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">All Classes</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Classes</h3>
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
                      $addField = ['deleted' => 'Delete'];
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
                              'title'       => 'Class Name',
                              'description' => 'Description',
                              'duration'    => 'Duration',
                              'create-on'   => 'Create on'
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
                            <td><?php echo $row['title']; ?></td>
                            <td>
                              <?php $string = $row['description']; echo mb_strimwidth($string, 0, 40, "....."); ?>    
                            </td>
                            <td><?php echo $row['duration']; ?></td>
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