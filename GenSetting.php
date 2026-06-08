<?php
session_start();

// Example session data for testing
if (!isset($_SESSION['user'])) {
    $_SESSION['user'] = "GuestUser";
    $_SESSION['role'] = "student";
}

$message = "";

// Save preferences to database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include("config.php"); // database connection

    $user = $_SESSION['user'];
    $role = $_SESSION['role'];
    $notifications = isset($_POST['notifications']) ? 1 : 0;
    $theme = $_POST['theme'];
    $language = $_POST['language'];

    // Update settings (assuming you have a 'settings' table)
    $query = "UPDATE users SET notifications='$notifications', theme='$theme', language='$language' WHERE username='$user'";
    if (mysqli_query($conn, $query)) {
        $message = "<p class='success'>✅ Settings updated successfully!</p>";
    } else {
        $message = "<p class='error'>❌ Failed to update settings.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Settings | EduPro Hub</title>
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-color: #f5f8fc;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        transition: background 0.4s, color 0.4s;
    }

    .container {
        background: #fff;
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
        display: block;
        margin: 10px 0 5px;
        font-weight: 600;
        color: #333;
    }

    .toggle-switch {
        position: relative;
        width: 50px;
        height: 25px;
        background-color: #ccc;
        border-radius: 25px;
        cursor: pointer;
        transition: 0.3s;
    }

    .toggle-switch::after {
        content: "";
        position: absolute;
        top: 2px;
        left: 3px;
        width: 21px;
        height: 21px;
        background-color: #fff;
        border-radius: 50%;
        transition: 0.3s;
    }

    input[type="checkbox"]:checked + .toggle-switch {
        background-color: #00609b;
    }

    input[type="checkbox"]:checked + .toggle-switch::after {
        transform: translateX(24px);
    }

    select {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 15px;
        margin-bottom: 15px;
    }

    .btn {
        background: #00609b;
        color: white;
        border: none;
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }

    .btn:hover {
        background: #004d7a;
    }

    .success { color: green; text-align: center; }
    .error { color: red; text-align: center; }

    .role-info {
        text-align: center;
        margin-bottom: 10px;
        color: #666;
        font-size: 14px;
    }

    /* Dark theme */
    body.dark {
        background: #1e1e2f;
        color: white;
    }

    body.dark .container {
        background: #2a2a40;
        color: #ddd;
        box-shadow: 0 4px 10px rgba(255,255,255,0.1);
    }

    body.dark select, body.dark .btn {
        background: #333;
        color: #fff;
        border-color: #555;
    }
</style>
</head>
<body>
<div class="container">
    <h2>Settings</h2>
    <div class="role-info">Logged in as: <strong><?php echo ucfirst($_SESSION['role']); ?></strong></div>
    <?php echo $message; ?>

    <form method="POST" action="">
        <label>Notifications</label>
        <input type="checkbox" id="notifications" name="notifications" style="display:none;">
        <label for="notifications" class="toggle-switch"></label>

        <label>Theme</label>
        <select name="theme" id="theme">
            <option value="light">Light</option>
            <option value="dark">Dark</option>
        </select>

        <label>Language</label>
        <select name="language" id="language">
            <option value="en">English</option>
            <option value="fr">French</option>
            <option value="sw">Swahili</option>
        </select>

        <button type="submit" class="btn">Save Preferences</button>
    </form>
</div>

<script>
const themeSelect = document.getElementById('theme');
const notifications = document.getElementById('notifications');

themeSelect.addEventListener('change', () => {
    if (themeSelect.value === 'dark') {
        document.body.classList.add('dark');
    } else {
        document.body.classList.remove('dark');
    }
});

// Save theme preference in local storage for instant preview
window.addEventListener('load', () => {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        themeSelect.value = savedTheme;
        if (savedTheme === 'dark') {
            document.body.classList.add('dark');
        }
    }
});

themeSelect.addEventListener('change', () => {
    localStorage.setItem('theme', themeSelect.value);
});
</script>
</body>
</html>
