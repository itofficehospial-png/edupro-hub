<?php
session_start();

if(!isset($_SESSION['user'])){
    $_SESSION['user'] = "Supervisor";
}

// ===================== PHP BACKEND =====================

// Sample student report data
$students = [

    [
        "name" => "Alice Johnson",
        "dept" => "Computer Science",
        "project" => "AI Chatbot",
        "progress" => "85%",
        "status" => "Ongoing"
    ],

    [
        "name" => "Brian Lee",
        "dept" => "Information Tech",
        "project" => "Smart Attendance System",
        "progress" => "100%",
        "status" => "Completed"
    ],

    [
        "name" => "Carla Green",
        "dept" => "Electrical Eng",
        "project" => "IoT Sensor Network",
        "progress" => "70%",
        "status" => "Ongoing"
    ],

    [
        "name" => "David Kim",
        "dept" => "Computer Science",
        "project" => "Blockchain Ledger",
        "progress" => "40%",
        "status" => "Pending"
    ],

    [
        "name" => "Ella Smith",
        "dept" => "Information Tech",
        "project" => "Cloud Storage Manager",
        "progress" => "90%",
        "status" => "Completed"
    ]
];

// Filtering
$filtered = $students;

if(isset($_GET['department'])
&& $_GET['department'] != ""){

    $filtered = array_filter(
        $filtered,
        fn($s) =>
        $s['dept'] ==
        $_GET['department']
    );
}

if(isset($_GET['status'])
&& $_GET['status'] != ""){

    $filtered = array_filter(
        $filtered,
        fn($s) =>
        $s['status'] ==
        $_GET['status']
    );
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>
Supervisor Reports | EduPro Hub
</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Segoe UI',sans-serif;
    background:#f4f6f9;
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

/* Cards */
.card{
    background:#fff;
    border-radius:10px;
    box-shadow:0 4px 10px rgba(0,0,0,0.1);
    padding:25px;
    margin-bottom:20px;
}

.section-title{
    color:#2c3e50;
    margin-bottom:20px;
}

/* Filters */
.filter-form{
    display:flex;
    flex-wrap:wrap;
    gap:20px;
    margin-top:20px;
}

.filter-form div{
    flex:1;
    min-width:200px;
}

label{
    font-weight:bold;
}

select{
    width:100%;
    padding:10px;
    margin-top:5px;
    border:1px solid #ccc;
    border-radius:5px;
}

/* Buttons */
.btn{
    background:#0f766e;
    color:white;
    padding:10px 20px;
    border:none;
    border-radius:5px;
    cursor:pointer;
    transition:0.3s;
}

.btn:hover{
    background:#115e59;
}

.export-btn{
    background:#2980b9;
}

.export-btn:hover{
    background:#1f6692;
}

.pdf-btn{
    background:#c0392b;
}

.pdf-btn:hover{
    background:#a93226;
}

/* Table */
.table-wrapper{
    overflow-x:auto;
    margin-top:25px;
}

table{
    width:100%;
    border-collapse:collapse;
    background:#fff;
}

th{
    background:#0f766e;
    color:white;
}

th,
td{
    padding:12px;
    border:1px solid #ddd;
    text-align:center;
}

tr:nth-child(even){
    background:#fafafa;
}

.status-completed{
    color:green;
    font-weight:bold;
}

.status-ongoing{
    color:#f39c12;
    font-weight:bold;
}

.status-pending{
    color:red;
    font-weight:bold;
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

    .filter-form{
        flex-direction:column;
    }
}
</style>
</head>

<body>

<!-- Topbar -->
<div class="topbar">

    <div class="menu-btn"
    onclick="toggleSidebar()">☰</div>

    <h2>Supervisor Reports</h2>

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
                EduPro Hub - Supervisor Reports
            </h2>

            <!-- Filters -->
            <form method="GET"
            class="filter-form">

                <div>

                    <label>
                        Department
                    </label>

                    <select name="department">

                        <option value="">
                            All
                        </option>

                        <option value="Computer Science"
                        <?= (($_GET['department'] ?? '')
                        == 'Computer Science')
                        ? 'selected' : '' ?>>

                            Computer Science

                        </option>

                        <option value="Information Tech"
                        <?= (($_GET['department'] ?? '')
                        == 'Information Tech')
                        ? 'selected' : '' ?>>

                            Information Tech

                        </option>

                        <option value="Electrical Eng"
                        <?= (($_GET['department'] ?? '')
                        == 'Electrical Eng')
                        ? 'selected' : '' ?>>

                            Electrical Eng

                        </option>

                    </select>

                </div>

                <div>

                    <label>
                        Project Status
                    </label>

                    <select name="status">

                        <option value="">
                            All
                        </option>

                        <option value="Pending"
                        <?= (($_GET['status'] ?? '')
                        == 'Pending')
                        ? 'selected' : '' ?>>

                            Pending

                        </option>

                        <option value="Ongoing"
                        <?= (($_GET['status'] ?? '')
                        == 'Ongoing')
                        ? 'selected' : '' ?>>

                            Ongoing

                        </option>

                        <option value="Completed"
                        <?= (($_GET['status'] ?? '')
                        == 'Completed')
                        ? 'selected' : '' ?>>

                            Completed

                        </option>

                    </select>

                </div>

                <div
                style="align-self:end;">

                    <button type="submit"
                    class="btn">

                        Apply Filter

                    </button>

                </div>

            </form>

            <!-- Table -->
            <div class="table-wrapper">

                <table id="reportTable">

                    <tr>

                        <th>
                            Student Name
                        </th>

                        <th>
                            Department
                        </th>

                        <th>
                            Project Title
                        </th>

                        <th>
                            Progress
                        </th>

                        <th>
                            Status
                        </th>

                    </tr>

<?php if(empty($filtered)): ?>

<tr>

<td colspan="5">
    No records found.
</td>

</tr>

<?php else: ?>

<?php foreach($filtered as $s): ?>

<tr>

<td>
<?php echo $s['name']; ?>
</td>

<td>
<?php echo $s['dept']; ?>
</td>

<td>
<?php echo $s['project']; ?>
</td>

<td>
<?php echo $s['progress']; ?>
</td>

<td class="<?=
$s['status'] == 'Completed'
? 'status-completed'
: ($s['status'] == 'Ongoing'
? 'status-ongoing'
: 'status-pending')
?>">

<?php echo $s['status']; ?>

</td>

</tr>

<?php endforeach; ?>

<?php endif; ?>

                </table>

            </div>

            <!-- Export buttons -->
            <div
            style="margin-top:30px;
            display:flex;
            gap:15px;
            flex-wrap:wrap;">

                <button
                onclick="exportTableToExcel(
                'reportTable',
                'EduProHub_Reports'
                )"

                class="btn export-btn">

                    Export to Excel

                </button>

                <button
                onclick="exportTableToPDF()"

                class="btn pdf-btn">

                    Export to PDF

                </button>

            </div>

        </div>

    </div>

</div>

<footer>

© <?php echo date("Y"); ?>
EduPro Hub | Supervisor Reports

</footer>

<script>

// Toggle sidebar
function toggleSidebar(){

    document
    .getElementById("sidebar")
    .classList
    .toggle("open");
}

// Export Excel
function exportTableToExcel(
tableID,
filename = ''
){

    var dataType =
    'application/vnd.ms-excel';

    var tableSelect =
    document.getElementById(tableID);

    var tableHTML =
    tableSelect.outerHTML
    .replace(/ /g, '%20');

    filename =
    filename
    ? filename + '.xls'
    : 'EduProHub_Reports.xls';

    var downloadLink =
    document.createElement("a");

    document.body.appendChild(
    downloadLink
    );

    if(navigator.msSaveOrOpenBlob){

        var blob =
        new Blob(
        ['\ufeff', tableHTML],
        { type: dataType }
        );

        navigator.msSaveOrOpenBlob(
        blob,
        filename
        );

    } else {

        downloadLink.href =
        'data:' +
        dataType +
        ', ' +
        tableHTML;

        downloadLink.download =
        filename;

        downloadLink.click();
    }
}

// Export PDF
function exportTableToPDF(){

    var printWin =
    window.open(
    '',
    '',
    'width=900,height=700'
    );

    printWin.document.write(
    '<html><head><title>EduPro Hub Report</title></head><body>'
    );

    printWin.document.write(
    '<h2 style="text-align:center;">EduPro Hub - Student Progress Report</h2>'
    );

    printWin.document.write(
    document.getElementById(
    'reportTable'
    ).outerHTML
    );

    printWin.document.write(
    '</body></html>'
    );

    printWin.document.close();

    printWin.print();
}

</script>

</body>
</html>