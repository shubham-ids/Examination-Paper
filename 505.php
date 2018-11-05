<?php 
  include_once('db/connection.php');
  include_once('user/userheader.php'); 
?>
<form method="post">
    <!-- Main content -->
    <section class="content">

      <div class="error-page">
        <h2 class="headline text-red">505</h2>

        <div class="error-content">
          <h3><i class="fa fa-warning text-red"></i> Oops! Something went wrong.</h3>

          <p>
            Your account is blocked.
            Contact the admin for email.  <a href="user/login.php">return to login </a> Admin Email:shubham@.gmail.com
          </p>

        </div>
      </div>
      <!-- /.error-page -->

    </section>
</form>
<?php include_once('user/userfooter.php'); ?>