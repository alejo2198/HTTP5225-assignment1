<?php
function setNotification($message) {
    $_SESSION['notification'] = $message;
}
function displayNotification() {
    if (isset($_SESSION['notification'])) {
        echo "<script>alert('" . $_SESSION['notification'] . "');</script>";
        unset($_SESSION['notification']);
    }
}
?>
