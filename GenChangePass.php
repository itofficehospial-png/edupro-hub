<?php
session_start();

// Example: you can use $_SESSION['role'] = 'student'; // or 'supervisor', 'admin'
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = "Guest";
    $_SESSION['role'] = "student"; // default for demo
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("config.php"); // your DB connection file

    $user = $_SESSION['user'];
    $role = $_SESSION['role'];
    $current = $_POST['current_password'];
    $new = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];

    // Fetch current password from DB (example)
    $sql = "SELECT password FROM users WHERE username='$user' AND role='$role'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (password_verify($current, $row['password'])) {
        if ($new === $confirm) {
            $hashed = password_hash($new, PASSWORD_DEFAULT);
            $update = "UPDATE users SET password='$hashed' WHERE username='$user'";
            if (mysqli_query($conn, $update)) {
                $message = "<p class='success'>✅ Password changed successfully!</p>";
            } else {
                $message = "<p class='error'>❌ Database update failed.</p>";
            }
        } else {
            $message = "<p class='error'>⚠️ New passwords do not match!</p>";
        }
    } else {
        $message = "<p class='error'>❌ Current password incorrect!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Change Password | EduPro Hub</title>
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: #f5f8fc;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background: white;
        width: 400px;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    h2 {
        text-align: center;
        color: #00609b;
        margin-bottom: 20px;
    }

    label {
        font-weight: 600;
        display: block;
        margin-bottom: 5px;
    }

    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 8px;
        outline: none;
        font-size: 15px;
    }

    input[type="password"]:focus {
        border-color: #00609b;
    }

    .strength {
        height: 8px;
        border-radius: 5px;
        margin-top: -10px;
        margin-bottom: 15px;
    }

    .btn {
        background: #00609b;
        color: white;
        border: none;
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        transition: 0.3s;
    }

    .btn:hover {
        background: #004d7a;
    }

    .success { color: green; text-align:center; }
    .error { color: red; text-align:center; }

    .role-info {
        text-align: center;
        margin-bottom: 10px;
        color: #666;
        font-size: 14px;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Change Password</h2>
    <div class="role-info">
        Logged in as: <strong><?php echo ucfirst($_SESSION['role']); ?></strong>
    </div>

    <?php echo $message; ?>

    <form method="POST" action="">
        <label>Current Password</label>
        <input type="password" name="current_password" required>

        <label>New Password</label>
        <input type="password" id="new_password" name="new_password" required>
        <div id="strength-bar" class="strength"></div>

        <label>Confirm New Password</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <div id="match-status"></div>

        <button type="submit" class="btn">Save Changes</button>
    </form>
</div>

<script>
const password = document.getElementById('new_password');
const strengthBar = document.getElementById('strength-bar');
const confirm = document.getElementById('confirm_password');
const matchStatus = document.getElementById('match-status');

password.addEventListener('input', () => {
    const val = password.value;
    let strength = 0;
    if (val.match(/[a-z]+/)) strength++;
    if (val.match(/[A-Z]+/)) strength++;
    if (val.match(/[0-9]+/)) strength++;
    if (val.match(/[$@#&!]+/)) strength++;
    if (val.length >= 8) strength++;

    switch (strength) {
        case 0:
            strengthBar.style.width = "0";
            strengthBar.style.background = "transparent";
            break;
        case 1:
            strengthBar.style.width = "20%";
            strengthBar.style.background = "red";
            break;
        case 2:
            strengthBar.style.width = "40%";
            strengthBar.style.background = "orange";
            break;
        case 3:
            strengthBar.style.width = "60%";
            strengthBar.style.background = "#ffb400";
            break;
        case 4:
            strengthBar.style.width = "80%";
            strengthBar.style.background = "#00bfff";
            break;
        case 5:
            strengthBar.style.width = "100%";
            strengthBar.style.background = "green";
            break;
    }
});

confirm.addEventListener('input', () => {
    if (confirm.value === password.value) {
        matchStatus.textContent = "✅ Passwords match";
        matchStatus.style.color = "green";
    } else {
        matchStatus.textContent = "⚠️ Passwords do not match";
        matchStatus.style.color = "red";
    }
});
</script>
</body>
</html>
