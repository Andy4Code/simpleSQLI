<?php
session_start();
require_once 'header.php';
require_once 'db.php';
?>
<h1 class="text-center">Register New User : </h1>
<form method="post">
  <div class="form-group">
    <lable for="username"> New UserName : </label>
    <input type="text" placeholder="username" name="username" id="username" class="form-control">
  </div>
  <div class="form-group">
    <lable for="password"> Password : </label>
    <input type="password" placeholder="password" name="password" id="password" class="form-control">
  </div>
  <div class="form-group">
      <button class="btn btn-primary" type="submit"> Register </button>
  </div>
</form>
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'):
  $username = $_POST['username'];
  $passsword = $_POST['password'];
  $register = $link->query("INSERT INTO `users` VALUES (null,'$username','$passsword')");
  if($register):

      $_SESSION['username'] = $username;
      $_SESSION['id']       = $register->last_id;
      header('location:index.php');
      exit;
  else:
    echo "<div class='alert alert-danger'>error while register : ".$register->error."</div>";
  endif;
endif;



require_once 'footer.php'; ?>
