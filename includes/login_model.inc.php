<?php

declare(strict_types=1);

function get_user(object $pdo, string $username) {
    // selects everything with *
    $query = "SELECT * from users WHERE username = :username;";

    $stmt = $pdo->prepare($query);

    $stmt->bindParam(":username", $username);

    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}