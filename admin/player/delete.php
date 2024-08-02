<?php 
session_start();
require('../../reusable/con.php');
require('../../reusable/notification.php');

$id = $_GET['id'];

$query = "DELETE FROM player WHERE id = $id";
if (mysqli_query($connect, $query)) {
    setNotification('Player deleted successfully!');
    header("Location: index.php");
    exit();
} else {
    setNotification('Error: ' . mysqli_error($connect));
    echo "Error: " . $query . "<br>" . mysqli_error($connect);
    exit();
}
?>
