<?php
session_start();
unset($_SESSION['score']);

header('location:login1.php');
