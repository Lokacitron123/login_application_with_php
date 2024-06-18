<?php

declare(strict_types=1);

function check_login_errors() {

    if(isset($_SESSION["errors_login"])) {
        $errors = $_SESSION["errors_login"];

        foreach($errors as $error) {
            echo "<p class='text-2xl font-bold text-red-500'>" . htmlspecialchars($error) . "</p>";
        }

        unset($_SESSION["errors_login"]);
    } else if (isset($_GET['login']) && $_GET['login'] === "success") {
        
        echo "<br>";
        echo "<p class='text-2xl font-bold text-green-500'>Login successful!</p>";
    }

}

function is_user_loggedin() {
    // Check if user is logged in
    if (isset($_SESSION["user_id"]) && isset($_SESSION["user_username"])) {
        return true;
    }
    return false;
}

function display_loggedin_user() {
    if (is_user_loggedin()) {
        $username = htmlspecialchars($_SESSION["user_username"]);
        echo "<p class='text-xl font-bold text-blue-500'>Welcome, $username!</p>";
    } else {
        echo "<p class='text-xl font-bold text-blue-500'>You are not logged in.</p>";
    }
}