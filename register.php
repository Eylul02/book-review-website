<?php 
session_start();
include('db.php'); // Veritabanı bağlantısını içe aktar

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Kullanıcıdan gelen verileri doğrula
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } elseif (strlen($password) < 6) {
        $error_message = "Password must be at least 6 characters long.";
    } else {
        // E-posta zaten kayıtlı mı kontrol et
        $sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            // Yeni kullanıcıyı ekle
            $password_hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (email, password) VALUES (?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $email, $password_hash);
            $stmt->execute();

            $_SESSION['user_id'] = $stmt->insert_id; // Oturumu başlat
            header("Location: index.php"); // Ana sayfaya yönlendir
            exit;
        } else {
            $error_message = "Email already registered.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css"> <!-- Harici bir CSS dosyası ekleyebilirsiniz -->
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
            background-color: #0056b3;
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
        <h2>Create an Account</h2>
        <form action="register.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <?php if (isset($error_message)): ?>
                <div class="form-group">
                    <p class="error"> <?= $error_message ?> </p>
                </div>
            <?php endif; ?>
            <button type="submit" class="btn">Register</button>
        </form>
        <div class="link">
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
</body>
</html>