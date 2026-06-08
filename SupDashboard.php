<?php
session_start();

if(!isset($_SESSION['user'])){
  $_SESSION['user'] = "Supervisor";
}

$supervisorName = "Dr. John Doe";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Supervisor Dashboard</title>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Segoe UI, Tahoma, sans-serif;
}

body{
    background:#f4f6f8;
}

/* Top bar */
.topbar{
    height:60px;
    background:#0f766e;
    color:#ecfeff;
    display:flex;
    align-items:center;
    padding:0 20px;
    gap:20px;
}

.menu-btn{
    font-size:26px;
    cursor:pointer;
}

.topbar h2{
    font-size:20px;
}

/* Layout */
.wrapper{
    display:flex;
    height:calc(100vh - 60px);
}

/* Sidebar */
.sidebar{
    width:0;
    overflow:hidden;
    background:#ffffff;
    border-right:1px solid #e5e7eb;
    transition:0.3s;
}

.sidebar.open{
    width:230px;
}

.sidebar a{
    display:block;
    padding:14px 20px;
    color:#065f46;
    text-decoration:none;
}

.sidebar a:hover{
    color:#0f766e;
}

/* Main content */
.main{
    flex:1;
    padding:25px;
    overflow-y:auto;
}

/* Dashboard styles */
.stats{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
    margin-bottom:25px;
}

.card{
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 4px 12px rgba(0,0,0,0.08);
    text-align:center;
}

.card h3{
    font-size:16px;
    margin-bottom:10px;
}

.card p{
    font-size:22px;
    color:#0f766e;
}

.panel{
    background:white;
    padding:20px;
    border-radius:10px;
    box-shadow:0 4px 12px rgba(0,0,0,0.08);
    margin-bottom:25px;
}

table{
    width:100%;
    border-collapse:collapse;
}

th,td{
    padding:12px;
    border-bottom:1px solid #eee;
}

th{
    background:#0f766e;
    color:white;
}

button{
    padding:8px 14px;
    border:none;
    background:#0f766e;
    color:white;
    border-radius:6px;
    cursor:pointer;
}

button:hover{
    background:#115e59;
}
</style>

<script>
function toggleMenu(){
    document.getElementById("sidebar").classList.toggle("open");
}
</script>

</head>

<body>

<!-- Top bar -->
<div class="topbar">
    <div class="menu-btn" onclick="toggleMenu()">☰</div>
    <h2>Supervisor Dashboard</h2>
    <div style="margin-left:auto;">Welcome, <?php echo $_SESSION['user']; ?> 👋</div>
</div>

<div class="wrapper">

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        
        <h4><a href="SupDashboard.php">Supervisor dashboard</a>
        <a href="AssignedPro.php">Assigned Projects</a>
        <a href="ProjectR.php">Project Review</a>
        <a href="SupFeedback.php">Give Feedback</a>
        <a href="MeetingDiscussion.php">Meeting / Discussion</a>
        <a href="Report.php">Generate Report</a>
        <a href="SupNotification.php">Get Notifications</a>
        <a href="SupProfile.php">Supervisors Profile</a>
        <a href="Logout.php">LOGOUT</a>
        </h4>
    </div>

    <!-- Main Dashboard -->
    <div class="main">

        <!-- Stats -->
        <div class="stats">
            <div class="card">
                <h3>Active Students</h3>
                <p>35</p>
            </div>
            <div class="card">
                <h3>Pending Approvals</h3>
                <p>6</p>
            </div>
            <div class="card">
                <h3>Latest Submissions</h3>
                <p>12</p>
            </div>
        </div>

        <!-- Chart -->
        <div class="panel">
            <h3>Student Progress Overview</h3>
            <canvas id="progressChart"></canvas>
        </div>

        <!-- Table -->
        <div class="panel">
            <h3>Recent Project Submissions</h3>
            <table>
                <tr>
                    <th>Student Name</th>
                    <th>Project Title</th>
                    <th>Date Submitted</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>Mary Atim</td>
                    <td>AI in Health Diagnostics</td>
                    <td>Nov 2, 2025</td>
                    <td>Approved</td>
                </tr>
                <tr>
                    <td>John Odongo</td>
                    <td>Blockchain in Education</td>
                    <td>Nov 1, 2025</td>
                    <td>Pending</td>
                </tr>
                <tr>
                    <td>Grace Akello</td>
                    <td>IoT for Smart Farming</td>
                    <td>Oct 31, 2025</td>
                    <td>Approved</td>
                </tr>
            </table>
        </div>

        <!-- Buttons -->
        <div class="panel">
            <button onclick="location.href='projects.php'">View Projects</button>
            <button onclick="location.href='reports.php'">View Reports</button>
        </div>

    </div>

</div>

<script>
const ctx = document.getElementById('progressChart');

new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Mary','John','Grace','Allan','Rita','Brian'],
        datasets: [{
            label: 'Completion %',
            data: [95,72,88,60,77,82],
            backgroundColor:'#0f766e'
        }]
    },
    options: {
        responsive:true,
        scales:{
            y:{beginAtZero:true,max:100}
        }
    }
});
</script>

</body>
</html>