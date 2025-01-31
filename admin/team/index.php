<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../../reusable/nav_admin_team.php');
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
          <h1 class="display-4 mt-5 mb-5 text-light">All Teams</h1>
          <div class="d-flex justify-content-end">
            <a href="add.php" class="btn btn-success mb-3">Add New Team</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <?php 
      
      require('../../reusable/con.php');
      $query = 'SELECT * FROM team';
      $teams = mysqli_query($connect, $query);
      // echo '<pre>';
      // echo print_r($teams);
      // echo '</pre>';

  ?>

  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <?php
          foreach($teams as $team){
            $formatted_date = intval($team['year_founded']);
            echo 
            '<div class="col-md-4 mt-2 mb-2">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">' . $team['city'] . '</h5>
                  <p class="card-text">' . $team['nickname'] . '</p> 
                  <span class="badge bg-info">' . $team['abbreviation'] . '</span>
                  <span class="badge bg-secondary">' . 'Founded in: ' . $formatted_date . '</span>
                </div>
                <div class="card-footer">
                  <div class="row">
                    <div class="col">
                      <form action="inc/deleteTeam.php" method="GET">
                        <input type="hidden" name="id" value="' . $team['id'] . '"> 
                        <button type="submit" class="btn btn-danger mt-2">Delete Team</button>
                      </form>
                    </div>
                    <div class="col">
                      <form action="update.php" method="GET">
                        <input type="hidden" name="id" value="' . $team['id'] . '"> 
                        <button type="submit" class="btn btn-primary mt-2">Update Team</button>
                      </form>
                    </div>
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