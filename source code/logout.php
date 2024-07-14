<?php
  $_SESSION = array();
  if (ini_get("session.use_cookies")) {
      $params = session_get_cookie_params();
      setcookie(session_name(), "", time() - 3600, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
  }
  session_destroy();
  setcookie("stay_logged_in", "", time() - 3600);
  header("location:index.php");
?>