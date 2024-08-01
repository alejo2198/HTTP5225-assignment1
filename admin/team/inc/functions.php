<?php
  session_start();

  function set_message_teams($message, $teamName){
    $_SESSION['message'] = $message;
    $_SESSION['teamName'] = $teamName;
  }