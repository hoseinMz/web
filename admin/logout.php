<?php
session_start();
if ( $_SESSION["logged"] != true || $_SESSION['access']=='member') {
    echo "<script>alert('سطح دسترسی شما محدود است');window.location.href='../index.php';</script>";
    exit();
}
// remove all session variables
session_unset();
// destroy the session
session_destroy();
header( "Location: ../index.php" );