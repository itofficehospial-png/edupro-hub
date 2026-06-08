<?php
session_start();

$studentName = "Student";

if(!isset($_SESSION['user'])){
  $_SESSION['user'] = "Guest";
}

// Handle upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['reportFile'])) {
    $fileName = $_FILES['reportFile']['name'];
    $description = $_POST['description'];
    $uploadDate = $_POST['date'];

    $targetDir = "uploads/";
    if(!is_dir($targetDir)){
      mkdir($targetDir, 0777, true);
    }

    move_uploaded_file($_FILES['reportFile']['tmp_name'], $targetDir . $fileName);

    $successMessage = "✅ Report <strong>$fileName</strong> uploaded successfully on <strong>$uploadDate</strong>!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student Dashboard</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:"Segoe UI",Tahoma,sans-serif;
}

body{
    background:#f4f6f8;
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

/* INNER CONTENT (YOUR PAGE) */
.container-box {
  width: 90%;
  max-width: 900px;
  background: white;
  margin: auto;
  padding: 25px;
  border-radius: 12px;
  box-shadow: 0 4px 12px rgba(0,0,0,0.08);
}

.section-title {
  font-size: 20px;
  color: #00609b;
  border-left: 4px solid #00609b;
  padding-left: 10px;
  margin-bottom: 15px;
}

form {
  background: #f8f9fa;
  padding: 20px;
  border-radius: 10px;
  border: 1px solid #ddd;
}

form input, form textarea {
  width: 100%;
  padding: 10px;
  margin-bottom: 10px;
  border-radius: 8px;
  border: 1px solid #ccc;
}

form button {
  background: #00609b;
  color: white;
  padding: 10px;
  border: none;
  border-radius: 8px;
}

.success {
  background: #d4edda;
  padding: 15px;
  margin-top: 15px;
  border-radius: 8px;
}

/* Table */
.table {
  width: 100%;
  border-collapse: collapse;
  margin-top: 20px;
}

.table th, .table td {
  padding: 10px;
}

.table th {
  background: #00609b;
  color: white;
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

        <div class="container-box">

            <h3 class="section-title">Upload Your Progress Report</h3>

            <form method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                <input type="file" name="reportFile" id="reportFile" required>
                <textarea name="description" id="description" placeholder="Description..." required></textarea>
                <input type="date" name="date" id="date" required>
                <button type="submit">Upload Report</button>
            </form>

            <?php if(isset($successMessage)): ?>
                <div class="success"><?php echo $successMessage; ?></div>
            <?php endif; ?>

            <h3 class="section-title">Upload History</h3>

            <table class="table">
                <tr>
                    <th>File Name</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>

                <tr>
                    <td>Proposal.pdf</td>
                    <td>Initial proposal</td>
                    <td>10 Oct 2025</td>
                    <td>Approved</td>
                </tr>

                <?php if(isset($fileName)): ?>
                <tr>
                    <td><?php echo $fileName; ?></td>
                    <td><?php echo htmlspecialchars($description); ?></td>
                    <td><?php echo $uploadDate; ?></td>
                    <td>Uploaded</td>
                </tr>
                <?php endif; ?>
            </table>

        </div>

    </div>

</div>

<footer>
    &copy; <?php echo date("Y"); ?> Student PMS
</footer>

<script>
function validateForm() {
  const file = document.getElementById('reportFile').value;
  const desc = document.getElementById('description').value;
  const date = document.getElementById('date').value;

  if(file === "" || desc.trim() === "" || date === ""){
    alert("Please fill all fields");
    return false;
  }
  return true;
}
</script>

</body>
</html>