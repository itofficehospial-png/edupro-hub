<?php
session_start();

$studentName = "Student";

// Example proposal status
$status = "Pending";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $abstract = $_POST['abstract'];
    $objectives = $_POST['objectives'];
    $file = $_FILES['proposalFile']['name'];

    $status = "Pending";
    $message = "Proposal '$title' submitted successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>SubmitP page</title>

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
    object-fit:cover;
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

/* FORM STYLES (FROM YOUR PAGE) */
.container-box {
    max-width: 900px;
    margin: auto;
    background: white;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.05);
}

h2 {
    color: #00609b;
    margin-bottom: 20px;
    text-align: center;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 5px;
    font-weight: bold;
}

input, textarea {
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 8px;
    border: 1px solid #ccc;
}

button {
    background-color: #00609b;
    color: white;
    border: none;
    padding: 12px;
    border-radius: 8px;
    cursor: pointer;
}

button:hover {
    background-color: #004a7c;
}

/* Status Tracker */
.status-tracker {
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
    position: relative;
}

.status-tracker::before {
    content: '';
    position: absolute;
    top: 15px;
    left: 0;
    right: 0;
    height: 4px;
    background-color: #ccc;
}

.status-step {
    text-align: center;
    flex: 1;
}

.circle {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: #ccc;
    margin: auto;
    line-height: 30px;
    color: white;
}

.active .circle {
    background-color: #00609b;
}

.message {
    background-color: #e0f7e9;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
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
    <h1>SUBMIT YOUR PROJECT PROPOSAL HERE</h1>
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

    <!-- MAIN CONTENT (YOUR PROPOSAL PAGE INSERTED HERE) -->
    <div class="main-content">

        <div class="container-box">
            <h2>Submit Your Project Proposal</h2>

            <?php if(isset($message)) echo "<div class='message'>$message</div>"; ?>

            <form method="POST" enctype="multipart/form-data">
                <label>Project Title</label>
                <input type="text" name="title" required>

                <label>Abstract</label>
                <textarea name="abstract" rows="5" required></textarea>

                <label>Objectives</label>
                <textarea name="objectives" rows="5" required></textarea>

                <label>Upload Proposal File</label>
                <input type="file" name="proposalFile" required>

                <button type="submit">Submit for Review</button>
            </form>

            <div class="status-tracker">
                <div class="status-step <?php if($status!='') echo 'active'; ?>">
                    <div class="circle">1</div>
                    <p>Pending</p>
                </div>
                <div class="status-step <?php if($status=='Reviewed' || $status=='Approved') echo 'active'; ?>">
                    <div class="circle">2</div>
                    <p>Reviewed</p>
                </div>
                <div class="status-step <?php if($status=='Approved') echo 'active'; ?>">
                    <div class="circle">3</div>
                    <p>Approved</p>
                </div>
            </div>

        </div>

    </div>

</div>

<footer>
    &copy; <?php echo date("Y"); ?> Student PMS
</footer>

</body>
</html>