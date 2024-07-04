<?php 
      $connect = mysqli_connect('localhost', 'root', 'root', 'http5225-assignment1');
      if(!$connect){
        die("Connection Failed: " . mysqli_connect_error());
      }
  ?>