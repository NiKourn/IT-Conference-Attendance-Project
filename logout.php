<?php
//This includes the session file. This file contains code that starts/resumes a session
//By having it in the header file, it will be included on every page, allowing session capability to be used on every page across the website.
include_once 'includes/session.php';
//Session destroy() destroys the session. Then the header() function redirects to the home page.
session_destroy();
header('Location: index.php');
?>