<?php
// Initialize the session
session_start();

// Clear all session variables
$_SESSION = array();

// If session cookies are used, invalidate the session cookie
if (ini_get("session.use_cookies")) {
    $cookieParams = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 3600,
        $cookieParams["path"],
        $cookieParams["domain"],
        $cookieParams["secure"],
        $cookieParams["httponly"]
    );
}

// Remove the specific session variable for login
unset($_SESSION['user_authenticated']);

// Destroy the session
session_destroy();

// Redirect to the home page
header("Location: home.php");
exit();
?>
session_start(); 
$_SESSION = array();
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 60*60,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
unset($_SESSION['login']);
session_destroy(); // destroy session
header("location:index.php"); 
?>

