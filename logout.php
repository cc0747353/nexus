<?php
session_start();
session_destroy();
header("location: index.html");
echo "You have been logged out";
?>