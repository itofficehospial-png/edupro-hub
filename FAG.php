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
<title>EduPro Hub - Help / FAQ</title>
<script src="https://kit.fontawesome.com/a2e0c6ad5b.js" crossorigin="anonymous"></script>

<style>
body {
  margin: 0;
  font-family: Poppins, sans-serif;
  background: linear-gradient(to right,#eef2f3,#dfe9f3);
}

/* Header */
.header {
  background: linear-gradient(90deg,#00416A,#2c8fa3);
  color: white;
  padding: 15px 30px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.header h2 {
  margin: 0;
}

.nav-links a {
  color: white;
  text-decoration: none;
  margin-left: 20px;
  font-weight: 500;
}

.nav-links a:hover {
  text-decoration: underline;
}

/* Main content */
#content {
  padding: 40px 20px;
}

h2 {
  color: #00416A;
  text-align: center;
}

/* Search bar */
.search-bar {
  display: flex;
  justify-content: center;
  margin: 20px auto;
  max-width: 600px;
}

.search-bar input {
  width: 80%;
  padding: 10px;
  border-radius: 8px 0 0 8px;
  border: 1px solid #ccc;
  font-size: 16px;
}

.search-bar button {
  padding: 10px 16px;
  border: none;
  background: #00416A;
  color: white;
  border-radius: 0 8px 8px 0;
  cursor: pointer;
}

/* FAQ */
.faq-item {
  background: white;
  margin: 10px auto;
  border-radius: 8px;
  max-width: 700px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}

.faq-question {
  background: #00416A;
  color: white;
  padding: 15px 20px;
  cursor: pointer;
  border-radius: 8px 8px 0 0;
  font-weight: bold;
}

.faq-answer {
  display: none;
  padding: 15px 20px;
  color: #333;
  background: #f9f9f9;
  border-radius: 0 0 8px 8px;
}

/* Contact button */
.contact-btn {
  display: block;
  margin: 30px auto;
  background: linear-gradient(45deg,#ff4b2b,#ff416c);
  color: white;
  border: none;
  padding: 12px 25px;
  border-radius: 8px;
  font-size: 16px;
  cursor: pointer;
}
</style>
</head>

<body>

<!-- HEADER -->
<div class="header">
  <h2>EduPro Hub</h2>
  <div class="nav-links">
    <a href="Home.php">Home</a>
    <a href="About.php">About</a>
    <a href="FAG.php">FAQ</a>
    <a href="Login.php">Login</a>
  </div>
</div>

<!-- MAIN CONTENT (UNCHANGED) -->
<div id="content">
  <h2>Help / Frequently Asked Questions (FAQs)</h2>
  <p style="text-align:center; color:#555;">Find quick answers or contact support if you need help.</p>

  <div class="search-bar">
    <input type="text" id="faqSearch" placeholder="Search FAQs...">
    <button onclick="searchFAQ()"><i class="fas fa-search"></i></button>
  </div>

  <div class="faq-item">
    <div class="faq-question" onclick="toggleFAQ(this)">Login Issues</div>
    <div class="faq-answer">If you can’t log in, please check your username and password or contact your system administrator to reset your credentials.</div>
  </div>

  <div class="faq-item">
    <div class="faq-question" onclick="toggleFAQ(this)">Upload Guide</div>
    <div class="faq-answer">To upload a document, go to “Upload Progress Report Page,” click “Choose File,” select your document, and click “Upload.”</div>
  </div>

  <div class="faq-item">
    <div class="faq-question" onclick="toggleFAQ(this)">Supervisor Contact</div>
    <div class="faq-answer">You can reach your supervisor through the “Message/Chat Page” under your dashboard or check their contact details in your profile section.</div>
  </div>
   <div class="faq-item">
    <div class="faq-question" onclick="toggleFAQ(this)">Project Submission</div>
    <div class="faq-answer">You can reach your supervisor through the “Message/Chat Page” under your dashboard or check their contact details in your profile section.</div>
  </div>
   <div class="faq-item">
    <div class="faq-question" onclick="toggleFAQ(this)">Project Monitoring</div>
    <div class="faq-answer">You can reach your supervisor through the “Message/Chat Page” under your dashboard or check their contact details in your profile section.</div>
  </div>
   <div class="faq-item">
    <div class="faq-question" onclick="toggleFAQ(this)">Account & Security</div>
    <div class="faq-answer">You can reach your supervisor through the “Message/Chat Page” under your dashboard or check their contact details in your profile section.</div>
  </div>
   <div class="faq-item">
    <div class="faq-question" onclick="toggleFAQ(this)">Messaging & Discussions</div>
    <div class="faq-answer">You can reach your supervisor through the “Message/Chat Page” under your dashboard or check their contact details in your profile section.</div>
  </div>
   <div class="faq-item">
    <div class="faq-question" onclick="toggleFAQ(this)">Notifications & Alerts</div>
    <div class="faq-answer">You can reach your supervisor through the “Message/Chat Page” under your dashboard or check their contact details in your profile section.</div>
  </div>

  <button class="contact-btn"><i class="fas fa-headset"></i> Contact Support</button>
</div>

<script>
function toggleFAQ(element){
  let answer = element.nextElementSibling;
  answer.style.display = answer.style.display === "block" ? "none" : "block";
}

function searchFAQ(){
  let input = document.getElementById("faqSearch").value.toLowerCase();
  let faqs = document.querySelectorAll(".faq-item");
  faqs.forEach(faq => {
    let text = faq.textContent.toLowerCase();
    faq.style.display = text.includes(input) ? "block" : "none";
  });
}
</script>

</body>
</html>