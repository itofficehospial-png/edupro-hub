<?php
session_start();

$studentName = "Student";

if(!isset($_SESSION['user'])){
  $_SESSION['user'] = "Guest";
}

// Profile data
$user = [
  "name" => "Simon Peter Opiyo",
  "student_id" => "EDU2025-041",
  "department" => "Computer Science",
  "email" => "simon.opiyo@example.com",
  "photo" => isset($_SESSION['photo']) ? $_SESSION['photo'] : "https://via.placeholder.com/120"
];

// Handle photo upload
if(isset($_FILES['profile_photo'])){
  $uploadDir = "uploads/";
  if(!is_dir($uploadDir)) mkdir($uploadDir);

  $fileName = basename($_FILES["profile_photo"]["name"]);
  $targetFile = $uploadDir . time() . "_" . $fileName;

  if(move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $targetFile)){
    $_SESSION['photo'] = $targetFile;
    header("Location: profile.php");
    exit;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Upload Student</title>

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

/* INNER PROFILE */
.container-box{
  width:90%;
  max-width:900px;
  margin:auto;
  background:white;
  padding:30px;
  border-radius:12px;
  box-shadow:0 4px 10px rgba(0,0,0,0.1);
}

.profile-header{
  display:flex;
  flex-direction:column;
  align-items:center;
  text-align:center;
}

.profile-photo{
  width:120px;
  height:120px;
  border-radius:50%;
  border:4px solid #00609b;
}

.section-title{
  margin-top:20px;
  color:#00609b;
  border-left:4px solid #00609b;
  padding-left:8px;
}

input, select{
  width:100%;
  padding:10px;
  margin-bottom:10px;
  border-radius:8px;
  border:1px solid #ccc;
}

button{
  background:#00609b;
  color:white;
  padding:10px;
  border:none;
  border-radius:8px;
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
            <img src="<?php echo $user['photo']; ?>" class="student-photo">
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

            <!-- Profile Header -->
            <div class="profile-header">
                <img src="<?php echo $user['photo']; ?>" class="profile-photo">
                <h3><?php echo $user['name']; ?></h3>
                <p><?php echo $user['email']; ?></p>
            </div>

            <!-- Upload Photo -->
            <div class="section-title">Upload Photo</div>
            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="profile_photo">
                <button type="submit">Save Photo</button>
            </form>

            <!-- Edit Info -->
            <div class="section-title">Edit Profile</div>
            <form>
                <input type="text" value="<?php echo $user['name']; ?>">
                <input type="text" value="<?php echo $user['student_id']; ?>">
                <input type="email" value="<?php echo $user['email']; ?>">
                <button type="button">Save Changes</button>
            </form>

            <!-- Change Password -->
            <div class="section-title">Change Password</div>
            <form>
                <input type="password" placeholder="Current Password">
                <input type="password" placeholder="New Password">
                <button type="button">Update Password</button>
            </form>

        </div>

    </div>

</div>

<footer>
    &copy; <?php echo date("Y"); ?> Student PMS
</footer>

</body>
</html>