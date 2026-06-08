<?php
session_start();

$studentName = "Student";

if(!isset($_SESSION['user'])){
  $_SESSION['user'] = "Guest";
}

// Notifications data
if(!isset($_SESSION['notifications'])){
  $_SESSION['notifications'] = [
    ["title" => "New Supervisor Feedback", "message" => "Dr. Sarah commented on your Project Report.", "time" => "10 mins ago", "read" => false],
    ["title" => "Upcoming Deadline", "message" => "Final project submission due next Monday.", "time" => "1 hour ago", "read" => false],
    ["title" => "Approval Notice", "message" => "Your project proposal has been approved.", "time" => "Yesterday", "read" => true],
    ["title" => "New Message", "message" => "You received a message from your group leader.", "time" => "2 days ago", "read" => true]
  ];
}

// Mark as read
if(isset($_POST['mark_read'])){
  $index = $_POST['mark_read'];
  if(isset($_SESSION['notifications'][$index])){
    $_SESSION['notifications'][$index]['read'] = true;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Notification Page</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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

/* Profile section */
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

/* Section box */
.section{
    background:#ffffff;
    padding:25px;
    border-radius:14px;
    margin-bottom:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
}

/* Notifications */
.notifications-list {
    margin-top: 15px;
}

.notification {
    background: #fff;
    padding: 15px;
    margin-bottom: 12px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.notification.unread {
    border-left: 5px solid #1e3a8a;
    background: #e9f3ff;
}

.notification.read {
    opacity: 0.7;
}

.notification-content h4 {
    margin: 0 0 6px;
    font-size: 15px;
    color: #1e3a8a;
}

.notification-content p {
    margin: 0;
    font-size: 14px;
}

.notification-time {
    font-size: 12px;
    color: #777;
}

.notification button {
    background: #28a745;
    color: #fff;
    border: none;
    padding: 6px 10px;
    border-radius: 6px;
    cursor: pointer;
}

.notification button:hover {
    background: #1e7b36;
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

        <div class="profile-section">
            <img src="OP.png" alt="Student Photo" class="student-photo">
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

    <!-- Main Content -->
    <div class="main-content">

        <h2>Welcome, <?php echo $studentName; ?> 👨‍🎓</h2>

        <div class="section">
            <h3>Main Page</h3>
            <p>Select an option from the sidebar to get started.</p>
        </div>

        <!-- Notifications Section -->
        <div class="section">
            <h3><i class="fa-solid fa-bell"></i> Notifications Center</h3>

            <div class="notifications-list">
                <?php foreach($_SESSION['notifications'] as $index => $notif): ?>
                    <div class="notification <?php echo $notif['read'] ? 'read' : 'unread'; ?>">

                        <div class="notification-content">
                            <h4><?php echo htmlspecialchars($notif['title']); ?></h4>
                            <p><?php echo htmlspecialchars($notif['message']); ?></p>
                            <div class="notification-time">
                                <i class="fa-regular fa-clock"></i> <?php echo $notif['time']; ?>
                            </div>
                        </div>

                        <?php if(!$notif['read']): ?>
                            <form method="POST">
                                <input type="hidden" name="mark_read" value="<?php echo $index; ?>">
                                <button type="submit">
                                    <i class="fa-solid fa-check"></i> Mark as Read
                                </button>
                            </form>
                        <?php endif; ?>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

</div>

<footer>
    &copy; <?php echo date("Y"); ?> Student PMS | All Rights Reserved | PRIVACY ABOUT HELPS
</footer>

</body>
</html>