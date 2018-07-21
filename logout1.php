<?php
session_start();
unset($_SESSION['email']);
header('Location: login1.php');
?>php
