<?php

// =====================================
// SAMPLE NOTIFICATION HISTORY
// =====================================

$notifications = [

    [
        "title" => "System Maintenance",
        "message" => "EduPro Hub will be under maintenance on Nov 10.",
        "role" => "All Users",
        "date" => "2025-11-01"
    ],

    [
        "title" => "Project Submission",
        "message" => "Final project submissions due by Dec 15.",
        "role" => "Students",
        "date" => "2025-10-25"
    ],

    [
        "title" => "Supervisor Meeting",
        "message" => "All supervisors meeting scheduled on Nov 12.",
        "role" => "Supervisors",
        "date" => "2025-10-22"
    ]

];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Administrator Notifications Center</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Segoe UI, sans-serif;
}

body{
    min-height:100vh;
    color:white;
    background:
    linear-gradient(135deg,#020617,#0f172a,#111827);
}

/* =========================
   TOPBAR
========================= */

.topbar{
    width:100%;
    height:75px;
    background:rgba(255,255,255,0.06);
    backdrop-filter:blur(12px);
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:0 30px;
    border-bottom:1px solid rgba(255,255,255,0.08);
}

.topbar h1{
    font-size:22px;
    color:#67e8f9;
}

.admin-box{
    background:hsla(184, 90%, 47%, 0.08);
    padding:10px 18px;
    border-radius:12px;
    font-size:14px;
}

/* =========================
   CONTROL DOCK
========================= */

.dock{
    width:95%;
    max-width:1200px;
    margin:25px auto;
    display:flex;
    flex-wrap:wrap;
    justify-content:center;
    gap:18px;
}

.dock a{
    text-decoration:none;
}

.dock-btn{
    width:115px;
    height:100px;
    background:rgba(255,255,255,0.08);
    border-radius:18px;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    color:white;
    transition:0.3s;
    backdrop-filter:blur(10px);
    box-shadow:0 10px 25px rgba(0,0,0,0.5);
}

.dock-btn:hover{
    transform:translateY(-6px);
    background:linear-gradient(135deg,#2563eb,#06b6d4);
}

.dock-btn span{
    font-size:30px;
    margin-bottom:8px;
}

.dock-btn p{
    font-size:13px;
}

/* =========================
   MAIN CONTAINER
========================= */

.container{
    width:95%;
    max-width:1200px;
    margin:auto;
    padding-bottom:40px;
}

.panel{
    background:rgba(255,255,255,0.06);
    border-radius:22px;
    padding:35px;
    backdrop-filter:blur(12px);
    box-shadow:0 20px 40px rgba(0,0,0,0.5);
}

/* =========================
   HEADINGS
========================= */

.panel h2{
    color:#93c5fd;
    margin-bottom:20px;
}

/* =========================
   FORM
========================= */

form{
    margin-top:20px;
}

label{
    display:block;
    margin-bottom:8px;
    font-weight:600;
    color:#e2e8f0;
}

input[type="text"],
textarea,
select{
    width:100%;
    padding:12px;
    border:none;
    border-radius:12px;
    margin-bottom:18px;
    background:rgba(255,255,255,0.08);
    color:white;
    outline:none;
    font-size:14px;
}

textarea{
    height:120px;
    resize:none;
}

select option{
    color:black;
}

/* =========================
   BUTTONS
========================= */

button{
    border:none;
    padding:12px 20px;
    border-radius:12px;
    cursor:pointer;
    background:linear-gradient(135deg,#2563eb,#06b6d4);
    color:white;
    font-size:15px;
    transition:0.3s;
}

button:hover{
    transform:scale(1.05);
}

/* =========================
   SUCCESS MESSAGE
========================= */

.success-msg{
    display:none;
    background:rgba(34,197,94,0.2);
    border:1px solid #22c55e;
    color:#dcfce7;
    padding:14px;
    border-radius:12px;
    margin-bottom:20px;
}

/* =========================
   TABLE
========================= */

.table-container{
    margin-top:35px;
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
}

table th{
    background:rgba(255,255,255,0.08);
    color:#67e8f9;
    padding:15px;
    text-align:left;
}

table td{
    padding:15px;
    border-bottom:1px solid rgba(255,255,255,0.08);
}

table tr:hover{
    background:rgba(255,255,255,0.05);
}

/* =========================
   FOOTER
========================= */

footer{
    text-align:center;
    padding:25px;
    color:#94a3b8;
}

/* =========================
   RESPONSIVE
========================= */

@media(max-width:768px){

    .topbar{
        flex-direction:column;
        height:auto;
        gap:10px;
        padding:18px;
        text-align:center;
    }

    .dock-btn{
        width:100px;
        height:90px;
    }

}

</style>
</head>

<body>

<!-- =========================
     TOPBAR
========================= -->

<div class="topbar">

    <h1>ADMINISTRATOR NOTIFICATIONS CENTER</h1>

    <div class="admin-box">
        System Administrator
    </div>

</div>

<!-- =========================
     CONTROL DOCK
========================= -->

<div class="dock">

    <a href="AdminD.php">
        <div class="dock-btn">
            <span>🏠</span>
            <p>Dashboard</p>
        </div>
    </a>

    <a href="UserManage.php">
        <div class="dock-btn">
            <span>👥</span>
            <p>Users</p>
        </div>
    </a>

    <a href="ProjectManage.php">
        <div class="dock-btn">
            <span>📁</span>
            <p>Projects</p>
        </div>
    </a>

    <a href="AdminNotification.php">
        <div class="dock-btn">
            <span>🔔</span>
            <p>Notifications</p>
        </div>
    </a>

    <a href="AdminReport.php">
        <div class="dock-btn">
            <span>📊</span>
            <p>Reports</p>
        </div>
    </a>

    <a href="Systemsetting.php">
        <div class="dock-btn">
            <span>⚙️</span>
            <p>Settings</p>
        </div>
    </a>

    <a href="AdminProfile.php">
        <div class="dock-btn">
            <span>🛡️</span>
            <p>Profile</p>
        </div>
    </a>

    <a href="AdminBackup.html">
        <div class="dock-btn">
            <span>💾</span>
            <p>Backup</p>
        </div>
    </a>

    <a href="AdminAuditlog.html">
        <div class="dock-btn">
            <span>📜</span>
            <p>Audit Logs</p>
        </div>
    </a>

     <!-- Logout -->
    <a href="Logout.php">
        <div class="dock-btn">
            <span>🔴</span>
            <p>Logout</p>
        </div>
    </a>

</div>

<!-- =========================
     MAIN CONTENT
========================= -->

<div class="container">

    <div class="panel">

        <h2>📢 Create New Announcement</h2>

        <!-- SUCCESS MESSAGE -->

        <div id="successBox" class="success-msg">
            Announcement sent successfully!
        </div>

        <!-- FORM -->

        <form id="notifyForm">

            <label>Announcement Title</label>

            <input
            type="text"
            id="title"
            placeholder="Enter title..."
            required>

            <label>Message</label>

            <textarea
            id="message"
            placeholder="Write message..."></textarea>

            <label>Target Role</label>

            <select id="targetRole">

                <option value="">
                    -- Select Role --
                </option>

                <option>
                    All Users
                </option>

                <option>
                    Students
                </option>

                <option>
                    Supervisors
                </option>

                <option>
                    Administrators
                </option>

            </select>

            <button
            type="button"
            onclick="sendAnnouncement()">

                Send Announcement

            </button>

        </form>

        <!-- NOTIFICATION HISTORY -->

        <div class="table-container">

            <h2>🕓 Notification History</h2>

            <table id="notifyTable">

                <thead>

                    <tr>

                        <th>Title</th>
                        <th>Message</th>
                        <th>Target Role</th>
                        <th>Date Sent</th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach($notifications as $n): ?>

                    <tr>

                        <td>
                            <?php echo htmlspecialchars($n['title']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($n['message']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($n['role']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($n['date']); ?>
                        </td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- =========================
     FOOTER
========================= -->

<footer>
    © 2025 EduPro Hub | Notifications Center
</footer>

<!-- =========================
     JAVASCRIPT
========================= -->

<script>

// ====================================
// SEND ANNOUNCEMENT FUNCTION
// ====================================

function sendAnnouncement(){

    const title =
    document.getElementById("title").value.trim();

    const msg =
    document.getElementById("message").value.trim();

    const role =
    document.getElementById("targetRole").value;

    const successBox =
    document.getElementById("successBox");

    if(!title || !msg || !role){

        alert(
        "Please fill in all fields before sending."
        );

        return;

    }

    // SHOW SUCCESS MESSAGE

    successBox.style.display = "block";

    setTimeout(() => {

        successBox.style.display = "none";

    },3000);

    // ADD TO TABLE

    const table =
    document.getElementById("notifyTable")
    .querySelector("tbody");

    const date =
    new Date().toISOString().split('T')[0];

    const newRow = `

    <tr>

        <td>${title}</td>

        <td>${msg}</td>

        <td>${role}</td>

        <td>${date}</td>

    </tr>

    `;

    table.innerHTML = newRow + table.innerHTML;

    // RESET FORM

    document.getElementById("notifyForm").reset();

}

</script>

</body>
</html>