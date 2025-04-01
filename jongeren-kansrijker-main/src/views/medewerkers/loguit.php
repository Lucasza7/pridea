<?php
// logout.php

// Start the session
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session cookie if it exists
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 42000, '/');
}

// Destroy the session
session_destroy();

// Redirect to the home page or login page
header("Location: ../../../index.php");
exit();