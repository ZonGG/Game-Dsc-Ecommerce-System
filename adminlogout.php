<?php
session_start();
unset($_SESSION['AdminID']);
unset($_SESSION['Password']);
session_destroy();

header("Location: adminlogin.html");
exit;
?>
