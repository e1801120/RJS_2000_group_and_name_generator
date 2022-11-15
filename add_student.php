<?php
    require_once("classes.php");

    $fullname = $_POST["fullname"];

    // Check that string contains only letters, number or ä ö å
    if(!preg_match('/[^A-Za-z0-9äöåÄÖÅ ]/', $fullname)) {
        Main::AddStudent($fullname);
        header("location: index.php");
    }
    else {
        echo "Invalid value! Only letters and numbers are accepted!";
    }
?>