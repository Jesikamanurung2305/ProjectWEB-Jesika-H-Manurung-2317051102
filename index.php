<?php
session_start();
require_once "db.php";

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION["username"] = $user['username'];
            $_SESSION["role"] = $user['role'];
            header("Location: dasboard.php");
            exit;
        }
    }
    $error = "Username atau password salah!";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - CRUD App</title>
    <link rel="stylesheet" href="assets/style.css">
    <script src="assets/js/validate.js" defer></script>
</head>
<body>
<div class="form-container">
    <h2>Login</h2>
    <?php if ($error): ?><div class="error"><?= $error ?></div><?php endif; ?>
    <form method="POST" action="" onsubmit="return validateLogin();">
        <input type="text" name="username" id="username" placeholder="Username" required><br>
        <input type="password" name="password" id="password" placeholder="Password" required><br>
        <button type="submit">Masuk</button>
    </form>
</div>
</body>
</html>