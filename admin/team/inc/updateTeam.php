<?php
  if(isset($_POST['updateTeam'])){
    $id = $_POST['id'];
    $teamName = $_POST['teamName'];
    $teamAbbreviation = $_POST['teamAbbreviation'];
    $teamNickName = $_POST['teamNickName'];
    $teamCity = $_POST['teamCity'];
    $teamState = $_POST['teamState'];
    $teamYearFounded = $_POST['teamYearFounded'];

    require('functions.php'); 
    require('../../../reusable/con.php');
  
    $query = "UPDATE `team` SET 
                  `full_name`='$teamName',
                  `abbreviation`='$teamAbbreviation',
                  `nickname`='$teamNickName',
                  `city`='$teamCity',
                  `state`='$teamState',
                  `year_founded`='$teamYearFounded'
              WHERE `id`='$id'";
  
    $team = mysqli_query($connect, $query);
  
    if($team){
      set_message_teams('Team updated successfully!', 'success');
      header('Location:../index.php');
    }
    else{
      echo 'Failed: ' . mysqli_error($connect);
    }
  }
  else{
    echo "Team to be updated not set!";
  }
?>
