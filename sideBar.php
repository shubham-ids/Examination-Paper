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
      <li class="active treeview">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="<?php echo URL; ?>index.php"><i class="fa fa-circle-o"></i> Index</a></li>
        </ul>
      </li>
      <li class="header">LABELS</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Users</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo URL; ?>user/login.php"><i class="fa fa-circle-o">    </i> Login        </a></li>
          <li><a href="<?php echo URL; ?>user/register.php"><i class="fa fa-circle-o"> </i> Register     </a></li>
          <li><a href="<?php echo URL; ?>user/listing.php"><i class="fa fa-circle-o">  </i> Users Profile</a></li>
        </ul>
      </li> 
      <li class="header">LABELS</li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-folder"></i> <span>Class</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo URL; ?>class/register.php"><i class="fa fa-circle-o"> </i>Add Class</a></li>
          <li><a href="<?php echo URL; ?>user/listing.php"><i class="fa fa-circle-o">  </i>All Classes</a></li>
        </ul>
      </li>       
      <li class="treeview">
        <a href="#">
          <i class="fa fa-book"></i> <span>Subject</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo URL; ?>subject/register.php"><i class="fa fa-circle-o"> </i>Add Subject</a></li>
          <li><a href="<?php echo URL; ?>user/listing.php"><i class="fa fa-circle-o">  </i>All Subjects</a></li>
        </ul>
      </li>    
      <li class="treeview">
        <a href="#">
          <i class="fa fa-book"></i> <span>Chapter</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?php echo URL; ?>chapter/register.php"><i class="fa fa-circle-o"> </i>add Chapter</a></li>
          <li><a href="<?php echo URL; ?>user/listing.php"><i class="fa fa-circle-o">  </i>All Chapters</a></li>
        </ul>
      </li>               
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>