<?php
  session_start();
  if(isset($_POST['updateTeam'])){
    $id = $_POST['id'];
    $teamName = $_POST['teamName'];
    $teamAbbreviation = $_POST['teamAbbreviation'];
    $teamNickName = $_POST['teamNickName'];
    $teamCity = $_POST['teamCity'];
    $teamState = $_POST['teamState'];
    $teamYearFounded = $_POST['teamYearFounded'];

    require('../../../reusable/con.php');
    require('../../../reusable/notification.php');
  
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
      setNotification('Team updated successfully!');
      header('Location:../index.php');
    }
    else{
      setNotification('Error: ' . mysqli_error($connect));
      echo 'Failed: ' . mysqli_error($connect);
    }
  }
  else{
    echo "Team to be updated not set!";
  }
?>
