<?php 
  session_start();

  $_SESSION = [];
  session_unset();
  session_destroy();
  setcookie('cek', '', time() - 3600);
  setcookie('medical', '', time() - 3600);

  header("Location: login.php");
  exit;
