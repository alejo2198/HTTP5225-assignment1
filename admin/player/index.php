<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../../reusable/nav_admin_player.php');
require('../../reusable/con.php');
require('../../reusable/notification.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NBA Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-secondary p-2 text-dark bg-opacity-75" >
  <?php displayNotification(); ?>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col">
          <h1 class="display-4 mt-5 mb-5 text-light">All Players</h1>
          <div class="d-flex justify-content-end">
            <a href="add.php" class="btn btn-success mb-3">Add New Player</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <?php 
      require('../../reusable/con.php');
      $query = 'SELECT player.id,player.first_name,player.last_name, team.abbreviation,team.city,team.nickname
                FROM player
                INNER JOIN team ON player.team_id=team.id;';
      $players = mysqli_query($connect, $query);
      if (!$players) {
        echo "Error: " . mysqli_error($connect);
      }
      // echo '<pre>';
      // echo print_r($players);
      // echo '</pre>';
  ?>



  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <?php
          foreach($players as $player){
            $player_link = 'https://www.nba.com/player/' . $player['id'] . '/' .  $player['first_name'] . '-' . $player['last_name'];
            echo '<div class="col-md-4 mt-2 mb-2">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title mb-6" >' . $player['first_name'] .' '.  $player['last_name'] .'</h5>
                <p class="card-subtitle">'.'Plays for: ' . $player['city'] .' ' .  $player['nickname'] . '</p> 
                <span class="badge bg-info">' . $player['abbreviation'] . '</span>
                <span class="badge bg-secondary mb-4">' . $player['city'] . '</span>
                <div>
                  <a href="'.$player_link.'" class="btn btn-info mt-2"> Details</a>
                  <a href="update.php?id=' . $player['id'] . '" class="btn btn-primary mt-2">Edit</a>
                  <a href="delete.php?id=' . $player['id'] . '" class="btn btn-danger mt-2" onclick="return confirm(\'Are you sure you want to delete this player?\')">Delete</a>
                </div>           
              </div>
            </div>
          </div>';   
          }
        ?>
      </div>
    </div>
  </div>

</body>
</html>