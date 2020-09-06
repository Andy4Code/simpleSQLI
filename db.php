<?php
// ini_set('display_errors',1);
// error_reporting(E_ALL);
$link = new mysqli('localhost','webdev','123456789','webdev');
if ($link->connect_error) {
  die("Connection failed");//. $link->connect_error);
}
