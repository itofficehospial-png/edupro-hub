<?php
session_start();

// If user confirms logout
if (isset($_POST['confirm_logout'])) {
    session_destroy();
    header("Location: Home.php");
    exit();
}
?>

<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Logout | EduPro Hub</title>

<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background: linear-gradient(135deg, #00609b, #00c6ff);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .logout-box {
        background: white;
        width: 400px;
        padding: 35px;
        border-radius: 15px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        text-align: center;
        animation: fadeIn 0.5s ease-in-out;
    }

    @keyframes fadeIn {
        from {opacity: 0; transform: translateY(20px);}
        to {opacity: 1; transform: translateY(0);}
    }

    h2 {
        color: #00609b;
        margin-bottom: 15px;
    }

    p {
        color: #444;
        font-size: 15px;
        margin-bottom: 30px;
    }

    .btn {
        padding: 12px 28px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        font-size: 15px;
        font-weight: 600;
        transition: 0.3s;
        margin: 8px;
    }

    .confirm {
        background: #00609b;
        color: white;
    }

    .confirm:hover {
        background: #004c7a;
    }

    .cancel {
        background: #ddd;
        color: #333;
    }

    .cancel:hover {
        background: #bbb;
    }

    footer {
        margin-top: 20px;
        font-size: 13px;
        color: #777;
    }
</style>

</head>

<body>

<div class="logout-box">
    <h2>Confirm Logout</h2>
    <p>Are you sure you want to logout from <strong>EduPro Hub Management System</strong>?</p>

```
<!-- Logout Form -->
<form method="POST">
    <button type="submit" name="confirm_logout" class="btn confirm">Yes, Logout</button>
    <button type="button" class="btn cancel" onclick="cancelLogout()">Cancel</button>
</form>

<footer>© 2025 EduPro Hub</footer>
```

</div>

<script>
function cancelLogout() {
    // Go back to previous page
    window.history.back();
}
</script>

</body>
</html>
