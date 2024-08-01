  <?php 
      include('inc/functions.php');
      require('reusable/con.php'); 
      
      if(isset($_POST['login'])){
        $query = 'SELECT *
                  FROM users
                  WHERE email = "' . $_POST['email'] . '"
                  AND password = "' . md5($_POST['password']) . '"
                  LIMIT 1';
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result)){
          $record = mysqli_fetch_assoc($result);
          $_SESSION['id'] = $record['id'];
          $_SESSION['name'] = $record['name'];
          $_SESSION['email'] = $record['email'];
          header('Location: admin/player/index.php');
          die();
        }else{
          set_message('Username/Password is incorrect, Try again!', 'danger');
          header('Location: login.php');
          die();
        }
      }
      
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NBA Data</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <!-- Navigation goes here -->
  <?php include('reusable/nav.php'); ?>

  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <h1 class="display-4 mt-5 mb-5 text-center">Login</h1>
        </div>
      </div>
    </div>
  </div>
  

  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <?php get_message(); ?>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 offset-md-4">
          <form method="POST" action="login.php">
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
              
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" name="password"id="password">
            </div>
            <button type="submit" class="btn btn-primary" name="login">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>


</body>
</html>