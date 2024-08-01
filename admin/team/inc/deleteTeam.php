<?php
  require('../../../reusable/con.php');
  $id = $_GET['id'];

  $query = "DELETE FROM team WHERE `id` = '$id'";
  $team = mysqli_query($connect, $query);

  if ($team) {
    if (mysqli_affected_rows($connect) > 0) {
        header('Location:../index.php');
    } else {
        echo "No rows affected. The team might not exist.";
    } 
  }
  else{
    echo "Failed: " . mysqli_error($connect);
  }