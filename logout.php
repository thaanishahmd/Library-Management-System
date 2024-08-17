<?php 	

    include "include/config.php";
    include 'include/core.php';
    session_destroy();
    echo "You have logged out successfully!<br/>";
    header("Location:homepage.php?s_message='Logged out Successfully!'");

?>