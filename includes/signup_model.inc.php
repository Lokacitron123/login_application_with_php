<?php

declare(strict_types=1); // Allows us to have type declarations

// object $pdo is our setup connection to db
function get_username(object $pdo, string $username) {

     // SQL query to select the username from the users table
    $query = "SELECT username FROM users WHERE username = :username;";

     
    // Prepare the SQL statement
    $stmt = $pdo->prepare($query);

    // Bind the username parameter to the SQL query
    $stmt->bindParam(":username", $username);

    // Execute the SQL statement
    $stmt->execute();

     // Fetch the result as an associative array
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;

}

function get_email(object $pdo, string $email) {
      
    $query = "SELECT email FROM users WHERE username = :email;";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":email", $email);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;

}

function set_user($pdo, $username, $email, $hashedPassword) {
  $query = "INSERT INTO users (username, pwd, email) VALUES (:username, :pwd, :email)";
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":username", $username, PDO::PARAM_STR);
    $stmt->bindParam(":pwd", $hashedPassword, PDO::PARAM_STR);
    $stmt->bindParam(":email", $email, PDO::PARAM_STR);

    return $stmt->execute();
}