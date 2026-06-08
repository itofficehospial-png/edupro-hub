<?php
session_start();

$studentName = "Student";

if(!isset($_SESSION['user'])){
  $_SESSION['user'] = "Guest";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Help Page</title>

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

/* HELP PAGE STYLES */
.page-title {
  text-align: center;
  color: #00609b;
  font-size: 22px;
  margin-bottom: 20px;
}

.tutorials {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 20px;
}

.tutorial-card {
  background: #f8f9fa;
  border-radius: 10px;
  box-shadow: 0 3px 6px rgba(0,0,0,0.05);
  padding: 15px;
}

.tutorial-card video,
.tutorial-card embed {
  width: 100%;
  border-radius: 8px;
}

.tutorial-card h4 {
  color: #00609b;
  margin: 10px 0 5px;
  font-size: 16px;
}

.faq {
  text-align: center;
  margin-top: 35px;
}

.faq a {
  color: #00609b;
  font-weight: 600;
  text-decoration: none;
}

.contact {
  text-align: center;
  margin-top: 40px;
}

.contact button {
  background: #28a745;
  color: white;
  padding: 12px 22px;
  border: none;
  border-radius: 8px;
  cursor: pointer;
}

.modal {
  display: none;
  position: fixed;
  z-index: 999;
  left: 0; top: 0;
  width: 100%; height: 100%;
  background: rgba(0,0,0,0.5);
  justify-content: center;
  align-items: center;
}

.modal-content {
  background: white;
  padding: 25px;
  border-radius: 10px;
  width: 90%;
  max-width: 400px;
  text-align: center;
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
    </div>

    <!-- Main Content -->
    <div class="main-content">

        <h2>Welcome, <?php echo $studentName; ?> 👨‍🎓</h2>
        <!-- HELP PAGE ADDED BELOW -->
        <div class="section">

            <div class="page-title">How Can We Help You?</div>

            <div class="tutorials">
                <div class="tutorial-card">
                    <video controls>
                        <source src="tutorial1.mp4" type="video/mp4">
                    </video>
                    <h4>Getting Started with EduPro Hub</h4>
                    <p>A short introduction video explaining how to use the system.</p>
                </div>

                <div class="tutorial-card">
                    <embed src="user_manual.pdf" type="application/pdf" height="200px">
                    <h4>User Manual (PDF)</h4>
                    <p>Step-by-step guide for managing your projects.</p>
                </div>
                <div class="tutorial-card">
                    <embed src="user_manual.pdf" type="application/pdf" height="200px">
                    <h4>User Manual (PDF)</h4>
                    <p>Step-by-step guide for managing your projects.</p>
                </div>
                <div class="tutorial-card">
                    <embed src="user_manual.pdf" type="application/pdf" height="200px">
                    <h4>User Manual (PDF)</h4>
                    <p>Step-by-step guide for managing your projects.</p>
                </div>
                <div class="tutorial-card">
                    <embed src="user_manual.pdf" type="application/pdf" height="200px">
                    <h4>User Manual (PDF)</h4>
                    <p>Step-by-step guide for managing your projects.</p>
                </div>

                <div class="tutorial-card">
                    <video controls>
                        <source src="upload_guide.mp4" type="video/mp4">
                    </video>
                    <h4>Uploading Reports</h4>
                    <p>Learn how to upload and manage your reports.</p>
                </div>
                <div class="tutorial-card">
                    <video controls>
                        <source src="tutorial1.mp4" type="video/mp4">
                    </video>
                    <h4>Getting Started with EduPro Hub</h4>
                    <p>A short introduction video explaining how to use the system.</p>
                </div>
                <div class="tutorial-card">
                    <video controls>
                        <source src="tutorial1.mp4" type="video/mp4">
                    </video>
                    <h4>Getting Started with EduPro Hub</h4>
                    <p>A short introduction video explaining how to use the system.</p>
                </div>
                <div class="tutorial-card">
                    <video controls>
                        <source src="tutorial1.mp4" type="video/mp4">
                    </video>
                    <h4>Getting Started with EduPro Hub</h4>
                    <p>A short introduction video explaining how to use the system.</p>
                </div>
            </div>

            <div class="faq">
                <p>Visit our <a href="#"><i class="fa-solid fa-circle-question"></i> FAQ Page</a></p>
            </div>

            <div class="contact">
                <button onclick="openModal()">
                    <i class="fa-solid fa-envelope"></i> Contact Admin
                </button>
            </div>

        </div>

    </div>

</div>

<!-- MODAL -->
<div class="modal" id="contactModal">
  <div class="modal-content">
    <h3>Contact Admin</h3>
    <form onsubmit="return sendMessage(event)">
      <input type="text" placeholder="Your Name" required><br><br>
      <input type="email" placeholder="Your Email" required><br><br>
      <textarea placeholder="Message..." required></textarea><br><br>
      <button type="submit">Send</button>
      <button type="button" onclick="closeModal()">Cancel</button>
    </form>
  </div>
</div>

<footer>
    &copy; <?php echo date("Y"); ?> Student PMS
</footer>

<script>
function openModal(){
  document.getElementById("contactModal").style.display="flex";
}
function closeModal(){
  document.getElementById("contactModal").style.display="none";
}
function sendMessage(e){
  e.preventDefault();
  alert("Message sent!");
  closeModal();
}
</script>

</body>
</html>