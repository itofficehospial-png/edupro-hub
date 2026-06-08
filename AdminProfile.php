<?php

// ====================================
// ADMIN PROFILE DATA
// ====================================

$admin = [

    'name' => 'John Doe',

    'email' => 'admin@example.com',

    'institution' => 'EduPro Hub',

    'theme_color' => '#06b6d4'

];

// ====================================
// FORM SUBMISSION
// ====================================

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // UPDATE DETAILS

    if(isset($_POST['update_details'])){

        $admin['name'] =
        $_POST['name'];

        $admin['email'] =
        $_POST['email'];

        $admin['institution'] =
        $_POST['institution'];

        echo "
        <script>
        alert('Profile details updated successfully!');
        </script>
        ";

    }

    // CHANGE PASSWORD

    if(isset($_POST['change_password'])){

        $old_pass =
        $_POST['old_password'];

        $new_pass =
        $_POST['new_password'];

        $confirm_pass =
        $_POST['confirm_password'];

        if($new_pass === $confirm_pass){

            echo "
            <script>
            alert('Password changed successfully!');
            </script>
            ";

        }else{

            echo "
            <script>
            alert('Passwords do not match!');
            </script>
            ";

        }

    }

    // UPDATE PREFERENCES

    if(isset($_POST['update_preferences'])){

        $admin['theme_color'] =
        $_POST['theme_color'];

        echo "
        <script>
        alert('Preferences updated successfully!');
        </script>
        ";

    }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Administrator Profile</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Segoe UI, sans-serif;
}

body{
    min-height:100vh;
    color:white;
    background:
    linear-gradient(135deg,#020617,#0f172a,#111827);
}

/* ==========================
   TOPBAR
========================== */

.topbar{
    width:100%;
    height:75px;
    background:rgba(255,255,255,0.06);
    backdrop-filter:blur(12px);
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:0 30px;
    border-bottom:1px solid rgba(255,255,255,0.08);
}

.topbar h1{
    font-size:22px;
    color:#67e8f9;
}

.admin-box{
    background:rgba(255,255,255,0.08);
    padding:10px 18px;
    border-radius:12px;
    font-size:14px;
}

/* ==========================
   CONTROL DOCK
========================== */

.dock{
    width:95%;
    max-width:1200px;
    margin:25px auto;
    display:flex;
    flex-wrap:wrap;
    justify-content:center;
    gap:18px;
}

.dock a{
    text-decoration:none;
}

.dock-btn{
    width:115px;
    height:100px;
    background:rgba(255,255,255,0.08);
    border-radius:18px;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    color:white;
    transition:0.3s;
    backdrop-filter:blur(10px);
    box-shadow:0 10px 25px rgba(0,0,0,0.5);
}

.dock-btn:hover{
    transform:translateY(-6px);
    background:linear-gradient(135deg,#2563eb,#06b6d4);
}

.dock-btn span{
    font-size:30px;
    margin-bottom:8px;
}

.dock-btn p{
    font-size:13px;
}

/* ==========================
   MAIN CONTAINER
========================== */

.container{
    width:95%;
    max-width:1100px;
    margin:auto;
    padding-bottom:40px;
}

.panel{
    background:rgba(255,255,255,0.06);
    border-radius:22px;
    padding:35px;
    backdrop-filter:blur(12px);
    box-shadow:0 20px 40px rgba(0,0,0,0.5);
}

/* ==========================
   SECTIONS
========================== */

.section{
    margin-bottom:45px;
}

.section h2{
    color:#93c5fd;
    margin-bottom:20px;
}

/* ==========================
   FORM
========================== */

label{
    display:block;
    margin-bottom:8px;
    margin-top:14px;
    font-weight:600;
    color:#e2e8f0;
}

input[type="text"],
input[type="email"],
input[type="password"],
input[type="color"]{

    width:100%;
    padding:12px;
    border:none;
    border-radius:12px;
    background:rgba(255,255,255,0.08);
    color:white;
    outline:none;
    font-size:14px;
}

input[type="color"]{
    height:55px;
    padding:5px;
}

/* ==========================
   BUTTONS
========================== */

button{
    margin-top:18px;
    border:none;
    padding:12px 22px;
    border-radius:12px;
    cursor:pointer;
    color:white;
    font-size:15px;
    background:
    linear-gradient(135deg,#2563eb,#06b6d4);
    transition:0.3s;
}

button:hover{
    transform:scale(1.05);
}

/* ==========================
   PROFILE CARD
========================== */

.profile-card{
    display:flex;
    align-items:center;
    gap:20px;
    margin-bottom:30px;
    background:rgba(255,255,255,0.05);
    padding:20px;
    border-radius:18px;
}

.profile-avatar{
    width:90px;
    height:90px;
    border-radius:50%;
    background:
    linear-gradient(135deg,#2563eb,#06b6d4);
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:35px;
    font-weight:bold;
}

.profile-info h3{
    margin-bottom:6px;
    color:#e2e8f0;
}

.profile-info p{
    color:#94a3b8;
}

/* ==========================
   FOOTER
========================== */

footer{
    text-align:center;
    padding:25px;
    color:#94a3b8;
}

/* ==========================
   RESPONSIVE
========================== */

@media(max-width:768px){

    .topbar{
        flex-direction:column;
        height:auto;
        gap:10px;
        padding:18px;
        text-align:center;
    }

    .profile-card{
        flex-direction:column;
        text-align:center;
    }

    .dock-btn{
        width:100px;
        height:90px;
    }

}

</style>

</head>

<body>

<!-- ==========================
     TOPBAR
========================== -->

<div class="topbar">

    <h1>ADMINISTRATOR PROFILE CENTER</h1>

    <div class="admin-box">
        System Administrator
    </div>

</div>

<!-- ==========================
     CONTROL DOCK
========================== -->

<div class="dock">

    <a href="AdminD.php">
        <div class="dock-btn">
            <span>🏠</span>
            <p>Dashboard</p>
        </div>
    </a>

    <a href="UserManage.php">
        <div class="dock-btn">
            <span>👥</span>
            <p>Users</p>
        </div>
    </a>

    <a href="ProjectManage.php">
        <div class="dock-btn">
            <span>📁</span>
            <p>Projects</p>
        </div>
    </a>

    <a href="AdminNotification.php">
        <div class="dock-btn">
            <span>🔔</span>
            <p>Notifications</p>
        </div>
    </a>

    <a href="AdminReport.php">
        <div class="dock-btn">
            <span>📊</span>
            <p>Reports</p>
        </div>
    </a>

    <a href="Systemsetting.php">
        <div class="dock-btn">
            <span>⚙️</span>
            <p>Settings</p>
        </div>
    </a>

    <a href="AdminProfile.php">
        <div class="dock-btn">
            <span>🛡️</span>
            <p>Profile</p>
        </div>
    </a>

    <a href="AdminBackup.php">
        <div class="dock-btn">
            <span>💾</span>
            <p>Backup</p>
        </div>
    </a>

    <a href="AdminAuditlog.php">
        <div class="dock-btn">
            <span>📜</span>
            <p>Audit Logs</p>
        </div>
    </a>

     <!-- Logout -->
    <a href="Logout.php">
        <div class="dock-btn">
            <span>🔴</span>
            <p>Logout</p>
        </div>
    </a>

</div>

<!-- ==========================
     MAIN CONTENT
========================== -->

<div class="container">

    <div class="panel">

        <!-- PROFILE CARD -->

        <div class="profile-card">

            <div class="profile-avatar">
                👤
            </div>

            <div class="profile-info">

                <h3>
                    <?php echo htmlspecialchars($admin['name']); ?>
                </h3>

                <p>
                    <?php echo htmlspecialchars($admin['email']); ?>
                </p>

                <p>
                    <?php echo htmlspecialchars($admin['institution']); ?>
                </p>

            </div>

        </div>

        <!-- ADMIN DETAILS -->

        <div class="section">

            <h2>🛡️ Admin Details</h2>

            <form method="POST">

                <label>
                    Full Name
                </label>

                <input
                type="text"
                name="name"
                value="<?=
                htmlspecialchars($admin['name'])
                ?>"
                required>

                <label>
                    Email Address
                </label>

                <input
                type="email"
                name="email"
                value="<?=
                htmlspecialchars($admin['email'])
                ?>"
                required>

                <label>
                    Institution Name
                </label>

                <input
                type="text"
                name="institution"
                value="<?=
                htmlspecialchars($admin['institution'])
                ?>"
                required>

                <button
                type="submit"
                name="update_details">

                    Update Details

                </button>

            </form>

        </div>

        <!-- PASSWORD -->

        <div class="section">

            <h2>🔐 Change Password</h2>

            <form method="POST">

                <label>
                    Old Password
                </label>

                <input
                type="password"
                name="old_password"
                required>

                <label>
                    New Password
                </label>

                <input
                type="password"
                name="new_password"
                required>

                <label>
                    Confirm Password
                </label>

                <input
                type="password"
                name="confirm_password"
                required>

                <button
                type="submit"
                name="change_password">

                    Change Password

                </button>

            </form>

        </div>

        <!-- PREFERENCES -->

        <div class="section">

            <h2>🎨 System Preferences</h2>

            <form method="POST">

                <label>
                    Theme Color
                </label>

                <input
                type="color"
                name="theme_color"
                value="<?=
                htmlspecialchars($admin['theme_color'])
                ?>">

                <button
                type="submit"
                name="update_preferences">

                    Save Preferences

                </button>

            </form>

        </div>

    </div>

</div>

<!-- ==========================
     FOOTER
========================== -->

<footer>
    © 2025 EduPro Hub | Administrator Profile
</footer>

</body>
</html>