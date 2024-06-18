<?php

declare(strict_types=1); // Allows us to have type declarations

function check_signup_errors() {
    if (isset($_SESSION["errors_signup"])) {
        $errors = $_SESSION["errors_signup"];

        echo "<br>";

        foreach($errors as $error) {
            echo "<p class='text-2xl font-bold text-red-500'>" . htmlspecialchars($error) . "</p>";
        }

        unset($_SESSION["errors_signup"]); // Empties errors after displaying
    } else if (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        echo "<br>";
        echo "<p class='text-2xl font-bold text-green-500'>Signup Successful!</p>";
    }
}

function signup_username_inputs() {
    if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["errors_signup"]["username_taken"])) {
        echo 'value="' . $_SESSION["signup_data"]["username"] . '"';
    }

}

function signup_email_inputs() {
     if (isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["email_taken"])) {
        echo 'value="' . $_SESSION["signup_data"]["email"] . '"';
    }
}

