<?php
  session_start();
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $teamName = $_POST['teamName'];
  $teamAbbreviation = $_POST['teamAbbreviation'];
  $teamNickName = $_POST['teamNickName'];
  $teamCity = $_POST['teamCity'];
  $teamState = $_POST['teamState'];
  $teamYearFounded = $_POST['teamYearFounded'];

  require('../../../reusable/con.php');
  require('../../../reusable/notification.php');

  $query = "INSERT INTO team (
                `full_name`,
                `abbreviation`,
                `nickname`,
                `city`,
                `state`,
                `year_founded`)
              VALUES('$teamName',
                    '$teamAbbreviation',
                    '$teamNickName',
                    '$teamCity',
                    '$teamState',
                    '$teamYearFounded')";

  $team = mysqli_query($connect, $query);

  if($team){
    set_message_teams('Team added successfully!', 'success');
    header('Location:../index.php');
    exit();
  }
  else{
    echo 'Failed: ' . mysqli_error($connect);
  }
?>
