<?php
session_start();
unset($_SESSION['Email']);
unset($_SESSION['Password']);
session_destroy();

header("Location: index.html");
exit;
?>
