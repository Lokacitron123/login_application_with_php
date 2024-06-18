<?php




if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"]; // Corrected variable assignment
    $email = $_POST["email"]; // Corrected variable assignment

  
    try {
          // Include all necessary files at the beginning
    require_once "dbh.inc.php";
    require_once "signup_model.inc.php";
    require_once "signup_controller.inc.php";

    // Error handling
    $errors = [];

    if (is_input_empty($username, $password, $email)) {
        $errors["empty_input"] = "Fill in all fields!";
    }

    if (is_email_invalid($email)) {
        $errors["invalid_email"] = "Invalid email used!";
    }

    if (is_username_taken($pdo, $username)) {
        $errors["username_taken"] = "Username is already registered!";
    }

    if (is_email_registered($pdo, $email)) {
        $errors["email_taken"] = "Email is already registered!";
    }

    require_once "config_session.inc.php";

    if ($errors) {
        $_SESSION["errors_signup"] = $errors;

        // Assigning 
        $signupData = [
            "username" => $username,
            "email" => $email,
        ];

        $_SESSION["signupData"] = $signupData;

        header("Location: ../index.php");

        die();
    }


        create_user($pdo, $username, $password, $email);
        header("Location: ../index.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("Location: ../index.php"); // Redirect the user if they did not access this file via a POST method
    die();
}
?>
