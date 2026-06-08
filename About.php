<?php
session_start();
if(!isset($_SESSION['user'])){
  $_SESSION['user'] = "Guest";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About | EduPro Hub Management System</title>
<script src="https://kit.fontawesome.com/a2e0c6ad5b.js" crossorigin="anonymous"></script>

<style>
body{
  margin:0;
  font-family:Poppins, sans-serif;
  background:linear-gradient(to right,#eef2f3,#dfe9f3);
}

/* Header */
.header{
  background:linear-gradient(90deg,#00416A,#2c8fa3);
  color:white;
  padding:15px 30px;
  display:flex;
  justify-content:space-between;
  align-items:center;
  box-shadow:0 2px 6px rgba(0,0,0,0.2);
}

.header h2{
  margin:0;
  font-size:20px;
}
/* NAV LINKS */
.nav-links{
  display:flex;
  gap: 5px;
}

.nav-links a{
  color:white;
  text-decoration:underline;
  padding:4px 20px;
}

.nav-links a:focus,
.nav-links a:active{
  background:#00c6ff;
  border-radius:5px;
}


/* Main Content */
.container{
  padding:40px 20px;
}

.title{
  text-align:center;
  color:#00416A;
}

/* Card */
.card{
  max-width:900px;
  margin:40px auto;
  background:white;
  padding:30px;
  border-radius:15px;
  box-shadow:0 4px 12px rgba(0,0,0,0.1);
}

.card h2{
  color:#00416A;
}

.card ul{
  padding-left:20px;
}

.center{
  text-align:center;
}

img{
  max-width:100%;
  border-radius:12px;
}

/* Responsive */
@media(max-width:768px){
  .header{
    flex-direction:column;
    gap:10px;
    text-align:center;
  }
}
</style>
</head>

<body>

<!-- Header -->
<div class="header">
  <h2>EduPro Hub - UICT</h2>
<div class="nav-links">
  <a href="Home.php">Home</a>
   <a href="About.php">ABOUT</a>
<a href="FAG.php">FAQ</a>
<a href="Login.php">LOGIN</a>
  </div>
</div>

<!-- About Content -->
<div class="container">
  <h1 class="title">About EduPro Hub</h1>

  <p style="color:#333; font-size:16px; max-width:800px; margin:auto; text-align:center;">
    <strong>EduPro Hub</strong> is a comprehensive project management system designed to simplify supervision, collaboration, and tracking of student projects at the Uganda Institute of Information and Communication Technology (UICT). 
    The system aims to promote efficiency, transparency, and accountability in academic project handling.
  </p>

  <div class="card">
    <h2>Our Mission</h2>
    <p>To enhance project management and academic collaboration through digital transformation, empowering students and supervisors to work efficiently.</p>

    <h2>Our Goals</h2>
    <ul>
      <li>Provide a centralized platform for project submission and feedback.</li>
      <li>Enable supervisors to easily track student progress and performance.</li>
      <li>Encourage communication and accountability in project workflows.</li>
    </ul>

    <h2>Benefits for UICT</h2>
    <ul>
      <li>Streamlined supervision and evaluation processes.</li>
      <li>Improved student engagement and timely submissions.</li>
      <li>Reduced paperwork and enhanced data accessibility.</li>
    </ul>

    <h2>Why This System?</h2>
    <p>EduPro Hub bridges the gap between students, supervisors, and administrators by providing a real-time project monitoring tool. 
    It ensures structured communication, efficient workflow management, and better academic record-keeping.</p>

    <div class="center" style="margin-top:30px;">
      <img src="EduPro.png" alt="EduPro Logo" style="width:120px;"><br><br>
      <img src="infrogram.png" alt="Workflow Infographic">
    </div>
  </div>
</div>

</body>
</html>