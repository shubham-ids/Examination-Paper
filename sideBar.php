<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo URL; ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>Alexander Pierce</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
        <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo URL; ?>index.php"><i class="fa fa-circle-o"></i> Index</a></li>
        </ul>
      </li>
      <li class="header">LABELS</li>
      <?php 
        $url = [
          'Login'         => 'user/login.php',
          'Register'      => 'user/register.php',
          'Users Profile' => 'user/listing.php'
        ];
        addLabelField('users','Users' , $url);
      ?>         
      <li class="header">LABELS</li>
      <?php 
        $url = [
          'Add Class'   => 'class/register.php',
          'All Classes' => 'class/listing.php'
        ];
        addLabelField('folder','Class' , $url);
      ?>              
      <?php 
        $url = [
          'Add Subject'   => 'subject/register.php',
          'All Subjects'  => 'subject/listing.php'
        ];
        addLabelField('book','Subject' , $url);
      ?>        
      <?php 
        $url = [
          'Add Chapter'   => 'chapter/register.php',
          'All Chapters'  => 'chapter/listing.php'
        ];
        addLabelField('book','Chapter' , $url);
      ?>      
      <li class="header">LABELS</li>    
      <?php 
        $url = [
          'Add Country'   => 'country/register.php',
          'All Countries' => 'country/listing.php'
        ];
        addLabelField('flag-checkered','Country' , $url);
      ?>
      <?php 
        $url = [
          'Add State'   => 'state/register.php',
          'All States' => 'state/listing.php'
        ];
        addLabelField('flag-o','State' , $url);
      ?> 
      <?php 
        $url = [
          'Add District' => 'district/register.php',
          'All District' => 'district/listing.php'
        ];
        addLabelField('flag-o','District' , $url);
      ?> 
      <?php 
        $url = [
          'Add City' => 'city/register.php',
          'All City' => 'city/listing.php'
        ];
        addLabelField('map-marker','City' , $url);
      ?>                                  
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>