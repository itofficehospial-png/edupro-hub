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
<title>EduPro Hub - Contact Page</title>
<script src="https://kit.fontawesome.com/a2e0c6ad5b.js" crossorigin="anonymous"></script>
</head>
<body style="margin:0; font-family:Poppins, sans-serif; background-color:#f4f7fa; display:flex;">

  <!-- Sidebar -->
  <div id="sidebar" style="width:250px; background:linear-gradient(180deg,#00416A,#E4E5E6); color:white; height:100vh; overflow-y:auto; position:fixed; top:0; left:0; transition:all 0.3s ease;">
    <div style="text-align:center; padding:20px;">
      <img src="C:\Users\MY PC\Desktop\Dashboard\image\Logo.png" alt="School Logo" style="width:70px; height:70px; border-radius:50%;">
      <h2 style="font-size:18px; margin-top:10px;">Uganda Institute of Information and Communication Technology</h2>
    </div>

    <ul style="list-style:none; padding-left:0;">
      <li>
        <a href="javascript:void(0)" onclick="toggleSubMenu('homeSub')" style="display:flex; align-items:center; color:white; text-decoration:none; padding:12px 20px;">
          <i class="fas fa-home" style="margin-right:10px;"></i> HOME PAGE
        </a>
        <ul id="homeSub" style="display:none; list-style:none; padding-left:40px;">
        <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>About</li>
            <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Contact Page</li>
             <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Help/FAG Page</li>
              <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Privacy Policy/Term Page</li>
        </ul>
      </li>

      <li>
        <a href="javascript:void(0)" onclick="toggleSubMenu('studentSub')" style="display:flex; align-items:center; color:white; text-decoration:none; padding:12px 20px;">
          <i class="fas fa-user-graduate" style="margin-right:10px;"></i> STUDENT DASHBOARD
        </a>
        <ul id="studentSub" style="display:none; list-style:none; padding-left:40px;">
          <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Student Dashboard</li>
            <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Submit Proposal</li>
            <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>My Project Page</li>
            <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Project Details Page</li>
            <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Upload Progress Report Page</li>
            <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Message/Chat Page</li>
            <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Notification Page</li>
            <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Profile Page</li>
            <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Help/Tutorial Page</li>
        </ul>
      </li>

      <li>
        <a href="javascript:void(0)" onclick="toggleSubMenu('supervisorSub')" style="display:flex; align-items:center; color:white; text-decoration:none; padding:12px 20px;">
          <i class="fas fa-chalkboard-teacher" style="margin-right:10px;"></i> SUPERVISOR HOME PAGE
        </a>
        <ul id="supervisorSub" style="display:none; list-style:none; padding-left:40px;">
          <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Supervisor Dashboard</li>
            <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Assign Project</li>
            <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Project Review</li>
            <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Feedback Page</li>
            <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Meeting/Discussion Page</li>
            <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Report Page</li>
            <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Notification Page</li>
            <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Profile Page</li>
        </ul>
      </li>

      <li>
        <a href="javascript:void(0)" onclick="toggleSubMenu('adminSub')" style="display:flex; align-items:center; color:white; text-decoration:none; padding:12px 20px;">
          <i class="fas fa-user-shield" style="margin-right:10px;"></i> ADMINISTRATOR PORTAL
        </a>
        <ul id="adminSub" style="display:none; list-style:none; padding-left:40px;">
          <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Manage Users</li>
            <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Project Management</li>
            <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Report Page</li>
            <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>System setting Page</li>
            <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Backup/Data Export Page</li>
            <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Audit Log Page</li>
            <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Profile Page</li>
        </ul>
      </li>
    </ul>

    <!-- Logout Button -->
    <div style="text-align:center; margin:20px 0;">
      <form action="logout.php" method="post">
        <button type="submit" style="background:linear-gradient(45deg,#ff4b2b,#ff416c); color:white; border:none; padding:12px 25px; border-radius:8px; font-size:16px; cursor:pointer; width:80%;">
          <i class="fas fa-sign-out-alt"></i> Logout
        </button>
      </form>
    </div>
  </div>

  <!-- Main Content -->
  <div id="content" style="flex:1; margin-left:250px; padding:40px;">

    <h1 style="color:#00416A; text-align:center;">Contact Us</h1>
    <p style="text-align:center; color:#555;">We’d love to hear from you! Please fill out the form below or reach out directly to our admin office.</p>

    <!-- Contact Form -->
    <div style="max-width:700px; margin:30px auto; background:white; padding:30px; border-radius:12px; box-shadow:0 4px 10px rgba(0,0,0,0.1);">
      <form>
        <label for="name" style="font-weight:bold;">Name</label><br>
        <input type="text" id="name" name="name" placeholder="Enter your name" required style="width:100%; padding:10px; margin:10px 0 20px 0; border:1px solid #ccc; border-radius:6px;">

        <label for="email" style="font-weight:bold;">Email</label><br>
        <input type="email" id="email" name="email" placeholder="Enter your email" required style="width:100%; padding:10px; margin:10px 0 20px 0; border:1px solid #ccc; border-radius:6px;">

        <label for="subject" style="font-weight:bold;">Subject</label><br>
        <input type="text" id="subject" name="subject" placeholder="Subject" required style="width:100%; padding:10px; margin:10px 0 20px 0; border:1px solid #ccc; border-radius:6px;">

        <label for="message" style="font-weight:bold;">Message</label><br>
        <textarea id="message" name="message" rows="5" placeholder="Write your message..." required style="width:100%; padding:10px; margin:10px 0 20px 0; border:1px solid #ccc; border-radius:6px;"></textarea>

        <button type="submit" style="background:#00416A; color:white; border:none; padding:12px 25px; border-radius:8px; cursor:pointer; font-size:16px;">
          <i class="fas fa-paper-plane"></i> Send Message
        </button>
      </form>
    </div>

    <!-- Admin Contact Info -->
    <div style="max-width:700px; margin:20px auto; text-align:center;">
      <h3 style="color:#00416A;">Admin Contact Information</h3>
      <p>Email: <a href="mailto:admin@eduprohub.ac.ug" style="color:#00416A; text-decoration:none;">admin@eduprohub.ac.ug</a></p>
      <p>Phone: +256 700 123 456</p>
      <p>Office Address: Uganda Institute of ICT, Plot 10-12, Jinja Road, Kampala</p>
    </div>

    <!-- Optional Map -->
    <div style="max-width:700px; margin:30px auto;">
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.851841587968!2d32.600877875726376!3d0.3187848640184277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177dbba5058f3c8b%3A0x4f8c532e9b2f2b61!2sUganda%20Institute%20of%20Information%20and%20Communications%20Technology!5e0!3m2!1sen!2sug!4v1714741000000!5m2!1sen!2sug" 
        width="100%" height="300" style="border:0; border-radius:12px;" allowfullscreen="" loading="lazy"></iframe>
    </div>

  </div>

<script>
function toggleSubMenu(id){
  let submenu=document.getElementById(id);
  submenu.style.display=submenu.style.display==="block"?"none":"block";
}
</script>

</body>
</html>
