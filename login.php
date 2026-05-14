<?php  
session_start();
include('db.php'); // Database connection

$error_message = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Check the user in the database
    $sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        // Regenerate session ID for security
        session_regenerate_id(true);

        // Set session variables
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $email; // Store the email for display on index_welcome.php

        // Redirect to index_welcome.php
        header("Location: index_welcome.php");
        exit;
    } else {
        $error_message = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group input:focus {
            border-color: #00796b;
            outline: none;
        }
        .form-group .error {
            color: red;
            font-size: 0.9em;
            margin-top: 5px;
        }
        .btn {
            width: 100%;
            padding: 10px;
            background-color: #00796b;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #005d54;
        }
        .link {
            text-align: center;
            margin-top: 15px;
        }
        .link a {
            color: #449f98;
            text-decoration: none;
        }
        .link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login to Your Account</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <?php if (!empty($error_message)): ?>
                <div class="form-group">
                    <p class="error"><?= htmlspecialchars($error_message) ?></p>
                </div>
            <?php endif; ?>
            <button type="submit" class="btn">Login</button>
        </form>
        <div class="link">
            <p>Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>
</body>
</html>