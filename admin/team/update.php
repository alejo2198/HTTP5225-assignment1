<?php
    session_start();
    require('inc/functions.php');
    require('../../reusable/con.php');
    require('../../reusable/notification.php');
    $id = $_GET['id'];
    $query = "SELECT * FROM team WHERE `id` = '$id'";
    $team = mysqli_query($connect, $query);
    $result = mysqli_fetch_assoc($team);
  ?>

<?php include('../../reusable/nav_admin_team.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NBA Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-secondary p-2 text-dark bg-opacity-75" >
 
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col">
          <h1 class="display-4 mt-5 mb-5 text-light">Update <?php echo $result['full_name'] ?></h1>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <form action="inc/updateTeam.php" method="POST">
            <input type="hidden" value="<?php echo $id ?>" name="id">
            <div class="mb-3">
              <label for="teamName" class="form-label">Name</label>
              <input type="text" class="form-control" id="teamName" aria-describedby="teamName" name="teamName" value="<?php echo $result['full_name']; ?>" required>
            </div>
            <div class="mb-3">
              <label for="teamAbbreviation" class="form-label">Abbreviation</label>
              <input type="text" class="form-control" id="teamAbbreviation" name="teamAbbreviation" value="<?php echo $result['abbreviation']; ?>" required>
            </div>
            <div class="mb-3">
              <label for="teamNickName" class="form-label">NickName</label>
              <input type="text" class="form-control" id="teamNickName" name="teamNickName" value="<?php echo $result['nickname']; ?>" required> 
            </div>
            <div class="mb-3">
              <label for="teamCity" class="form-label">City</label>
              <input type="text" class="form-control" id="teamCity" name="teamCity" value="<?php echo $result['city']; ?>" required>
            </div>
            <div class="mb-3">
              <label for="teamState" class="form-label">State</label>
              <input type="text" class="form-control" id="teamState" name="teamState" value="<?php echo $result['state']; ?>" required>
            </div>
            <div class="mb-3">
              <label for="teamYearFounded" class="form-label">Year Founded</label>
              <input type="decimal" class="form-control" id="teamYearFounded" name="teamYearFounded" value="<?php echo $result['year_founded']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="updateTeam">Update Team</button>
        </form>

      </div>
    </div>
  </div>

</body>
</html>