<?php
include('../db/connection.php');
if(isset($_REQUEST['login'])){
  $email    = $_REQUEST['email'];
  $password = $_REQUEST['password'];
  
  $validationErrorMssage = false;
  if(empty($email)){
    $emailErrorMessage = "This field is required";
    $validationErrorMssage = true;
  }
}
?>