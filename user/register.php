<?php
  include_once('phpCode/add.php'); 
  include_once('userHeader.php'); 
?>
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Admin</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new membership</p>
     <div>
       <?php echo $message; ?>
     </div>
    <form  method="post">
      <div class="form-group has-feedback">
        <input 
          type        = "text" 
          class       = "form-control" 
          name        = "firstname" 
          id          = "fname"
          value       = "<?php echo isset($_REQUEST['firstname']) ? $_REQUEST['firstname'] : ''; ?>" 
          placeholder = "First name">
        <span class = "glyphicon glyphicon-user form-control-feedback"></span>
        <div class  = "serverErrorMessage" id="clientErrorMessage">
          <?php
            if(isset( $firstnameErrorMessage ) === true){
              echo $firstnameErrorMessage;
            } 
          ?>
        </div>
      </div>
      <div class="form-group has-feedback">
        <input 
          type        = "text" 
          class       = "form-control" 
          name        = "lastname" 
          value       = "<?php echo isset($_REQUEST['lastname']) ? $_REQUEST['lastname'] : ''; ?>"
          id          = "lname" 
          placeholder = "Last name">
        <span class = "glyphicon glyphicon-user form-control-feedback"></span>
        <div class  = "serverErrorMessage">
          <?php
            if(isset( $lastnameErrorMessage ) === true){
              echo $lastnameErrorMessage;
            } 
          ?>
        </div>
      </div>
      <div class="form-group has-feedback">
        <input 
          type        = "text" 
          class       = "form-control" 
          name        = "username" 
          id          = "username"
          value       = "<?php echo isset($_REQUEST['username']) ? $_REQUEST['username'] : ''; ?>" 
          placeholder = "User name">
        <span class = "glyphicon glyphicon-user form-control-feedback"></span>
        <div class  = "serverErrorMessage">
          <?php
            if(isset( $usernameErrorMessage ) === true){
              echo $usernameErrorMessage;
            } 
          ?>
        </div>
      </div>            
      <div class="form-group has-feedback">
        <input 
          type        = "email" 
          class       = "form-control" 
          name        = "email"
          value       = "<?php echo isset($_REQUEST['email']) ? $_REQUEST['email'] : ''; ?>" 
          id          = "email" 
          placeholder = "Email">
        <span class = "glyphicon glyphicon-envelope form-control-feedback"></span>
        <div class = "serverErrorMessage">
          <?php
            if(isset( $emailErrorMessage ) === true){
              echo $emailErrorMessage;
            } 
          ?>
        </div>        
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name ="password" id="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <div class="serverErrorMessage">
          <?php
            if(isset( $passwordErrorMessage ) === true){
              echo $passwordErrorMessage;
            } 
          ?>
        </div>         
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="Cpassword" id="cPassword" placeholder="Retype password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        <div class="serverErrorMessage">
          <?php
            if(isset( $CpasswordErrorMessage ) === true){
              echo $CpasswordErrorMessage;
            } 
          ?>
        </div>          
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="activity" value="activate"> I agree to the <a href="../terms-condition-page.php">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" name= "add" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div>

    <a href="login.php" class="text-center">I already have a membership</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->
<?php include_once('userFooter.php'); ?>