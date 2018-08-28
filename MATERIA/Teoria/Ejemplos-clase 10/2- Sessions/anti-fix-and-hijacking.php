<?php
// **PREVENTING SESSION HIJACKING**
// Prevents javascript XSS attacks aimed to steal the session ID
ini_set('session.cookie_httponly', 1);

// Adds entropy into the randomization of the session ID, as PHP's random number
// generator has some known flaws
ini_set('session.entropy_file', '/dev/urandom');

// Uses a strong hash
ini_set('session.hash_function', '1');
// **PREVENTING SESSION FIXATION**
// Session ID cannot be passed through URLs
ini_set('session.use_only_cookies', 1);

// Uses a secure connection (HTTPS) if possible
ini_set('session.cookie_secure', 0);

session_start();

// If the user is already logged
if (isset($_SESSION['count'])) {
    // If the IP or the navigator doesn't match with the one stored in the session
    // there's probably a session hijacking going on
    if ($_SESSION['ip'] !== $_SERVER['REMOTE_ADDR'] || $_SESSION['user_agent_id'] !== $_SERVER['HTTP_USER_AGENT']) {
        // Then it destroys the session
        session_unset();
        session_destroy();

        // Creates a new one
        session_regenerate_id(true); // Prevent's session fixation
        $_SESSION['count']=1;
    }
    $_SESSION['count']++;
} else {
    session_regenerate_id(true); // Prevent's session fixation
    
    $_SESSION['ip']= $_SERVER['REMOTE_ADDR']; // Saves the user's IP
    $_SESSION['user_agent_id']= $_SERVER['HTTP_USER_AGENT']; // Saves the user's navigator
	$_SESSION['count']=1;
}
echo "Visitas".$_SESSION['count']."<br>";
print_r($_SESSION);
?>
