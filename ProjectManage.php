<?php

// ======================================
// PROJECT DATA
// ======================================

$projects = [

    [
        "title" => "AI Chatbot for Student Services",
        "student" => "John Doe",
        "supervisor" => "Dr. Jane Atwine",
        "status" => "Pending"
    ],

    [
        "title" => "Hospital Queue Management System",
        "student" => "Mary Nanyonga",
        "supervisor" => "Dr. Alex Turyasingura",
        "status" => "Approved"
    ],

    [
        "title" => "E-Learning Mobile App",
        "student" => "Samuel Kato",
        "supervisor" => "Not Assigned",
        "status" => "Pending"
    ],

    [
        "title" => "Network Security Analyzer",
        "student" => "Sarah Nakato",
        "supervisor" => "Dr. Peter Ouma",
        "status" => "Rejected"
    ]

];

// ======================================
// SUPERVISORS
// ======================================

$supervisors = [

    "Dr. Jane Atwine",
    "Dr. Alex Turyasingura",
    "Dr. Peter Ouma",
    "Dr. Monica Akello"

];

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta
name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Administrator Project Management</title>

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
   SELECT INPUTS
========================== */

select{
    padding:10px;
    border:none;
    border-radius:10px;
    background:rgba(255,255,255,0.08);
    color:white;
    outline:none;
}

select option{
    color:black;
}

/* ==========================
   STATUS BADGES
========================== */

.status-badge{
    padding:7px 14px;
    border-radius:20px;
    font-size:13px;
    font-weight:bold;
}

.pending{
    background:rgba(234,179,8,0.2);
    color:#facc15;
}

.approved{
    background:rgba(34,197,94,0.2);
    color:#22c55e;
}

.rejected{
    background:rgba(239,68,68,0.2);
    color:#f87171;
}

/* ==========================
   BUTTONS
========================== */

button{
    border:none;
    padding:10px 18px;
    border-radius:10px;
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

    .dock-btn{
        width:100px;
        height:90px;
    }

    table,
    thead,
    tbody,
    th,
    td,
    tr{
        display:block;
    }

    thead{
        display:none;
    }

    tr{
        margin-bottom:20px;
        border-radius:15px;
        background:rgba(255,255,255,0.05);
        padding:15px;
    }

    td{
        display:flex;
        justify-content:space-between;
        padding:12px 0;
        border:none;
    }

    td::before{
        content:attr(data-label);
        font-weight:bold;
        color:#67e8f9;
    }

}

</style>

</head>

<body>

<!-- ==========================
     TOPBAR
========================== -->

<div class="topbar">

    <h1>PROJECT MANAGEMENT CENTER</h1>

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

        <h2>📁 Manage Student Projects</h2>

        <div class="table-container">

            <table id="projectTable">

                <thead>

                    <tr>

                        <th>Project Title</th>
                        <th>Student</th>
                        <th>Supervisor</th>
                        <th>Status</th>
                        <th>Actions</th>

                    </tr>

                </thead>

                <tbody>

                <?php foreach($projects as $p): ?>

                <tr>

                    <td data-label="Project Title">

                        <?php
                        echo htmlspecialchars($p['title']);
                        ?>

                    </td>

                    <td data-label="Student">

                        <?php
                        echo htmlspecialchars($p['student']);
                        ?>

                    </td>

                    <td data-label="Supervisor">

                        <select
                        onchange="
                        assignSupervisor(
                        '<?php echo $p['title']; ?>',
                        this.value
                        )">

                            <option
                            <?php echo
                            ($p['supervisor']
                            ==
                            'Not Assigned')
                            ?
                            'selected'
                            :
                            '';
                            ?>>

                                Not Assigned

                            </option>

                            <?php foreach($supervisors as $sup): ?>

                            <option

                            <?php echo
                            ($p['supervisor']
                            ==
                            $sup)
                            ?
                            'selected'
                            :
                            '';
                            ?>>

                            <?php echo $sup; ?>

                            </option>

                            <?php endforeach; ?>

                        </select>

                    </td>

                    <td data-label="Status">

                        <?php

                        $statusClass = "";

                        if($p['status'] == "Pending"){
                            $statusClass = "pending";
                        }

                        elseif($p['status'] == "Approved"){
                            $statusClass = "approved";
                        }

                        else{
                            $statusClass = "rejected";
                        }

                        ?>

                        <select
                        onchange="
                        updateStatus(
                        '<?php echo $p['title']; ?>',
                        this.value
                        )">

                            <option
                            <?php echo
                            ($p['status']
                            ==
                            'Pending')
                            ?
                            'selected'
                            :
                            '';
                            ?>>

                                Pending

                            </option>

                            <option
                            <?php echo
                            ($p['status']
                            ==
                            'Approved')
                            ?
                            'selected'
                            :
                            '';
                            ?>>

                                Approved

                            </option>

                            <option
                            <?php echo
                            ($p['status']
                            ==
                            'Rejected')
                            ?
                            'selected'
                            :
                            '';
                            ?>>

                                Rejected

                            </option>

                        </select>

                    </td>

                    <td data-label="Actions">

                        <button
                        onclick="
                        viewProject(
                        '<?php echo $p['title']; ?>'
                        )">

                            View

                        </button>

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
    © 2025 EduPro Hub | Project Management System
</footer>

<!-- ==========================
     JAVASCRIPT
========================== -->

<script>

// ======================================
// ASSIGN SUPERVISOR
// ======================================

function assignSupervisor(
    projectTitle,
    supervisor
){

    alert(
    "Supervisor '"
    + supervisor
    + "' assigned to project: "
    + projectTitle
    );

}

// ======================================
// UPDATE STATUS
// ======================================

function updateStatus(
    projectTitle,
    status
){

    alert(
    "Status of '"
    + projectTitle
    + "' updated to: "
    + status
    );

}

// ======================================
// VIEW PROJECT
// ======================================

function viewProject(title){

    alert(
    "Viewing project details for: "
    + title
    );

}

</script>

</body>
</html>