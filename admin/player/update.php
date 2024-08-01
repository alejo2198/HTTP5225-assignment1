<?php 
include('../../reusable/nav.php'); 
require('../../reusable/con.php');

$id = $_GET['id'];

$query = "SELECT * FROM player WHERE id = $id";
$result = mysqli_query($connect, $query);
$player = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $full_name = $first_name . ' ' . $last_name;
    $is_active = isset($_POST['is_active']) ? 1 : 0;
    $team_id = $_POST['team_id'];

    $query = "UPDATE player SET full_name = '$full_name', first_name = '$first_name', last_name = '$last_name', is_active = '$is_active', team_id = '$team_id' WHERE id = $id";
    if (mysqli_query($connect, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($connect);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Player</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Update Player</h1>
        <form action="update.php?id=<?php echo $id; ?>" method="POST">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $player['first_name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $player['last_name']; ?>" required>
            </div>
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" <?php echo $player['is_active'] ? 'checked' : ''; ?>>
                <label class="form-check-label" for="is_active">Active</label>
            </div>
            <div class="mb-3">
                <label for="team_id" class="form-label">Team ID</label>
                <input type="number" class="form-control" id="team_id" name="team_id" value="<?php echo $player['team_id']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Player</button>
        </form>
    </div>
</body>
</html>
