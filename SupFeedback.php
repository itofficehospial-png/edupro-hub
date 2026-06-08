<?php
session_start();

if(!isset($_SESSION['user'])){
    $_SESSION['user'] = "Supervisor";
}

// ----- PHP: Handle form submission -----
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $studentName = $_POST['student_name'];

    $criteria1 = $_POST['criteria1'];
    $marks1 = $_POST['marks1'];
    $remarks1 = $_POST['remarks1'];

    $criteria2 = $_POST['criteria2'];
    $marks2 = $_POST['marks2'];
    $remarks2 = $_POST['remarks2'];

    $criteria3 = $_POST['criteria3'];
    $marks3 = $_POST['marks3'];
    $remarks3 = $_POST['remarks3'];

    $totalMarks = $_POST['total_marks'];

    // Save feedback
    $file = fopen(
    "feedback_records.txt",
    "a"
    );

    fwrite(
    $file,
    "Student: $studentName\n"
    );

    fwrite(
    $file,
    "$criteria1: $marks1 | $remarks1\n"
    );

    fwrite(
    $file,
    "$criteria2: $marks2 | $remarks2\n"
    );

    fwrite(
    $file,
    "$criteria3: $marks3 | $remarks3\n"
    );

    fwrite(
    $file,
    "Total Marks: $totalMarks\n"
    );

    fwrite(
    $file,
    "----------------------\n"
    );

    fclose($file);

    echo "
    <script>
    alert('Feedback saved successfully!');
    </script>
    ";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>
Supervisor Feedback | EduPro Hub
</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Segoe UI',sans-serif;
    background:#f2f4f8;
}

/* Topbar */
.topbar{
    height:60px;
    background:#0f766e;
    color:#ecfeff;
    display:flex;
    align-items:center;
    padding:0 20px;
    gap:20px;
}

.menu-btn{
    font-size:26px;
    cursor:pointer;
}

.topbar h2{
    font-size:20px;
}

/* Layout */
.wrapper{
    display:flex;
    height:calc(100vh - 60px);
}

/* Sidebar */
.sidebar{
    width:0;
    overflow:hidden;
    background:#ffffff;
    border-right:1px solid #e5e7eb;
    transition:0.3s;
    height:100%;
}

.sidebar.open{
    width:230px;
}

.sidebar a{
    display:block;
    padding:14px 20px;
    color:#065f46;
    text-decoration:none;
    transition:0.3s;
}

.sidebar a:hover{
    background:#f0fdfa;
    color:#0f766e;
}

/* Main content */
.main-content{
    flex:1;
    padding:25px;
    overflow-y:auto;
}

/* Card */
.card{
    background:white;
    padding:30px;
    border-radius:10px;
    box-shadow:0 4px 12px rgba(0,0,0,0.1);
}

.section-title{
    color:#2c3e50;
    margin-bottom:20px;
}

/* Form */
label{
    font-weight:bold;
}

input[type="text"],
input[type="number"]{
    width:100%;
    padding:10px;
    margin-top:6px;
    border:1px solid #ccc;
    border-radius:5px;
}

/* Table */
table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}

th{
    background:#0f766e;
    color:white;
}

th,
td{
    padding:12px;
    border:1px solid #ddd;
}

tr:nth-child(even){
    background:#f9f9f9;
}

/* Total marks */
.total-box{
    margin-top:20px;
    text-align:right;
}

.total-box input{
    width:80px;
    text-align:center;
    border:2px solid #0f766e;
    font-weight:bold;
}

/* Buttons */
.btn{
    background:#27ae60;
    color:white;
    padding:12px 30px;
    border:none;
    border-radius:5px;
    cursor:pointer;
    font-size:16px;
    transition:0.3s;
}

.btn:hover{
    background:#1f8c4d;
}

/* Footer */
footer{
    text-align:center;
    padding:15px;
    background:#fff;
    border-top:1px solid #ddd;
    color:#777;
}

/* Mobile */
@media(max-width:768px){

    table{
        font-size:14px;
    }

    th,
    td{
        padding:8px;
    }
}
</style>
</head>

<body>

<!-- Topbar -->
<div class="topbar">

    <div class="menu-btn"
    onclick="toggleSidebar()">☰</div>

    <h2>
        Supervisor Feedback
    </h2>

    <div style="margin-left:auto;">

        Welcome,
        <?php echo $_SESSION['user']; ?> 👋

    </div>

</div>

<div class="wrapper">

    <!-- Sidebar -->
    <div class="sidebar"
    id="sidebar">

<h4><a href="SupDashboard.php">Supervisor dashboard</a>
        <a href="AssignedPro.php">Assigned Projects</a>
        <a href="ProjectR.php">Project Review</a>
        <a href="SupFeedback.php">Give Feedback</a>
        <a href="MeetingDiscussion.php">Meeting / Discussion</a>
        <a href="Report.php">Generate Report</a>
        <a href="SupNotification.php">Get Notifications</a>
        <a href="SupProfile.php">Supervisors Profile</a>
        <a href="Logout.php">LOGOUT</a>
        </h4>

    </div>

    <!-- Main content -->
    <div class="main-content">

        <div class="card">

            <h2 class="section-title">
                EduPro Hub - Supervisor Feedback Form
            </h2>

            <form method="POST">

                <!-- Student Name -->
                <label>
                    Student Name
                </label>

                <input type="text"
                name="student_name"
                required>

                <!-- Table -->
                <table>

                    <tr>

                        <th>
                            Criteria
                        </th>

                        <th>
                            Marks
                            (out of 10)
                        </th>

                        <th>
                            Remarks
                        </th>

                    </tr>

                    <!-- Row 1 -->
                    <tr>

                        <td>

                            <input type="text"
                            name="criteria1"

                            value="Project Understanding"

                            readonly>

                        </td>

                        <td>

                            <input type="number"

                            name="marks1"

                            id="marks1"

                            min="0"
                            max="10"

                            value="0"

                            oninput="calculateTotal()">

                        </td>

                        <td>

                            <input type="text"
                            name="remarks1">

                        </td>

                    </tr>

                    <!-- Row 2 -->
                    <tr>

                        <td>

                            <input type="text"

                            name="criteria2"

                            value="Innovation & Creativity"

                            readonly>

                        </td>

                        <td>

                            <input type="number"

                            name="marks2"

                            id="marks2"

                            min="0"
                            max="10"

                            value="0"

                            oninput="calculateTotal()">

                        </td>

                        <td>

                            <input type="text"
                            name="remarks2">

                        </td>

                    </tr>

                    <!-- Row 3 -->
                    <tr>

                        <td>

                            <input type="text"

                            name="criteria3"

                            value="Presentation & Communication"

                            readonly>

                        </td>

                        <td>

                            <input type="number"

                            name="marks3"

                            id="marks3"

                            min="0"
                            max="10"

                            value="0"

                            oninput="calculateTotal()">

                        </td>

                        <td>

                            <input type="text"
                            name="remarks3">

                        </td>

                    </tr>

                </table>

                <!-- Total -->
                <div class="total-box">

                    <label>
                        Total Marks:
                    </label>

                    <input type="text"

                    id="total_marks"

                    name="total_marks"

                    readonly>

                </div>

                <!-- Submit -->
                <div
                style="
                text-align:center;
                margin-top:30px;">

                    <button type="submit"
                    class="btn">

                        Save Feedback

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

<footer>

© <?php echo date("Y"); ?>
EduPro Hub | Supervisor Feedback

</footer>

<script>

// Toggle sidebar
function toggleSidebar(){

    document
    .getElementById("sidebar")
    .classList
    .toggle("open");
}

// Calculate total
function calculateTotal(){

    let m1 =
    parseFloat(
    document.getElementById(
    'marks1'
    ).value
    ) || 0;

    let m2 =
    parseFloat(
    document.getElementById(
    'marks2'
    ).value
    ) || 0;

    let m3 =
    parseFloat(
    document.getElementById(
    'marks3'
    ).value
    ) || 0;

    let total =
    m1 + m2 + m3;

    document
    .getElementById(
    'total_marks'
    )
    .value = total;
}

// Initial total
calculateTotal();

</script>

</body>
</html>