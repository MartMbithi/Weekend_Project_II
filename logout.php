<?php
/* Handle Logout Logic Here */
session_start();
unset($_SESSION['user_id']);
unset($_SESSION['user_access_level']);
unset($_SESSION['user_name']);
unset($_SESSION['user_number']);
session_destroy();
header("Location: index");
exit;
