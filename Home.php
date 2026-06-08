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
<title>EduPro Hub Management System</title>
<script src="https://kit.fontawesome.com/a2e0c6ad5b.js"></script>

<style>
body {
  margin: 0;
  font-family: Poppins, sans-serif;

  background-image: url('5.jpg');
  background-size: cover;        /* makes image fill the whole page */
  background-position: center;   /* centers the image */
  background-repeat: no-repeat;  /* prevents repeating */
  background-attachment: fixed;  /* keeps image fixed when scrolling */
}

/* TOP HEADER */
.top-header{
  position: fixed;
  top:0;
  left:0;
  width:100%;
  height:50px;
  background:#002f4b;
  color:white;
  display:flex;
  justify-content:space-between;
  align-items:center;
  padding:0 50px; /* Moves content inward */
  font-size:14px;
  z-index:1000;
  box-sizing:border-box;
}

.main-header{
  position:fixed;
  top:40px;
  left:0;
  width:100%;
  height:70px;
  background:transparent;
  color:white;
  display:flex;
  justify-content:space-between;
  align-items:center;
  padding:0 50px; /* Moves logo and menu inward */
  z-index:999;
  box-sizing:border-box;
}
/* LOGO */
.logo{
  display:flex;
  align-items:center;
  gap:20px;
}

.logo img{
  width:50px;
  height:50px;
  border-radius:50%;
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

/* CONTENT */
#content{
  background:url('images/bg.jpg') no-repeat center/cover;
  min-height:100vh;
  display:flex;
  flex-direction:column;
  align-items:center;
  padding:40px 20px;
}

/* OVERLAY */
.overlay{
  background:transparent;
  padding:30px;
  border-radius:10px;
  width:90%;
  max-width:1100px;
  text-align:center;
}

/* MARQUEE */
.marquee-box{
  background:white;
  padding:20px;
  border-radius:10px;
  margin-top:20px;
  font-size:18px;
  font-weight:bold;
  color:#00416A;
}

/* VIDEO SECTION */
.video-section{
  display:flex;
  flex-wrap:wrap;
  gap:20px;
  justify-content:center;
  margin-top:30px;
}

.video-box{
  background:transparent;
  padding:15px;
  border-radius:10px;
  width:300px;
  box-shadow:0 4px 10px rgba(0,0,0,0.2);
}

.video-box iframe{
  width:100%;
  height:180px;
  border-radius:10px;
  border:none;
}

/* CONTACT ADMIN */
.contact-admin{
  margin-top:30px;
  margin-left:50px;
  background:#00416A;
  color:white;
  padding:40px;
  border-radius:10px;
}

/* FOOTER */
footer {
  background: transperent;
  color: white;
  text-align: center;
  padding: 10px;
  position: fixed;
  bottom: 0;
  left: 0;
  width: 100%;
}
</style>

<script>
function updateTime(){
  let now = new Date();
  let options = { weekday:'long', year:'numeric', month:'long', day:'numeric' };
  let date = now.toLocaleDateString(undefined, options);
  let time = now.toLocaleTimeString();
  document.getElementById("datetime").innerHTML = date + " | " + time;
}
setInterval(updateTime,1000);
</script>

</head>

<body onload="updateTime()">

<!-- TOP HEADER -->
<div class="top-header">
  <div id="datetime"></div>
  <div>
    <i class="fas fa-phone"></i> Call us now +256772179670
  </div>
</div>

<!-- MAIN HEADER -->
<div class="main-header">

  <div class="logo">
    <img src="muk.jpeg">
    <h3>MAKERERE UNIVERSITY</h3>
  </div>

  <div class="nav-links">
    <a href="Home.php">Home</a>
   <a href="About.php">ABOUT</a>
<a href="FAG.php">FAQ</a>
<a href="Login.php">LOGIN</a>
  </div>

</div><br><br><br>

<!-- CONTENT -->
<div id="content">

  <div class="overlay">
    <h1>Welcome <?php echo $_SESSION['user']; ?> 👋</h1>
    <p><strong>EduPro Hub Project Management System</strong></p>

    <!-- MARQUEE -->
    <div class="marquee-box">
      <marquee behavior="scroll" direction="left">
        📢 Welcome to EduPro Hub — Manage student projects, track progress, collaborate with supervisors, and achieve academic excellence!
      </marquee>
    </div>

    <!-- YOUTUBE VIDEOS -->
    <div class="video-section">
      <div class="video-box">
        <iframe src="https://www.youtube.com/embed/4z8W7CzqgT4"></iframe>
        <h4>Project Tracking</h4>
      </div>

      <div class="video-box">
        <iframe src="https://www.youtube.com/embed/sOa4O1RzZ8g"></iframe>
        <h4>Supervisor Feedback</h4>
      </div>

      <div class="video-box">
        <iframe src="https://www.youtube.com/embed/vJ7cOaW9IhY"></iframe>
        <h4>Analytics & Insights</h4>
      </div>

      <div class="video-box">
        <iframe src="https://www.youtube.com/embed/sOa4O1RzZ8g"></iframe>
        <h4>Centralized Academic Management</h4>
      </div>

      <div class="video-box">
        <iframe src="https://www.youtube.com/embed/sOa4O1RzZ8g"></iframe>
        <h4>Efficient Supervisor Oversight</h4>
      </div>

      <div class="video-box">
        <iframe src="https://www.youtube.com/embed/sOa4O1RzZ8g"></iframe>
        <h4>Secure User Management</h4>
      </div>

      <div class="video-box">
        <iframe src="https://www.youtube.com/embed/sOa4O1RzZ8g"></iframe>
        <h4>Time-Saving Automation</h4>
      </div>
    </div>

    <!-- CONTACT ADMIN -->
    <div class="contact-admin">
      <h3><i class="fas fa-headset"></i> Contact Admin</h3>
      <p>Email: admin@eduprohub.com</p>
      <p>Phone: +256772179670</p>
    </div>

  </div>

</div>

<!-- FOOTER -->
<footer>
  &copy; 2026 EduPro Hub. All Rights Reserved.
</footer>

</body>
</html>