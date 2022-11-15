<?php
    require_once("classes.php");

    $id = $_GET["id"];

    // Check if value is numeric
    if(is_numeric($id)) {
        Main::DeleteStudent($id);
        header("location: index.php");
    }
    else {
        echo "Invalid value!!";
    }
?>