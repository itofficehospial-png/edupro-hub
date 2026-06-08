<?php
session_start();

$studentName = "Student";

// Example data
$activeProjects = 5;
$pendingFeedback = 2;
$deadlines = 3;

$notifications = [
    "New comment from Supervisor on Project A",
    "Project B deadline approaching",
    "New resource uploaded in Project C"
];

$recentActivities = [
    "Submitted Project Proposal for Project A",
    "Received feedback from Supervisor on Project B",
    "Marked Project C milestone as complete",
    "Updated profile information"
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student Dashboard</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Segoe UI",Tahoma,sans-serif;
}

body{
    background:#f2f6fb;
}

/* Header */
header{
    background:#1e3a8a;
    color:#fff;
    padding:18px;
    text-align:center;
}

/* Layout */
.container{
    display:flex;
    min-height:calc(100vh - 110px);
}

/* Sidebar */
.sidebar{
    width:260px;
    background:linear-gradient(180deg,#1e3a8a,#1e40af);
    padding:25px 0;
}

/* Profile section (NEW) */
.profile-section{
    text-align:center;
    margin-bottom:20px;
}

/* Student photo */
.student-photo{
    width:70px;
    height:70px;
    border-radius:100%;
    object-fit:cover;
    border:3px solid #38bdf8;
    margin-bottom:8px;
}

/* Student name */
.student-name{
    color:#e0e7ff;
    font-size:14px;
}

/* Sidebar title */
.sidebar h3{
    color:#e0e7ff;
    text-align:center;
    margin-bottom:25px;
    font-weight:500;
}

/* Links */
.sidebar a{
    display:flex;
    align-items:center;
    gap:10px;
    padding:14px 28px;
    color:#c7d2fe;
    text-decoration:none;
    font-size:15px;
    transition:all 0.3s ease;
    border-left:4px solid transparent;
}

.sidebar a:hover{
    background:rgba(255,255,255,0.08);
    color:#ffffff;
    border-left:4px solid #38bdf8;
}

/* Main content */
.main-content{
    flex:1;
    padding:40px;
    background:#f8fafc;
}

.main-content h2{
    color:#1e3a8a;
    margin-bottom:20px;
}

/* Cards */
.dashboard-cards{
    display:flex;
    flex-wrap:wrap;
    gap:20px;
    margin-bottom:30px;
}

.card-box{
    flex:1;
    min-width:220px;
    background:#ffffff;
    padding:25px;
    border-radius:14px;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    
}

.card:hover{
    transform:translateY(-5px);
    background:linear-gradient(135deg,#6366f1,#22d3ee);
}
.card-box h3{
    color:#1e3a8a;
    margin-bottom:10px;
}

.card-box p{
    font-size:26px;
    font-weight:bold;
}

/* Sections */
.section{
    background:#ffffff;
    padding:25px;
    border-radius:14px;
    margin-bottom:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
}

.section h3{
    margin-bottom:15px;
    color:#1e3a8a;
}

.section ul{
    list-style:none;
}

.section ul li{
    padding:10px 0;
    border-bottom:1px solid #eee;
}

/* Footer */
footer{
    background:#1e42a3;
    color:#fff;
    text-align:center;
    padding:12px;
}
</style>
</head>

<body>

<header>
    <h1>Student Project Management System</h1>
</header>

<div class="container">

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Student Profile (NEW) -->
        <div class="profile-section">
            <img src="OP.png" alt="Student Photo" class="student-photo">
            <p class="student-name"><?php echo $studentName; ?></p>
        </div>

        <h3>EduPro-Hub PMS</h3>
        <h4> <a href="StdDashboard.php">STUDENT DASHBOARD</a>
        <a href="ProjectDetail.php">PROJECT DETAILS</a>
        <a href="SubmitP.php">SUBMIT PROPOSAL</a>
        <a href="MyProject.php">PROJECT PROGRESS</a>
        <a href="UploadPR.php">UPLOAD PROGRESS REPORT</a>
        <a href="Notification.php">NOTIFICATION</a>
        <a href="Stdprofile.php">MY PROFILE</a>
        <a href="MessageChat.php">MESSAGE/CHAT</a>
        <a href="Help.php">HELPS/TUTORIAL</a>
        <a href="Logout.php">LOGOUT</a>
    </h4>
    </div>

    <!-- Main Dashboard -->
    <div class="main-content">

        <h2>Welcome, <?php echo $studentName; ?> 👨‍🎓</h2>

        <!-- Cards -->
        <div class="dashboard-cards">
            <div class="card-box">
                <h3>Active Projects</h3>
                <p><?php echo $activeProjects; ?></p>
            </div>

            <div class="card-box">
                <h3>Pending Feedback</h3>
                <p><?php echo $pendingFeedback; ?></p>
            </div>

            <div class="card-box">
                <h3>Deadlines</h3>
                <p><?php echo $deadlines; ?></p>
            </div>
        </div>

        <!-- Notifications -->
        <div class="section">
            <h3>Notifications Summary</h3>
            <ul>
                <?php foreach ($notifications as $note) {
                    echo "<li>$note</li>";
                } ?>
            </ul>
        </div>

        <!-- Recent Activity -->
        <div class="section">
            <h3>Recent Activity</h3>
            <ul>
                <?php foreach ($recentActivities as $activity) {
                    echo "<li>$activity</li>";
                } ?>
            </ul>
        </div>

    </div>

</div>

<footer>
    &copy; <?php echo date("Y"); ?> Student PMS | All Rights Reserved | PRIVACY ABOUT HELPS
</footer>

</body>
</html>