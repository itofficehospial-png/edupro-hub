<?php
session_start();

$studentName = "Student";

if(!isset($_SESSION['user'])){
  $_SESSION['user'] = "Guest";
}

// Messages storage
if(!isset($_SESSION['messages'])){
  $_SESSION['messages'] = [
    ["sender" => "Dr. Sarah Lutaaya", "text" => "Hello! Have you uploaded your latest progress report?", "time" => "09:30 AM", "type" => "received"],
    ["sender" => $_SESSION['user'], "text" => "Yes, I just uploaded it yesterday.", "time" => "09:35 AM", "type" => "sent"],
    ["sender" => "Dr. Sarah Lutaaya", "text" => "Perfect. I'll review and share my comments soon.", "time" => "09:40 AM", "type" => "received"]
  ];
}

// Handle new message
if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['message'])){
  $_SESSION['messages'][] = [
    "sender" => $_SESSION['user'],
    "text" => htmlspecialchars($_POST['message']),
    "time" => date("h:i A"),
    "type" => "sent"
  ];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>MessageChat</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:"Segoe UI",Tahoma,sans-serif;}
body{background:#f4f6f8;}

/* Header */
header{
    background:#1e3a8a;
    color:#fff;
    padding:18px;
    text-align:center;
}

/* Layout */
.container{display:flex;min-height:calc(100vh - 110px);}

/* Sidebar */
.sidebar{
    width:260px;
    background:linear-gradient(180deg,#1e3a8a,#1e40af);
    padding:25px 0;
}
.profile-section{text-align:center;margin-bottom:20px;}
.student-photo{width:70px;height:70px;border-radius:100%;border:3px solid #38bdf8;}
.student-name{color:#e0e7ff;}
.sidebar h3{text-align:center;color:#e0e7ff;margin-bottom:20px;}
.sidebar a{display:flex;padding:14px 28px;color:#c7d2fe;text-decoration:none;}
.sidebar a:hover{background:rgba(255,255,255,0.08);color:#fff;}

/* Main content */
.main-content{
    flex:1;
    padding:40px;
    background:#f8fafc;
}

/* CHAT */
.chat-container{
  display:flex;
  flex-direction:column;
  height:600px;
  max-width:900px;
  margin:auto;
  background:white;
  border-radius:12px;
  box-shadow:0 4px 12px rgba(0,0,0,0.08);
}

.chat-header{
  background:#00609b;
  color:white;
  padding:15px;
}

.chat-body{
  flex:1;
  padding:15px;
  overflow-y:auto;
  background:#f8f9fa;
}

.message{
  max-width:70%;
  padding:10px;
  margin-bottom:10px;
  border-radius:10px;
}

.sent{
  background:#00609b;
  color:white;
  margin-left:auto;
}

.received{
  background:#e9ecef;
}

.chat-footer{
  display:flex;
  padding:10px;
  gap:10px;
}

.chat-footer input{
  flex:1;
  padding:10px;
}

.chat-footer button{
  background:#28a745;
  color:white;
  border:none;
  padding:10px;
  border-radius:6px;
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

    <!-- MAIN CONTENT -->
    <div class="main-content">

        <div class="chat-container">

            <div class="chat-header">
                Chat with Supervisor
            </div>

            <div class="chat-body" id="chatBody">
                <?php foreach($_SESSION['messages'] as $msg): ?>
                    <div class="message <?php echo $msg['type']; ?>">
                        <strong><?php echo $msg['sender']; ?>:</strong><br>
                        <?php echo $msg['text']; ?>
                        <small><?php echo $msg['time']; ?></small>
                    </div>
                <?php endforeach; ?>
            </div>

            <form method="POST" class="chat-footer">
                <input type="text" name="message" placeholder="Type message..." required>
                <button type="submit">Send</button>
            </form>

        </div>

    </div>

</div>

<footer>
    &copy; <?php echo date("Y"); ?> Student PMS
</footer>

<script>
window.onload = function(){
  const chat = document.getElementById('chatBody');
  chat.scrollTop = chat.scrollHeight;
};
</script>

</body>
</html>