<?php

// ======================================
// SAMPLE REPORT DATA
// ======================================

$departments = [
    "Computer Science",
    "Information Technology",
    "Software Engineering"
];

$supervisors = [
    "Dr. Jane Atwine",
    "Dr. Alex Turyasingura",
    "Dr. Peter Ouma"
];

$academicYears = [
    "2023/2024",
    "2024/2025",
    "2025/2026"
];

$reports = [

    [
        "title"=>"AI Chatbot System",
        "department"=>"Computer Science",
        "supervisor"=>"Dr. Jane Atwine",
        "year"=>"2024/2025",
        "status"=>"Approved"
    ],

    [
        "title"=>"Hospital Queue Manager",
        "department"=>"Information Technology",
        "supervisor"=>"Dr. Alex Turyasingura",
        "year"=>"2024/2025",
        "status"=>"Pending"
    ],

    [
        "title"=>"E-learning Platform",
        "department"=>"Software Engineering",
        "supervisor"=>"Dr. Peter Ouma",
        "year"=>"2023/2024",
        "status"=>"Approved"
    ],

    [
        "title"=>"Network Analyzer",
        "department"=>"Computer Science",
        "supervisor"=>"Dr. Jane Atwine",
        "year"=>"2024/2025",
        "status"=>"Rejected"
    ]

];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Administrator Reports Center</title>

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
   TOPBAR
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
   HEADING
========================== */

.panel h2{
    color:#93c5fd;
    margin-bottom:25px;
    text-align:center;
}

/* ==========================
   FILTER GROUP
========================== */

.filter-group{
    display:flex;
    flex-wrap:wrap;
    gap:20px;
    margin-bottom:25px;
    justify-content:space-between;
}

.filter-box{
    flex:1;
    min-width:220px;
}

label{
    display:block;
    margin-bottom:8px;
    color:#e2e8f0;
    font-weight:600;
}

select{
    width:100%;
    padding:12px;
    border:none;
    border-radius:12px;
    background:rgba(255,255,255,0.08);
    color:white;
    outline:none;
    font-size:14px;
}

select option{
    color:black;
}

/* ==========================
   BUTTONS
========================== */

button{
    border:none;
    padding:12px 20px;
    border-radius:12px;
    cursor:pointer;
    color:white;
    font-size:14px;
    transition:0.3s;
    background:
    linear-gradient(135deg,#2563eb,#06b6d4);
}

button:hover{
    transform:scale(1.05);
}

.download-btns{
    text-align:right;
    margin-top:20px;
}

.download-btns button{
    margin-left:10px;
    background:
    linear-gradient(135deg,#16a34a,#22c55e);
}

/* ==========================
   TABLE
========================== */

.table-container{
    overflow-x:auto;
    margin-top:25px;
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
   STATUS BADGES
========================== */

.status{
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:bold;
}

.approved{
    background:rgba(34,197,94,0.2);
    color:#22c55e;
}

.pending{
    background:rgba(234,179,8,0.2);
    color:#facc15;
}

.rejected{
    background:rgba(239,68,68,0.2);
    color:#f87171;
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
        gap:10px;
        padding:18px;
        text-align:center;
    }

    .filter-group{
        flex-direction:column;
    }

    .download-btns{
        text-align:center;
    }

    .download-btns button{
        margin:10px 5px;
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

    <h1>ADMINISTRATOR REPORTS CENTER</h1>

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

        <h2>📊 Generate Reports</h2>

        <!-- FILTERS -->

        <div class="filter-group">

            <div class="filter-box">

                <label>
                    Department
                </label>

                <select id="department">

                    <option value="">
                        All Departments
                    </option>

                    <?php foreach($departments as $d): ?>

                    <option>
                        <?php echo $d; ?>
                    </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <div class="filter-box">

                <label>
                    Supervisor
                </label>

                <select id="supervisor">

                    <option value="">
                        All Supervisors
                    </option>

                    <?php foreach($supervisors as $s): ?>

                    <option>
                        <?php echo $s; ?>
                    </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <div class="filter-box">

                <label>
                    Academic Year
                </label>

                <select id="year">

                    <option value="">
                        All Years
                    </option>

                    <?php foreach($academicYears as $y): ?>

                    <option>
                        <?php echo $y; ?>
                    </option>

                    <?php endforeach; ?>

                </select>

            </div>

            <div
            style="
            align-self:flex-end;
            ">

                <button onclick="generateReport()">

                    Generate Report

                </button>

            </div>

        </div>

        <!-- RESULTS -->

        <div
        class="table-container"
        id="reportResults"
        style="display:none;">

            <table id="reportTable">

                <thead>

                    <tr>

                        <th>Project Title</th>
                        <th>Department</th>
                        <th>Supervisor</th>
                        <th>Academic Year</th>
                        <th>Status</th>

                    </tr>

                </thead>

                <tbody></tbody>

            </table>

            <!-- DOWNLOAD BUTTONS -->

            <div class="download-btns">

                <button onclick="downloadReport('pdf')">

                    Download PDF

                </button>

                <button onclick="downloadReport('excel')">

                    Download Excel

                </button>

            </div>

        </div>

    </div>

</div>

<!-- ==========================
     FOOTER
========================== -->

<footer>
    © 2025 EduPro Hub | Report Management
</footer>

<!-- ==========================
     JAVASCRIPT
========================== -->

<script>

const reports =
<?php echo json_encode($reports); ?>;

// ===================================
// GENERATE REPORT
// ===================================

function generateReport(){

    const dept =
    document.getElementById("department").value;

    const sup =
    document.getElementById("supervisor").value;

    const year =
    document.getElementById("year").value;

    const filtered = reports.filter(r =>

        (dept === "" ||
        r.department === dept)

        &&

        (sup === "" ||
        r.supervisor === sup)

        &&

        (year === "" ||
        r.year === year)

    );

    const tbody =
    document.querySelector("#reportTable tbody");

    tbody.innerHTML = "";

    if(filtered.length === 0){

        tbody.innerHTML = `

        <tr>

        <td
        colspan="5"
        style="text-align:center;">

        No report results found.

        </td>

        </tr>

        `;

    }else{

        filtered.forEach(r => {

            let statusClass = "";

            if(r.status === "Approved"){
                statusClass = "approved";
            }

            else if(r.status === "Pending"){
                statusClass = "pending";
            }

            else{
                statusClass = "rejected";
            }

            const row = `

            <tr>

                <td>${r.title}</td>

                <td>${r.department}</td>

                <td>${r.supervisor}</td>

                <td>${r.year}</td>

                <td>

                    <span class="status ${statusClass}">
                        ${r.status}
                    </span>

                </td>

            </tr>

            `;

            tbody.innerHTML += row;

        });

    }

    document.getElementById("reportResults")
    .style.display = "block";

}

// ===================================
// DOWNLOAD REPORT
// ===================================

function downloadReport(type){

    alert(
    "Downloading report as "
    + type.toUpperCase()
    + "..."
    );

}

</script>

</body>
</html>