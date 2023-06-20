<?php 
  session_start(); 
  // Menyisipkan Connection dan Function
  require 'load/config.php';
  require 'load/function.php';
?>

<?php 
  if ( !isset($_SESSION['login']) ) {
    header("Location: login.php");
    exit;
  }
?>


<!-- START: Document -->
<?php require_once 'header.php'; ?>

<?php require 'content.php'; ?>

<?php require_once 'footer.php'; ?>
<!-- END: Document -->