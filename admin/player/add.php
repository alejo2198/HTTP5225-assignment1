<?php 
include('../../reusable/nav_admin_player.php'); 
require('../../reusable/con.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $full_name = $first_name . ' ' . $last_name;
    $is_active = isset($_POST['is_active']) ? 1 : 0;
    $team_id = $_POST['team_id'];

    $query = "INSERT INTO player (full_name, first_name, last_name, is_active, team_id) VALUES ('$full_name', '$first_name', '$last_name', '$is_active', '$team_id')";
    if (mysqli_query($connect, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
   
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Directory where the uploaded image will be saved
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
    
        // Get image file extension
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
        // Check if image file is an actual image or a fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".<br>";
            $uploadOk = 1;
        } else {
            echo "File is not an image.<br>";
            $uploadOk = 0;
        }
    
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.<br>";
            $uploadOk = 0;
        }
    
        // Limit file size (5MB in this example)
        if ($_FILES["image"]["size"] > 5000000) {
            echo "Sorry, your file is too large.<br>";
            $uploadOk = 0;
        }
    
        // Allow certain file formats
        if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
            $uploadOk = 0;
        }
    
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk === 0) {
            echo "Sorry, your file was not uploaded.<br>";
        } else {
            // If everything is ok, try to upload the file
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["image"]["name"])) . " has been uploaded.<br>";
            } else {
                echo "Sorry, there was an error uploading your file.<br>";
            }
        }
    }
  
    

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Player</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Add New Player</h1>
        <form action="add.php" method="POST" enctype="multipart/form-data">
            <!-- <div class="mb-3">
                <label for="player_id" class="form-label">Player ID</label>
                <input type="number" class="form-control" id="player_id" name="player_id" required>
            </div> -->
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="is_active" name="is_active">
                <label class="form-check-label" for="is_active">Active</label>
            </div>
            <div class="mb-3">
                <label for="team_id" class="form-label">Team ID</label>
                <input type="number" class="form-control" id="team_id" name="team_id" required>
            </div>
             <div class="mb-3">
                <label for="image" class="form-label">Player Image</label>
                <input type="file" name="image" accept="image/*" required>
            </div>
            
            <button type="submit" class="btn btn-success">Add Player</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-KsvDfDR2hNxKXAXR1m+x8nBujK6VRLbs4r9nAC5Xo6kENtIpXnA+b0LSUVPO5Iu7" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVQI4nLE0xZh65eKNmUPvpoA0t41ZZT8zFfV6Xt1uQ4oI5pOLHMD5TyyjlbbhG1r" crossorigin="anonymous"></script>
</body>
</html>
