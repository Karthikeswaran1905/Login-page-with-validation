<?php session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Student Portal</title>
    <style>
        body { font-family: 'Montserrat', sans-serif; background: #f6f5f7; margin: 0; padding: 0; }
        .nav { background-color: #0056b3; color: white; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; }
        .nav a { color: white; text-decoration: none; font-weight: bold; padding: 8px 15px; border: 1px solid white; border-radius: 20px; transition: 0.3s; }
        .nav a:hover { background: white; color: #0056b3; }
        .content { padding: 40px; text-align: center; }
        .card { background: white; padding: 40px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); max-width: 600px; margin: 0 auto; }
    </style>
</head>
<body>
<div class="nav">
    <div><strong>Student Portal</strong></div>
    <div><a href="logout.php">Logout</a></div>
</div>
<div class="content">
    <div class="card">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['full_name']); ?>!</h2>
        <p>You have successfully authenticated and are now securely logged into your dashboard.</p>
    </div>
</div>
</body>
</html>