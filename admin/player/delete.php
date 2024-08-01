<?php 
require('../../reusable/con.php');

$id = $_GET['id'];

$query = "DELETE FROM player WHERE id = $id";
if (mysqli_query($connect, $query)) {
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connect);
}
?>
