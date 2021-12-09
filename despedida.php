<?php
session_start();
session_destroy();
sleep(3);
header("Location: login.php");
?>