<?php
session_start();

if(!isset($_SESSION['user'])){
    $_SESSION['user'] = "Supervisor";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Assigned Projects | EduPro Hub</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Segoe UI',sans-serif;
    background:#f4f6f8;
}

/* Topbar */
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
    height:100%;
}

.sidebar.open{
    width:230px;
}

.sidebar a{
    display:block;
    padding:14px 20px;
    color:#065f46;
    text-decoration:none;
    transition:0.3s;
}

.sidebar a:hover{
    background:#f0fdfa;
    color:#0f766e;
}

/* Main Content */
.main-content{
    flex:1;
    padding:25px;
    overflow-y:auto;
}

h3{
    color:#333;
    margin-bottom:15px;
}

/* Table */
table{
    width:100%;
    border-collapse:collapse;
    background:white;
    border-radius:10px;
    overflow:hidden;
    box-shadow:0 3px 10px rgba(0,0,0,0.1);
}

th, td{
    padding:14px 18px;
    text-align:left;
    border-bottom:1px solid #eee;
}

th{
    background:#0f766e;
    color:white;
    font-weight:500;
}

tr:hover{
    background:#f1f9ff;
}

/* Status */
.status{
    font-weight:600;
    border-radius:6px;
    padding:6px 10px;
    display:inline-block;
}

.pending{
    background:#fff3cd;
    color:#856404;
}

.approved{
    background:#d4edda;
    color:#155724;
}

.completed{
    background:#cce5ff;
    color:#004085;
}

/* Button */
.btn{
    background:#00609b;
    color:white;
    border:none;
    padding:8px 14px;
    border-radius:6px;
    cursor:pointer;
    transition:0.3s;
}

.btn:hover{
    background:#0f766e;
}

/* Footer */
footer{
    text-align:center;
    padding:15px;
    color:#777;
    font-size:14px;
    background:#fff;
    border-top:1px solid #ddd;
}

/* Mobile */
@media (max-width:768px){

    table, thead, tbody, th, td, tr{
        display:block;
    }

    th{
        display:none;
    }

    td{
        border:none;
        position:relative;
        padding-left:50%;
        text-align:right;
    }

    td::before{
        position:absolute;
        top:14px;
        left:18px;
        width:45%;
        white-space:nowrap;
        font-weight:bold;
        color:#00609b;
    }

    td:nth-of-type(1)::before { content:"Student Name"; }
    td:nth-of-type(2)::before { content:"Project Title"; }
    td:nth-of-type(3)::before { content:"Status"; }
    td:nth-of-type(4)::before { content:"Action"; }
}
</style>
</head>

<body>

<!-- Topbar -->
<div class="topbar">
    <div class="menu-btn" onclick="toggleSidebar()">☰</div>
    <h2>Assigned Projects</h2>

    <div style="margin-left:auto;">
        Welcome, <?php echo $_SESSION['user']; ?> 👋
    </div>
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

    <!-- Main Content -->
    <div class="main-content">

        <h3>List of Assigned Projects</h3>

        <table>
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Project Title</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>Mary Atim</td>
                    <td>AI in Health Diagnostics</td>
                    <td><span class="status approved">Approved</span></td>
                    <td>
                        <button class="btn" onclick="viewDetails('AI in Health Diagnostics')">
                            View Details
                        </button>
                    </td>
                </tr>

                <tr>
                    <td>John Odongo</td>
                    <td>Blockchain in Education</td>
                    <td><span class="status pending">Pending</span></td>
                    <td>
                        <button class="btn" onclick="viewDetails('Blockchain in Education')">
                            View Details
                        </button>
                    </td>
                </tr>

                <tr>
                    <td>Grace Akello</td>
                    <td>IoT for Smart Farming</td>
                    <td><span class="status completed">Completed</span></td>
                    <td>
                        <button class="btn" onclick="viewDetails('IoT for Smart Farming')">
                            View Details
                        </button>
                    </td>
                </tr>

                <tr>
                    <td>Brian Owor</td>
                    <td>Mobile App for Clinic Management</td>
                    <td><span class="status approved">Approved</span></td>
                    <td>
                        <button class="btn" onclick="viewDetails('Mobile App for Clinic Management')">
                            View Details
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>

</div>

<footer>
    © <?php echo date("Y"); ?> EduPro Hub | Supervisor Dashboard
</footer>

<script>
function toggleSidebar(){
    document.getElementById("sidebar").classList.toggle("open");
}

function viewDetails(projectTitle){
    alert("Opening details for: " + projectTitle);

    window.location.href =
    "project_details.php?title=" + encodeURIComponent(projectTitle);
}
</script>

</body>
</html>