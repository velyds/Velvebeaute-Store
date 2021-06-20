<?php
session_start();
include ('koneksi.php');
unset ($_SESSION['id']);
unset ($_SESSION['login']);
session_destroy();
header( "location:login.php" );
?>