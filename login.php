<?php
session_start();
require_once 'header.php';
require_once 'db.php';
?>

<form method="post">
  <div class="form-group">
    <lable for="username"> username : </label>
    <input type="text" placeholder="username" name="username" id="username" class="form-control">
  </div>
  <div class="form-group">
    <lable for="password"> password : </label>
    <input type="password" placeholder="password" name="password" id="password" class="form-control">
  </div>
  <div class="form-group">
      <button class="btn btn-success" type="submit"> Login </button>
  </div>
</form>
<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'):
  $username = $_POST['username'];
  $passsword = $_POST['password'];
  $check = $link->query("SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$passsword'"); // ' or 1=1--
  if($check AND $check->num_rows > 0):
      $result = $check->fetch_assoc();
      $_SESSION['username'] = $result['username'];
      $_SESSION['id']       = $result['id'];
      header('location:index.php');
      exit;
  else:
    echo "<div class='alert alert-danger'>error username or password</div>";
  endif;
endif;



require_once 'footer.php'; ?>
