<?php
session_start();

if(!isset($_SESSION['user'])){
    $_SESSION['user'] = "Supervisor";
}

// === Simulate Notifications from Database ===
$notifications = [

    [
        "type" => "submission",
        "message" =>
        "New project submitted by John Doe."
    ],

    [
        "type" => "feedback",
        "message" =>
        "Supervisor replied to your feedback on Project Alpha."
    ],

    [
        "type" => "announcement",
        "message" =>
        "Admin: Meeting scheduled for tomorrow at 10 AM."
    ]

];
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>
EduPro Hub Notifications
</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Segoe UI',Tahoma,sans-serif;
    background:#f4f7fc;
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

/* Main content */
.main-content{
    flex:1;
    padding:25px;
    overflow-y:auto;
}

/* Card */
.card{
    background:#fff;
    border-radius:10px;
    box-shadow:0 4px 15px rgba(0,0,0,0.1);
    padding:25px;
}

/* Title */
.section-title{
    color:#2d3e50;
    margin-bottom:25px;
}

/* Notification */
.notification{
    background:#f9fbff;
    border-left:5px solid #0078d7;
    padding:15px 20px;
    margin:12px 0;
    border-radius:6px;
    transition:0.3s;
}

.notification:hover{
    background:#eef5ff;
    transform:translateX(4px);
}

/* Types */
.notification.submission{
    border-left-color:#28a745;
}

.notification.feedback{
    border-left-color:#ff9800;
}

.notification.announcement{
    border-left-color:#0078d7;
}

/* Buttons */
.buttons{
    display:flex;
    gap:15px;
    flex-wrap:wrap;
    margin-top:25px;
}

.btn{
    background:#0078d7;
    color:white;
    border:none;
    border-radius:6px;
    padding:10px 18px;
    font-size:15px;
    cursor:pointer;
    transition:0.3s;
}

.btn:hover{
    background:#005ea6;
}

.clear-btn{
    background:#dc3545;
}

.clear-btn:hover{
    background:#b52a36;
}

/* Empty message */
.empty{
    text-align:center;
    color:#888;
    margin:30px 0;
    font-style:italic;
}

/* Footer */
footer{
    text-align:center;
    padding:15px;
    background:#fff;
    border-top:1px solid #ddd;
    color:#777;
}

/* Mobile */
@media(max-width:768px){

    .buttons{
        flex-direction:column;
    }

    .btn{
        width:100%;
    }
}
</style>

</head>

<body>

<!-- Topbar -->
<div class="topbar">

    <div class="menu-btn"
    onclick="toggleSidebar()">☰</div>

    <h2>
        Notifications
    </h2>

    <div style="margin-left:auto;">

        Welcome,
        <?php echo $_SESSION['user']; ?> 👋

    </div>

</div>

<div class="wrapper">

    <!-- Sidebar -->
    <div class="sidebar"
    id="sidebar">

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

    <!-- Main content -->
    <div class="main-content">

        <div class="card">

            <h2 class="section-title">
                🔔 EduPro Hub Notifications
            </h2>

            <div id="notificationsList">

<?php if(!empty($notifications)): ?>

<?php foreach($notifications as $note): ?>

<div class="notification
<?php echo $note['type']; ?>">

<?php
echo htmlspecialchars(
$note['message']
);
?>

</div>

<?php endforeach; ?>

<?php else: ?>

<div class="empty">

    No new notifications.

</div>

<?php endif; ?>

            </div>

            <!-- Buttons -->
            <div class="buttons">

                <button
                class="btn"
                onclick="viewAll()">

                    View All

                </button>

                <button
                class="btn clear-btn"
                onclick="clearAll()">

                    Clear All

                </button>

            </div>

        </div>

    </div>

</div>

<footer>

© <?php echo date("Y"); ?>
EduPro Hub | Notifications

</footer>

<script>

// Toggle sidebar
function toggleSidebar(){

    document
    .getElementById("sidebar")
    .classList
    .toggle("open");
}

// View all notifications
function viewAll(){

    alert(
    "Showing all notifications..."
    );
}

// Clear notifications
function clearAll(){

    const list =
    document.getElementById(
    "notificationsList"
    );

    list.innerHTML =
    '<div class="empty">No new notifications.</div>';

    alert(
    "All notifications cleared!"
    );
}

</script>

</body>
</html>