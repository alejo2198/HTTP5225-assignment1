<?php
  session_start();
  require('../../../reusable/con.php');
  require('../../../reusable/notification.php');
  $id = $_GET['id'];

  $query = "DELETE FROM team WHERE `id` = '$id'";
  $team = mysqli_query($connect, $query);

  if ($team) {
    if (mysqli_affected_rows($connect) > 0) {
        setNotification('Team deleted successfully!');
        header('Location:../index.php');
    } else {
        setNotification('Error: ' . mysqli_error($connect));
        echo "No rows affected. The team might not exist.";
    } 
  }
  else{
    echo "Failed: " . mysqli_error($connect);
  }