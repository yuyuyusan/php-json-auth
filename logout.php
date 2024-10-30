<?php
// logout.php
session_start();
setcookie('logged_in', '', time() - 3600, "/", "", true, true);
session_destroy();
header("Location: index.php");
exit;