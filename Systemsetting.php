<?php

// ======================================
// INSTITUTION SETTINGS DATA
// ======================================

$institution = [

    "name" => "MAKERERE UNIVERSITY",

    "address" => "P.O. Box 123, Kampala, Uganda",

    "logo" =>
    "https://upload.wikimedia.org/wikipedia/commons/4/4a/Edu_logo.png"

];

// ======================================
// GRADING SCALE
// ======================================

$gradingScale = [

    [
        "grade" => "A",
        "min" => 80,
        "max" => 100,
        "points" => 5
    ],

    [
        "grade" => "B",
        "min" => 70,
        "max" => 79,
        "points" => 4
    ],

    [
        "grade" => "C",
        "min" => 60,
        "max" => 69,
        "points" => 3
    ],

    [
        "grade" => "D",
        "min" => 50,
        "max" => 59,
        "points" => 2
    ],

    [
        "grade" => "F",
        "min" => 0,
        "max" => 49,
        "points" => 0
    ]

];

// ======================================
// DEADLINE
// ======================================

$submissionDeadline = "2025-12-15";

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Administrator System Settings</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Segoe UI, sans-serif;
}

body{
    min-height:100vh;
    background:
    linear-gradient(135deg,#020617,#0f172a,#111827);
    color:white;
}

/* =========================
   TOPBAR
========================= */

.topbar{
    width:100%;
    height:75px;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:0 30px;
    background:rgba(255,255,255,0.06);
    backdrop-filter:blur(10px);
    border-bottom:1px solid rgba(255,255,255,0.08);
}

.topbar h1{
    font-size:22px;
    color:#67e8f9;
}

.admin-name{
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
    background:
    linear-gradient(135deg,#2563eb,#06b6d4);
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
   SECTIONS
========================= */

section{
    margin-bottom:40px;
}

section h2{
    color:#93c5fd;
    margin-bottom:20px;
}

/* =========================
   INPUTS
========================= */

label{
    display:block;
    margin-bottom:8px;
    margin-top:15px;
    color:#cbd5e1;
    font-weight:600;
}

input[type="text"],
input[type="date"],
input[type="number"],
textarea{

    width:100%;
    padding:12px;
    border:none;
    border-radius:12px;
    background:rgba(255,255,255,0.08);
    color:white;
    outline:none;
    font-size:15px;

}

textarea{
    resize:none;
    min-height:100px;
}

input[type="file"]{
    margin-top:10px;
    color:white;
}

input::placeholder,
textarea::placeholder{
    color:#cbd5e1;
}

/* =========================
   BUTTONS
========================= */

button{
    margin-top:20px;
    border:none;
    padding:12px 20px;
    border-radius:12px;
    color:white;
    font-size:14px;
    cursor:pointer;
    transition:0.3s;
    background:
    linear-gradient(135deg,#2563eb,#06b6d4);
}

button:hover{
    transform:scale(1.05);
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
}

table td{
    padding:15px;
    border-bottom:
    1px solid rgba(255,255,255,0.08);
}

table tr:hover{
    background:
    rgba(255,255,255,0.04);
}

/* =========================
   LOGO
========================= */

.logo-preview{

    width:120px;
    height:120px;
    object-fit:contain;
    border-radius:15px;
    background:white;
    padding:10px;
    margin-top:10px;

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

    <h1>SYSTEM SETTINGS CENTER</h1>

    <div class="admin-name">
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

        <!-- =========================
             INSTITUTION SETTINGS
        ========================= -->

        <section>

            <h2>🏫 Institution Details</h2>

            <form id="institutionForm">

                <label>
                    Institution Name
                </label>

                <input
                type="text"
                id="instName"
                value="<?php echo htmlspecialchars($institution['name']); ?>">

                <label>
                    Address
                </label>

                <textarea
                id="instAddress"><?php
                echo htmlspecialchars($institution['address']);
                ?></textarea>

                <label>
                    Institution Logo
                </label>

                <img
                src="<?php echo $institution['logo']; ?>"
                id="logoPreview"
                class="logo-preview">

                <br>

                <input
                type="file"
                id="instLogo"
                accept="image/*"
                onchange="previewLogo(event)">

                <button
                type="button"
                onclick="saveInstitution()">

                    Save Institution Details

                </button>

            </form>

        </section>

        <!-- =========================
             GRADING SCALE
        ========================= -->

        <section>

            <h2>📘 Grading Scale Configuration</h2>

            <div class="table-container">

                <table id="gradingTable">

                    <thead>

                        <tr>

                            <th>Grade</th>
                            <th>Min %</th>
                            <th>Max %</th>
                            <th>Points</th>

                        </tr>

                    </thead>

                    <tbody>

                    <?php foreach($gradingScale as $g): ?>

                    <tr>

                        <td>

                            <input
                            type="text"
                            value="<?php echo $g['grade']; ?>"
                            maxlength="1">

                        </td>

                        <td>

                            <input
                            type="number"
                            value="<?php echo $g['min']; ?>">

                        </td>

                        <td>

                            <input
                            type="number"
                            value="<?php echo $g['max']; ?>">

                        </td>

                        <td>

                            <input
                            type="number"
                            value="<?php echo $g['points']; ?>">

                        </td>

                    </tr>

                    <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

            <button
            type="button"
            onclick="saveGrading()">

                Save Grading Scale

            </button>

        </section>

        <!-- =========================
             DEADLINE
        ========================= -->

        <section>

            <h2>📅 Submission Deadline</h2>

            <form id="deadlineForm">

                <label>
                    Project Submission Deadline
                </label>

                <input
                type="date"
                id="deadline"
                value="<?php echo $submissionDeadline; ?>">

                <button
                type="button"
                onclick="saveDeadline()">

                    Save Deadline

                </button>

            </form>

        </section>

    </div>

</div>

<!-- =========================
     FOOTER
========================= -->

<footer>
    © 2025 EduPro Hub | System Configuration Panel
</footer>

<!-- =========================
     JAVASCRIPT
========================= -->

<script>

// ======================================
// PREVIEW LOGO
// ======================================

function previewLogo(event){

    const file = event.target.files[0];

    if(file){

        const reader = new FileReader();

        reader.onload = function(e){

            document
            .getElementById("logoPreview")
            .src = e.target.result;

        };

        reader.readAsDataURL(file);

    }

}

// ======================================
// SAVE INSTITUTION
// ======================================

function saveInstitution(){

    const name =
    document.getElementById("instName").value;

    const address =
    document.getElementById("instAddress").value;

    alert(
    "Institution details saved:\n\n"
    +
    "Institution: "
    +
    name
    +
    "\nAddress: "
    +
    address
    );

}

// ======================================
// SAVE GRADING SCALE
// ======================================

function saveGrading(){

    const rows =
    document.querySelectorAll(
    "#gradingTable tbody tr"
    );

    let grades = [];

    rows.forEach(row => {

        const inputs =
        row.querySelectorAll("input");

        grades.push({

            grade:
            inputs[0].value,

            min:
            inputs[1].value,

            max:
            inputs[2].value,

            points:
            inputs[3].value

        });

    });

    alert(
    "Grading scale saved successfully!"
    );

}

// ======================================
// SAVE DEADLINE
// ======================================

function saveDeadline(){

    const date =
    document.getElementById("deadline").value;

    alert(
    "Submission deadline updated to: "
    +
    date
    );

}

</script>

</body>
</html>