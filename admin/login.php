<?php
session_start();
if($_POST["uname"] == "admin@admin"){
    if($_POST["passwd"]=="adminadmin"){
        $_SESSION["admin"] = "true";
        header("Location: /admin/home.php");
        die();
    }else{
        echo("Password Wrong");
    }
}
else{
    echo("Username Wrong");
}

?>