<?php
session_start();

$adminName = "System Administrator";

/* =========================
   DATABASE CONNECTION
========================= */
$conn = new mysqli("localhost", "root", "", "RegistrationDB");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/* =========================
   FETCH SYSTEM TOTALS
========================= */

// Total Users
$resultUsers = $conn->query("SELECT COUNT(*) AS total FROM register");
$totalUsers = ($resultUsers && $row = $resultUsers->fetch_assoc()) ? $row['total'] : 0;

// Total Projects (⚠️ change table if you have a real projects table)
$resultProjects = $conn->query("SELECT COUNT(*) AS total FROM register");
$totalProjects = ($resultProjects && $row = $resultProjects->fetch_assoc()) ? $row['total'] : 0;

// Total Supervisors
$resultSupervisors = $conn->query("SELECT COUNT(*) AS total FROM register WHERE Role='Supervisor'");
$totalSupervisors = ($resultSupervisors && $row = $resultSupervisors->fetch_assoc()) ? $row['total'] : 0;

/* =========================
   FETCH USERS FOR TABLE
========================= */

$users = $conn->query("SELECT Name, Email, Role FROM register");

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Administrator Control Dock</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Segoe UI, sans-serif;
}

body{
    background:
    linear-gradient(#020617,#0f172a,#111810);
    min-height:100vh;
    color:white;
}

/* =======================
   TOP NAVBAR
======================= */

.topbar{
    width:100%;
    height:75px;
    background:rgba(255,255,255,0.06);
    backdrop-filter:blur(10px);
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 30px;
    border-bottom:1px solid rgba(255,255,255,0.08);
}

.topbar h1{
    font-size:22px;
    color:#67e8f9;
    letter-spacing:1px;
}

.admin-box{
    background:rgba(255,255,255,0.08);
    padding:10px 18px;
    border-radius:12px;
    font-size:14px;
}

/* =======================
   CONTROL DOCK
======================= */

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
    backdrop-filter:blur(12px);
    box-shadow:0 10px 25px rgba(0,0,0,0.5);
}

.dock-btn:hover{
    transform:translateY(-7px);
    background:linear-gradient(135deg,#2563eb,#06b6d4);
}

.dock-btn span{
    font-size:32px;
    margin-bottom:8px;
}

.dock-btn p{
    font-size:13px;
    text-align:center;
}

/* =======================
   MAIN CONTENT
======================= */

.container{
    width:95%;
    max-width:1200px;
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

/* =======================
   CARDS
======================= */

.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(240px,1fr));
    gap:25px;
    margin-top:30px;
}

.card{
    background:rgba(255,255,255,0.08);
    border-radius:18px;
    padding:30px;
    transition:0.3s;
}

.card:hover{
    transform:translateY(-6px);
    background:linear-gradient(135deg,#4338ca,#0891b2);
}

.card h2{
    font-size:35px;
    margin-bottom:10px;
}

.card p{
    font-size:15px;
    opacity:0.9;
}

/* =======================
   QUICK TABLE
======================= */

table{
    width:100%;
    margin-top:25px;
    border-collapse:collapse;
}

table th{
    background:rgba(255,255,255,0.08);
    color:#67e8f9;
    padding:14px;
    text-align:left;
}

table td{
    padding:14px;
    border-bottom:1px solid rgba(255,255,255,0.08);
}

/* =======================
   RESPONSIVE
======================= */

@media(max-width:768px){

    .topbar{
        flex-direction:column;
        justify-content:center;
        gap:8px;
        height:auto;
        padding:18px;
        text-align:center;
    }

    .dock-btn{
        width:100px;
        height:95px;
    }

}

</style>
</head>
<body>

<!-- ======================
     TOPBAR
====================== -->

<div class="topbar">

    <h1>ADMINISTRATOR CONTROL CENTER</h1>

    <div class="admin-box">
        Welcome, <?php echo $adminName; ?>
    </div>

</div>

<!-- ======================
     CONTROL DOCK
====================== -->

<div class="dock">

    <!-- Dashboard -->
    <a href="AdminD.php">
        <div class="dock-btn">
            <span>🏠</span>
            <p>Dashboard</p>
        </div>
    </a>

    <!-- Users -->
    <a href="UserManage.php">
        <div class="dock-btn">
            <span>👥</span>
            <p>Users</p>
        </div>
    </a>

    <!-- Projects -->
    <a href="ProjectManage.php">
        <div class="dock-btn">
            <span>📁</span>
            <p>Projects</p>
        </div>
    </a>

    <!-- Notifications -->
    <a href="AdminNotification.php">
        <div class="dock-btn">
            <span>🔔</span>
            <p>Notifications</p>
        </div>
    </a>

    <!-- Reports -->
    <a href="AdminReport.php">
        <div class="dock-btn">
            <span>📊</span>
            <p>Reports</p>
        </div>
    </a>

    <!-- Settings -->
    <a href="Systemsetting.php">
        <div class="dock-btn">
            <span>⚙️</span>
            <p>Settings</p>
        </div>
    </a>

    <!-- Profile -->
    <a href="AdminProfile.php">
        <div class="dock-btn">
            <span>🛡️</span>
            <p>Profile</p>
        </div>
    </a>

    <!-- Backup -->
    <a href="AdminBackup.php">
        <div class="dock-btn">
            <span>💾</span>
            <p>Backup</p>
        </div>
    </a>

    <!-- Audit Logs -->
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

<!-- ======================
     MAIN CONTENT
====================== -->

<div class="container">

    <div class="panel">

        <h2 style="color:#93c5fd;">
            System Overview
        </h2>

        <!-- CARDS -->

        <div class="cards">

            <div class="card">
                <h2><?php echo $totalUsers; ?></h2>
                <p>Total Registered Users</p>
            </div>

            <div class="card">
                <h2><?php echo $totalProjects; ?></h2>
                <p>Total Uploaded Projects</p>
            </div>

            <div class="card">
                <h2><?php echo $totalSupervisors; ?></h2>
                <p>Total Supervisors</p>
            </div>

        </div>

        <!-- SAMPLE TABLE -->

        <table>

            <tr>
                <th>Name</th>
                <th>Role</th>
                <th>Status</th>
                <th>Email</th>
                
            </tr>

            <tr>
                <td>Jane Doe</td>
                <td>Student</td>
                <td>Active</td>
            </tr>

            <tr>
                <td>Dr. Michael</td>
                <td>Supervisor</td>
                <td>Active</td>
            </tr>

            <tr>
                <td>Admin User</td>
                <td>Administrator</td>
                <td>Online</td>
            </tr>

        </table>

    </div>

</div>

</body>
</html>