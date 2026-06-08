<?php

// ======================================
// USERS DATA
// ======================================

$users = [

    [
        "name" => "John Doe",
        "role" => "Student",
        "email" => "john.doe@eduprohub.ac.ug",
        "status" => "Active"
    ],

    [
        "name" => "Mary Atwine",
        "role" => "Supervisor",
        "email" => "mary.atwine@eduprohub.ac.ug",
        "status" => "Active"
    ],

    [
        "name" => "Robert Kato",
        "role" => "Admin",
        "email" => "robert.kato@eduprohub.ac.ug",
        "status" => "Inactive"
    ],

    [
        "name" => "Sarah Mirembe",
        "role" => "Student",
        "email" => "sarah.mirembe@eduprohub.ac.ug",
        "status" => "Active"
    ],

    [
        "name" => "Dr. Alex Turyasingura",
        "role" => "Supervisor",
        "email" => "alex.tury@eduprohub.ac.ug",
        "status" => "Active"
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

<title>Administrator User Management</title>

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
    color:#67e8f9;
    font-size:22px;
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
    justify-content:center;
    flex-wrap:wrap;
    gap:18px;
}

.dock a{
    text-decoration:none;
}

.dock-btn{
    width:115px;
    height:100px;
    border-radius:18px;
    background:rgba(255,255,255,0.08);
    backdrop-filter:blur(10px);
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    color:white;
    transition:0.3s;
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

.panel h2{
    text-align:center;
    color:#93c5fd;
    margin-bottom:25px;
}

/* =========================
   TOP ACTION BAR
========================= */

.top-actions{
    display:flex;
    justify-content:space-between;
    align-items:center;
    flex-wrap:wrap;
    gap:15px;
    margin-bottom:25px;
}

.search-filter{
    display:flex;
    flex-wrap:wrap;
    gap:12px;
}

/* =========================
   INPUTS
========================= */

input[type="text"],
select{

    padding:12px;
    border:none;
    border-radius:12px;
    background:rgba(255,255,255,0.08);
    color:white;
    outline:none;
    min-width:220px;

}

select option{
    color:black;
}

input::placeholder{
    color:#cbd5e1;
}

/* =========================
   BUTTONS
========================= */

.btn{
    border:none;
    padding:12px 18px;
    border-radius:12px;
    color:white;
    cursor:pointer;
    transition:0.3s;
    font-size:14px;
}

.btn-primary{
    background:
    linear-gradient(135deg,#2563eb,#06b6d4);
}

.btn-edit{
    background:
    linear-gradient(135deg,#16a34a,#22c55e);
}

.btn-delete{
    background:
    linear-gradient(135deg,#dc2626,#ef4444);
}

.btn:hover{
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
}

table th{
    background:rgba(255,255,255,0.08);
    color:#67e8f9;
    padding:15px;
    text-align:left;
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
   STATUS
========================= */

.status-active{
    color:#22c55e;
    font-weight:bold;
}

.status-inactive{
    color:#ef4444;
    font-weight:bold;
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

    .top-actions{
        flex-direction:column;
        align-items:flex-start;
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
        margin-bottom:18px;
        padding:15px;
        border-radius:16px;
        background:
        rgba(255,255,255,0.05);
    }

    td{
        display:flex;
        justify-content:space-between;
        border:none;
        padding:10px 0;
    }

    td::before{
        content:attr(data-label);
        color:#67e8f9;
        font-weight:bold;
    }

}

</style>

</head>

<body>

<!-- =========================
     TOPBAR
========================= -->

<div class="topbar">

    <h1>USER MANAGEMENT CENTER</h1>

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

        <h2>👥 Manage System Users</h2>

        <!-- =========================
             ACTION BAR
        ========================= -->

        <div class="top-actions">

            <div class="search-filter">

                <input
                type="text"
                id="searchInput"
                placeholder="Search by name or email..."
                onkeyup="filterTable()">

                <select
                id="roleFilter"
                onchange="filterTable()">

                    <option value="">
                        All Roles
                    </option>

                    <option>
                        Student
                    </option>

                    <option>
                        Supervisor
                    </option>

                    <option>
                        Admin
                    </option>

                </select>

            </div>

            <button
            class="btn btn-primary"
            onclick="addUser()"><a href="AddUser.php">➕ Add User</a></button>

        </div>

        <!-- =========================
             TABLE
        ========================= -->

        <div class="table-container">

            <table id="userTable">

                <thead>

                    <tr>

                        <th>Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>

                    </tr>

                </thead>

                <tbody>

                <?php foreach($users as $u): ?>

                <tr>

                    <td data-label="Name">

                        <?php
                        echo htmlspecialchars($u['name']);
                        ?>

                    </td>

                    <td data-label="Role">

                        <?php
                        echo htmlspecialchars($u['role']);
                        ?>

                    </td>

                    <td data-label="Email">

                        <?php
                        echo htmlspecialchars($u['email']);
                        ?>

                    </td>

                    <td
                    data-label="Status"
                    class="<?php
                    echo strtolower(
                    'status-'.$u['status']
                    );
                    ?>">

                        <?php
                        echo htmlspecialchars($u['status']);
                        ?>

                    </td>

                    <td data-label="Actions">

                        <button
                        class="btn btn-edit"
                        onclick="
                        editUser(
                        '<?php echo $u['name']; ?>'
                        )">

                            Edit

                        </button>

                        <button
                        class="btn btn-delete"
                        onclick="
                        deleteUser(
                        '<?php echo $u['name']; ?>'
                        )">

                            Delete

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
    © 2025 EduPro Hub | Administration System
</footer>

<!-- =========================
     JAVASCRIPT
========================= -->

<script>

// ======================================
// SEARCH & FILTER
// ======================================

function filterTable(){

    const search =
    document
    .getElementById("searchInput")
    .value
    .toLowerCase();

    const role =
    document
    .getElementById("roleFilter")
    .value
    .toLowerCase();

    const rows =
    document.querySelectorAll(
    "#userTable tbody tr"
    );

    rows.forEach(row => {

        const name =
        row.cells[0]
        .textContent
        .toLowerCase();

        const userRole =
        row.cells[1]
        .textContent
        .toLowerCase();

        const email =
        row.cells[2]
        .textContent
        .toLowerCase();

        const matchesSearch =
        name.includes(search)
        ||
        email.includes(search);

        const matchesRole =
        role === ""
        ||
        userRole === role;

        row.style.display =
        (matchesSearch && matchesRole)
        ?
        ""
        :
        "none";

    });

}

// ======================================
// ADD USER
// ======================================

function addUser(){

    alert(
    "Add User form will open here."
    );

}

// ======================================
// EDIT USER
// ======================================

function editUser(name){

    alert(
    "Editing user: "
    + name
    );

}

// ======================================
// DELETE USER
// ======================================

function deleteUser(name){

    if(
        confirm(
        "Are you sure you want to delete "
        + name
        + "?"
        )
    ){

        alert(
        "User "
        + name
        + " deleted successfully!"
        );

    }

}

</script>

</body>
</html>