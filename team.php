<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NBA Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-secondary p-2 text-dark bg-opacity-75" >
    <?php include('reusable/nav.php'); ?>
 
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <iframe class="object-fit-cover" style="height: 30rem;" src="https://www.youtube.com/embed/nLXRQRx-fXM?si=LPY_mCcHsOD7nwly"></iframe>
        <div class="col">
          <h1 class="display-4 mt-5 mb-5 text-light">All Teams</h1>
        </div>
      </div>
    </div>
  </div>
  <?php 
      
      require('reusable/con.php');
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
            echo '<div class="col-md-4 mt-2 mb-2">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">' . $team['city'] . '</h5>
                <p class="card-text">' . $team['nickname'] . '</p> 
                <span class="badge bg-info">' . $team['abbreviation'] . '</span>
                <span class="badge bg-secondary">' . 'Founded in: ' . $formatted_date . '</span>
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