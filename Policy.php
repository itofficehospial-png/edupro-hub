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
<title>Privacy Policy & Terms | EduPro Hub Management System</title>
<script src="https://kit.fontawesome.com/a2e0c6ad5b.js" crossorigin="anonymous"></script>
<style>
  body {
    margin: 0;
    font-family: Poppins, sans-serif;
    background-color: #f4f7fa;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
  }

  /* Policy section styling */
  .policy-section {
    background: white;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    margin-bottom: 20px;
    max-width: 900px;
    width: 90%;
  }

  h1, h2 {
    color: #00416A;
  }
</style>
</head>
<body>

  <!-- Hidden system name -->
  <h1 style="text-align:center;padding-left:210px; color:#00416A; margin-top:70px; font-size:28px;">
    EduPro Hub Project Management System
  </h1>

  <!-- Top Header -->
  <div style="width:100%; background:#00416A; color:white; display:flex; align-items:center; justify-content:space-between; padding:0px 10px; position:fixed; top:0; left:0; z-index:10;">
    <button onclick="toggleSidebar()" id="menuBtn" style="background:none; border:none; color:white; font-size:22px; cursor:pointer; display:none;">
      <i class="fas fa-bars"></i>
    </button>
    <div style="flex:1; text-align:center; visibility:hidden;">EduPro Hub Management System</div>
    <img src="C:\Users\MY PC\Desktop\Dashboard\image\EduPro.png" alt="EduPro Hub Logo" style="height:70px; width:70px; border-radius:100%; object-fit:cover; margin-left:50px; padding-right:30px;">
  </div>

  <div style="display:flex; flex:1; margin-top:60px;">

    <!-- Sidebar -->
    <div id="sidebar" style="width:250px; background:linear-gradient(180deg,#00416A,#E4E5E6); color:white; height:calc(100vh - 60px); overflow-y:auto; position:fixed; top:60px; left:0; transition:all 0.3s ease;">
      <div style="text-align:center; padding:20px;">
        <img src="C:\Users\MY PC\Desktop\Dashboard\image\Logo.png" alt="School Logo" style="width:70px; height:70px; border-radius:50%;"><br>
        <h2 style="font-size:18px; margin-top:10px;">Uganda Institute of Information and Communication Technology</h2>
      </div>

      <!-- Menu Items -->
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
           <li style="padding:8px 0;"><span style='height:8px;width:8px;border:2px solid #00ffb3;border-radius:50%;display:inline-block;margin-right:8px;'></span>Admin Dashboard</li>
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

      <!-- Logout -->
      <div style="text-align:center; margin:20px 0;">
        <form action="logout.php" method="post">
          <button type="submit" style="background:linear-gradient(45deg,#ff4b2b,#ff416c); color:white; border:none; padding:12px 25px; border-radius:8px; font-size:16px; cursor:pointer; width:80%;">
            <i class="fas fa-sign-out-alt"></i> Logout
          </button>
        </form>
      </div>
    </div>

    <!-- Main Content -->
    <div id="content" style="flex:1; margin-left:250px; padding:40px; display:flex; flex-direction:column; align-items:center;">
      <h1>Privacy Policy & Terms of Use</h1>
      <p>Welcome, <strong><?php echo $_SESSION['user']; ?></strong>. Please read our policies carefully to understand how we manage data and ensure compliance.</p>

      <div class="policy-section">
        <h2>1. Legal Statements About User Data</h2>
        <p>EduPro Hub Management System values your privacy. We collect only necessary user information such as names, email addresses, and project details strictly for academic and administrative purposes. All stored data is protected and will not be shared with third parties without user consent.</p>
      </div>

      <div class="policy-section">
        <h2>2. System Usage Guidelines</h2>
        <p>Users are expected to use this platform for educational and project management purposes only. Unauthorized access, data tampering, or misuse of the system may result in disciplinary or legal actions as per institutional regulations.</p>
      </div>

      <div class="policy-section">
        <h2>3. Compliance and Security</h2>
        <p>The system adheres to data protection standards under Uganda’s Data Protection and Privacy Act (2019). All user interactions are encrypted to ensure confidentiality and integrity of stored data.</p>
      </div>

      <div class="policy-section">
        <h2>4. Acceptance and Acknowledgment</h2>
        <p>By using this system, you acknowledge and accept our Privacy Policy and Terms of Use. Continued usage indicates your agreement to comply with institutional policies governing digital systems.</p>
      </div>

      <div class="policy-section" style="text-align:center;">
        <form>
          <label><input type="checkbox" required> I have read and agree to the Privacy Policy & Terms.</label><br><br>
          <button type="submit" style="background:#00416A; color:white; border:none; padding:10px 20px; border-radius:5px; cursor:pointer;">
            Accept & Continue
          </button>
        </form>
      </div>
    </div>
  </div>

<script>
function toggleSubMenu(id){
  let submenu = document.getElementById(id);
  submenu.style.display = submenu.style.display === "block" ? "none" : "block";
}

function toggleSidebar(){
  let sidebar = document.getElementById("sidebar");
  if(sidebar.style.left === "0px"){
    sidebar.style.left = "-260px";
  }else{
    sidebar.style.left = "0px";
  }
}

window.addEventListener("resize", function(){
  let width = window.innerWidth;
  let sidebar = document.getElementById("sidebar");
  let menuBtn = document.getElementById("menuBtn");
  let content = document.getElementById("content");
  if(width <= 768){
    sidebar.style.position = "fixed";
    sidebar.style.left = "-260px";
    menuBtn.style.display = "inline-block";
    content.style.marginLeft = "0";
  }else{
    sidebar.style.left = "0";
    menuBtn.style.display = "none";
    content.style.marginLeft = "250px";
  }
});
window.dispatchEvent(new Event('resize'));
</script>

</body>
</html>
