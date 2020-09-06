<?php
session_start();
require_once 'header.php';
require_once 'db.php';


if(isset($_SESSION['username'])):
    echo "<h1 class='text-center'>Hello, ". $_SESSION['username']. "</h1>";
endif;
    if(isset($_GET['id'])):
      $id = $_GET['id'];
      $service = $link->query("SELECT * FROM `service` WHERE `id`= $id");
      $t = $service->fetch_all(MYSQLI_ASSOC);
      echo '<div class="row">';
      foreach($t as $s):
        echo '<div class="col"><div class="card text-center">';
        echo '  <div class="card-header">'.$s['serviceName'].'</div>';
        echo '<div class="card-body"> Description : '.$s['serviceDesc'].'</div>';
        echo '<div class="text-muted"> Price : '.$s['servicePrice'].'</div>';
        echo '<div class="card-text"><a href="index.php">back</a></div>';
        echo '</div></div>';
      endforeach;
      echo "</div>";
    else:
        $service = $link->query("SELECT * FROM `service`")->fetch_all(MYSQLI_ASSOC);
          echo '<div class="row">';
          foreach($service as $s):
            echo '<div class="col-md-4"><div class="card text-center">';
            echo '  <div class="card-header">'.$s['serviceName'].'</div>';
            echo '<div class="card-body"><a href="?id='.$s['id'].'"> Show Desc</a></div>';
            echo '</div></div>';
          endforeach;
          echo "</div>";
    endif;



 require_once 'footer.php'; ?>
