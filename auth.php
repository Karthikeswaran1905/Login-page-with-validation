<?php session_start();
require 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
    if ($action === 'register') {
        $name = trim($_POST['full_name']);
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        try {
            $stmt = $pdo->prepare("INSERT INTO students (full_name, email, password_hash) VALUES (?, ?, ?)");
            $stmt->execute([$name, $email, $hashed_password]);
            $_SESSION['success'] = "Registration successful! Please login.";
            header("Location: index.php");
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) { // Integrity constraint violation (duplicate email)
                $_SESSION['error'] = "Email already exists.";
            } else {
                $_SESSION['error'] = "Registration failed. Please try again.";
            }
            header("Location: index.php");
            exit;
        }
    }
    if ($action === 'login') {
        $email = trim($_POST['email']);
        $password = $_POST['password'];
        $stmt = $pdo->prepare("SELECT * FROM students WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        if ($user && password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['full_name'] = $user['full_name'];
            header("Location: dashboard.php");
            exit;
        } else {
            $_SESSION['error'] = "Invalid email or password.";
            header("Location: index.php");
            exit;
        }
    }
}
?>