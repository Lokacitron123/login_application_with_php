<?php

declare(strict_types=1); // Allows us to have type declarations

function is_input_empty(string $username,string $password,string $email) {
    if (empty($username) || empty($password) || empty($email)) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid(string $email) {
    // Built in function for filtering
    // check value ($email) against filter (FILTER_VALIDATE_EMAIL)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}


function is_username_taken($pdo, string $username) {
    // Query DB to check if username is taken
   
    if (get_username($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}


function is_email_registered($pdo, string $email) {
    // Query DB to check if username is taken
   
    if (get_email($pdo, $email)) {
        return true;
    } else {
        return false;
    }
}

function create_user(object $pdo, string $username,string $password,string $email) {

    // Stops bruteforcing
    $options = [
        "cost" => 12
    ];

    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);


    set_user($pdo, $username, $email, $hashedPassword);
}

