<?php

// ==================================
// BACKUP INFORMATION
// ==================================

$lastBackup = "2025-11-03 10:15 AM";

$backupFiles = [

    [
        "file" => "backup_2025_11_03.zip",
        "date" => "2025-11-03 10:15 AM",
        "size" => "12.5 MB"
    ],

    [
        "file" => "backup_2025_10_25.zip",
        "date" => "2025-10-25 08:45 PM",
        "size" => "11.9 MB"
    ],

    [
        "file" => "backup_2025_10_10.zip",
        "date" => "2025-10-10 03:22 PM",
        "size" => "10.7 MB"
    ]

];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Administrator Backup Center</title>

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
    background:rgba(255,255,255,0.08);
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
   INFO BOX
========================= */

.info-box{
    background:rgba(255,255,255,0.08);
    padding:16px;
    border-radius:12px;
    margin-bottom:20px;
    border-left:4px solid #06b6d4;
}

/* =========================
   BUTTONS
========================= */

.export-btns{
    display:flex;
    flex-wrap:wrap;
    gap:15px;
    margin-bottom:20px;
}

button{
    border:none;
    padding:12px 18px;
    border-radius:12px;
    cursor:pointer;
    color:white;
    background:linear-gradient(135deg,#2563eb,#06b6d4);
    transition:0.3s;
    font-size:14px;
}

button:hover{
    transform:scale(1.05);
}

.restore-btn{
    background:linear-gradient(135deg,#16a34a,#22c55e);
}

/* =========================
   SUCCESS MESSAGE
========================= */

.success-msg{
    display:none;
    padding:14px;
    background:rgba(34,197,94,0.2);
    border:1px solid #22c55e;
    border-radius:12px;
    margin-bottom:20px;
}

/* =========================
   PROGRESS BAR
========================= */

.progress-container{
    width:100%;
    background:rgba(255,255,255,0.08);
    border-radius:10px;
    overflow:hidden;
    display:none;
    margin-bottom:25px;
}

.progress-bar{
    height:14px;
    width:0%;
    background:linear-gradient(135deg,#22c55e,#16a34a);
    transition:width 0.5s;
}

/* =========================
   TABLE
========================= */

.table-container{
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:15px;
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
    color:#94a3b8;
    padding:25px;
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

    .export-btns{
        flex-direction:column;
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

    <h1>ADMINISTRATOR BACKUP CENTER</h1>

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

<!-- =========================
     MAIN CONTENT
========================= -->

<div class="container">

    <div class="panel">

        <h2>💾 Backup & Data Export</h2>

        <!-- INFO -->

        <div class="info-box">
            <b>Last Backup:</b>
            <?php echo $lastBackup; ?>
        </div>

        <!-- SUCCESS MESSAGE -->

        <div class="success-msg" id="msgBox">
            Backup completed successfully!
        </div>

        <!-- EXPORT BUTTONS -->

        <div class="export-btns">

            <button onclick="exportData('csv')">
                Export CSV
            </button>

            <button onclick="exportData('pdf')">
                Export PDF
            </button>

            <button onclick="exportData('xml')">
                Export XML
            </button>

            <button onclick="performBackup()">
                Create Full Backup
            </button>

        </div>

        <!-- PROGRESS BAR -->

        <div class="progress-container">

            <div class="progress-bar" id="progressBar"></div>

        </div>

        <!-- TABLE -->

        <div class="table-container">

            <h2>📁 Backup History</h2>

            <table>

                <thead>

                    <tr>
                        <th>Backup File</th>
                        <th>Date Created</th>
                        <th>Size</th>
                        <th>Action</th>
                    </tr>

                </thead>

                <tbody id="backupTable">

                    <?php foreach($backupFiles as $b): ?>

                    <tr>

                        <td>
                            <?php echo htmlspecialchars($b['file']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($b['date']); ?>
                        </td>

                        <td>
                            <?php echo htmlspecialchars($b['size']); ?>
                        </td>

                        <td>

                            <button
                            class="restore-btn"
                            onclick="restoreBackup('<?php echo $b['file']; ?>')">

                                Restore

                            </button>

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
    © 2025 EduPro Hub | Backup & Data Management
</footer>

<!-- =========================
     JAVASCRIPT
========================= -->

<script>

// ===============================
// EXPORT FUNCTION
// ===============================

function exportData(type){

    alert("Preparing " + type.toUpperCase() + " export...");

}

// ===============================
// CREATE BACKUP
// ===============================

function performBackup(){

    const msg = document.getElementById("msgBox");

    const progress = document.getElementById("progressBar");

    const progressContainer =
    document.querySelector(".progress-container");

    msg.style.display = "none";

    progress.style.width = "0%";

    progressContainer.style.display = "block";

    let width = 0;

    const interval = setInterval(() => {

        width += 20;

        progress.style.width = width + "%";

        if(width >= 100){

            clearInterval(interval);

            msg.style.display = "block";

            progressContainer.style.display = "none";

            const date = new Date().toLocaleString();

            const table =
            document.getElementById("backupTable");

            const newRow = `

            <tr>

                <td>
                backup_${date.replace(/[ :/,]/g,"_")}.zip
                </td>

                <td>${date}</td>

                <td>13.1 MB</td>

                <td>

                    <button
                    class="restore-btn"
                    onclick="restoreBackup('backup_${date}.zip')">

                    Restore

                    </button>

                </td>

            </tr>

            `;

            table.innerHTML = newRow + table.innerHTML;

        }

    },500);

}

// ===============================
// RESTORE BACKUP
// ===============================

function restoreBackup(file){

    if(confirm(
    "Are you sure you want to restore " +
    file +
    "? This will overwrite current data."
    )){

        alert("Restoring from " + file + "...");

        setTimeout(() => {

            alert(
            "System restored successfully from "
            + file
            );

        },1500);

    }

}

</script>

</body>
</html>