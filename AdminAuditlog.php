<?php

// ===============================
// SAMPLE AUDIT LOGS
// ===============================

$auditLogs = [
    ["user" => "Admin", "action" => "Created new project 'EduTrack'", "timestamp" => "2025-11-04 09:42:00"],
    ["user" => "Supervisor A", "action" => "Approved project 'Data Mining'", "timestamp" => "2025-11-03 17:21:30"],
    ["user" => "User01", "action" => "Updated project description", "timestamp" => "2025-11-03 14:05:20"],
    ["user" => "Admin", "action" => "Deleted user 'John Doe'", "timestamp" => "2025-11-02 16:00:10"],
    ["user" => "Supervisor B", "action" => "Reviewed student report", "timestamp" => "2025-10-31 13:33:45"],
    ["user" => "User02", "action" => "Submitted new report", "timestamp" => "2025-10-30 10:00:00"],
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Administrator Audit Logs</title>

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

/* ==========================
   TOP BAR
========================== */

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
    background:rgba(255,255,255,0.08);
    padding:10px 18px;
    border-radius:12px;
    font-size:14px;
}

/* ==========================
   CONTROL DOCK
========================== */

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
    box-shadow:0 10px 25px rgba(0,0,0,0.4);
    backdrop-filter:blur(10px);
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

/* ==========================
   MAIN CONTAINER
========================== */

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

/* ==========================
   TITLES
========================== */

.panel h2{
    color:#93c5fd;
    margin-bottom:25px;
}

/* ==========================
   FILTERS
========================== */

.filters{
    display:flex;
    flex-wrap:wrap;
    gap:15px;
    margin-bottom:25px;
    align-items:center;
}

.filters label{
    font-size:14px;
    font-weight:600;
}

.filters select,
.filters input{
    padding:10px 12px;
    border:none;
    border-radius:10px;
    background:rgba(255,255,255,0.08);
    color:white;
    outline:none;
}

.filters option{
    color:black;
}

.filters button{
    padding:10px 18px;
    border:none;
    border-radius:10px;
    background:linear-gradient(135deg,#2563eb,#06b6d4);
    color:white;
    cursor:pointer;
    transition:0.3s;
}

.filters button:hover{
    transform:scale(1.05);
}

/* ==========================
   TABLE
========================== */

.table-container{
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

/* ==========================
   FOOTER
========================== */

footer{
    text-align:center;
    padding:25px;
    color:#94a3b8;
}

/* ==========================
   RESPONSIVE
========================== */

@media(max-width:768px){

    .topbar{
        flex-direction:column;
        height:auto;
        padding:18px;
        gap:10px;
        text-align:center;
    }

    .filters{
        flex-direction:column;
        align-items:stretch;
    }

    .dock-btn{
        width:100px;
        height:90px;
    }

}

</style>
</head>

<body>

<!-- ==========================
     TOPBAR
========================== -->

<div class="topbar">

    <h1>ADMINISTRATOR AUDIT LOGS</h1>

    <div class="admin-box">
        System Administrator
    </div>

</div>

<!-- ==========================
     CONTROL DOCK
========================== -->

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

    <a href="AdminBackup.php">
        <div class="dock-btn">
            <span>💾</span>
            <p>Backup</p>
        </div>
    </a>

    <a href="AdminAuditlog.php">
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

<!-- ==========================
     MAIN CONTENT
========================== -->

<div class="container">

    <div class="panel">

        <h2>🧾 System Activity Logs</h2>

        <!-- FILTERS -->

        <div class="filters">

            <label>User:</label>

            <select id="userFilter" onchange="filterLogs()">

                <option value="all">All Users</option>

                <?php
                $uniqueUsers = array_unique(array_column($auditLogs, 'user'));

                foreach($uniqueUsers as $user){
                    echo "<option value='$user'>$user</option>";
                }
                ?>

            </select>

            <label>From:</label>
            <input type="date" id="fromDate" onchange="filterLogs()">

            <label>To:</label>
            <input type="date" id="toDate" onchange="filterLogs()">

            <button onclick="resetFilters()">
                Reset Filters
            </button>

        </div>

        <!-- TABLE -->

        <div class="table-container">

            <table id="logsTable">

                <thead>

                    <tr>
                        <th>User</th>
                        <th>Action</th>
                        <th>Date & Time</th>
                    </tr>

                </thead>

                <tbody>

                    <?php foreach($auditLogs as $log): ?>

                    <tr>

                        <td>
                            <?php echo htmlspecialchars($log['user']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($log['action']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($log['timestamp']); ?>
                        </td>

                    </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- ==========================
     FOOTER
========================== -->

<footer>
    © 2025 EduPro Hub | Audit Management System
</footer>

<!-- ==========================
     JAVASCRIPT
========================== -->

<script>

function filterLogs(){

    const userFilter = document.getElementById("userFilter").value.toLowerCase();

    const fromDate = document.getElementById("fromDate").value;

    const toDate = document.getElementById("toDate").value;

    const rows = document.querySelectorAll("#logsTable tbody tr");

    rows.forEach(row => {

        const user = row.cells[0].textContent.toLowerCase();

        const timestamp = row.cells[2].textContent;

        const date = new Date(timestamp);

        let show = true;

        if(userFilter !== "all" && user !== userFilter){
            show = false;
        }

        if(fromDate && date < new Date(fromDate)){
            show = false;
        }

        if(toDate && date > new Date(toDate + "T23:59:59")){
            show = false;
        }

        row.style.display = show ? "" : "none";

    });

}

function resetFilters(){

    document.getElementById("userFilter").value = "all";

    document.getElementById("fromDate").value = "";

    document.getElementById("toDate").value = "";

    filterLogs();

}

</script>

</body>
</html>