<?php
session_start();

$studentName = "Student";

// Example projects data
$projects = [
    ["title" => "Project A", "status" => "Active", "supervisor" => "Dr. Smith", "deadline" => "2025-11-15"],
    ["title" => "Project B", "status" => "Pending Feedback", "supervisor" => "Dr. Johnson", "deadline" => "2025-11-20"],
    ["title" => "Project C", "status" => "Completed", "supervisor" => "Prof. Adams", "deadline" => "2025-10-30"],
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

.profile-section{
    text-align:center;
    margin-bottom:20px;
}

.student-photo{
    width:70px;
    height:70px;
    border-radius:100%;
    border:3px solid #38bdf8;
    margin-bottom:8px;
}

.student-name{
    color:#e0e7ff;
    font-size:14px;
}

.sidebar h3{
    color:#e0e7ff;
    text-align:center;
    margin-bottom:25px;
}

.sidebar a{
    display:flex;
    padding:14px 28px;
    color:#c7d2fe;
    text-decoration:none;
}

.sidebar a:hover{
    background:rgba(255,255,255,0.08);
    color:#fff;
}

/* Main content */
.main-content{
    flex:1;
    padding:40px;
    background:#f8fafc;
}

/* TABLE SECTION */
.container-box {
    max-width: 1200px;
    margin: auto;
    background: white;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
}

h2 {
    color: #00609b;
    text-align: center;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 12px;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #00609b;
    color: white;
}

tr:hover {
    background-color: #f1f1f1;
}

.btn {
    padding: 8px 12px;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    color: white;
}

.view-btn { background:#28a745; }
.upload-btn { background:#ffc107; color:#333; }

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
        <div class="profile-section">
            <img src="OP.png" class="student-photo">
            <p class="student-name"><?php echo $studentName; ?></p>
        </div>

        <h3>EduPro-Hub PMS</h3>
        <h4>
             <a href="StdDashboard.php">STUDENT DASHBOARD</a>
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

    <!-- MAIN CONTENT (PROJECT PAGE INSERTED) -->
   <div class="main-content">

    <div class="container-box">
        <h2>My Projects</h2>

        <table>
            <thead>
                <tr>
                    <th>Project Title</th>
                    <th>Status</th>
                    <th>Supervisor</th>
                    <th>Deadline</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?php echo htmlspecialchars($project['title']); ?></td>
                    <td><?php echo htmlspecialchars($project['status']); ?></td>
                    <td><?php echo htmlspecialchars($project['supervisor']); ?></td>
                    <td><?php echo htmlspecialchars($project['deadline']); ?></td>
                    <td>
                        <!-- Action buttons go here -->
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

</div>