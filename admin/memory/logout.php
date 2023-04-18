<?php
session_start();
unset($_SESSION['administrator']);
header("location:index.html");
?>