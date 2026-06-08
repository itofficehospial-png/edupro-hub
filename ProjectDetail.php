<?php
session_start();

$studentName = "Student";

// Example project details
$project = [
    'title' => 'Project A: AI-based Chatbot',
    'abstract' => 'This project aims to develop an intelligent AI-based chatbot...',
    'objectives' => [
        'Design a responsive chatbot interface',
        'Integrate natural language processing',
        'Implement project tracking features'
    ],
    'supervisorComments' => [
        'Good start, refine the abstract.',
        'Objectives are clear, but add measurable outcomes.'
    ],
    'documents' => [
        ['name' => 'ProjectProposal.pdf', 'grade' => 'Pending'],
        ['name' => 'InitialReport.docx', 'grade' => '85%']
    ],
    'completion' => 65
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Project Details</title>

<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:"Segoe UI",Tahoma,sans-serif;}
body{background:#f4f7fa;}

/* Header */
header{
    background:#1e3a8a;
    color:#fff;
    padding:18px;
    text-align:center;
}

/* Layout */
.container{display:flex;min-height:calc(100vh - 110px);}

/* Sidebar */
.sidebar{
    width:260px;
    background:linear-gradient(180deg,#1e3a8a,#1e40af);
    padding:25px 0;
}
.profile-section{text-align:center;margin-bottom:20px;}
.student-photo{width:70px;height:70px;border-radius:100%;border:3px solid #38bdf8;}
.student-name{color:#e0e7ff;}
.sidebar h3{text-align:center;color:#e0e7ff;margin-bottom:20px;}
.sidebar a{display:flex;padding:14px 28px;color:#c7d2fe;text-decoration:none;}
.sidebar a:hover{background:rgba(255,255,255,0.08);color:#fff;}

/* Main content */
.main-content{
    flex:1;
    padding:40px;
    background:#f8fafc;
}

/* INNER CONTENT */
.container-box{
    max-width:1000px;
    margin:auto;
    background:white;
    padding:30px;
    border-radius:12px;
    box-shadow:0 5px 20px rgba(0,0,0,0.05);
}

.project-info h2{color:#00609b;margin-bottom:15px;}
.comments{background:#f0f8ff;padding:15px;border-radius:10px;margin-bottom:20px;}

table{width:100%;border-collapse:collapse;}
th,td{padding:12px;border-bottom:1px solid #ddd;}
th{background:#00609b;color:white;}

.btn{padding:6px 12px;border:none;border-radius:6px;color:white;}
.view-btn{background:#28a745;}
.download-btn{background:#17a2b8;}

/* Progress */
.progress-container{
    background:#e0e0e0;
    border-radius:20px;
    height:25px;
}
.progress-bar{
    height:100%;
    background:#00609b;
    width:<?php echo $project['completion']; ?>%;
    text-align:center;
    color:white;
}

/* Footer */
footer{
    background:#1e42a3;
    color:#fff;
    text-align:center;
    padding:12px;
}
</style>
</head>

<body>

<header>
    <h1>Student Project Management System - CHECK YOUR PROJECT DETAILS.</h1>
</header>

<div class="container">

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="profile-section">
            <img src="OP.png" class="student-photo">
            <p class="student-name"><?php echo $studentName; ?></p>
        </div>

        <h3>EduPro-Hub PMS</h3>
        <h4>
             <a href="StdDashboard.php">STUDENT DASHBOARD</a>
        <a href="ProjectDetail.php">PROJECT DETAILS</a>
        <a href="SubmitP.php">SUBMIT PROPOSAL</a>
        <a href="MyProject.php">PROJECT PROGRESS</a>
        <a href="UploadPR.php">UPLOAD PROGRESS REPORT</a>
        <a href="Notification.php">NOTIFICATION</a>
        <a href="Stdprofile.php">MY PROFILE</a>
        <a href="MessageChat.php">MESSAGE/CHAT</a>
        <a href="Help.php">HELPS/TUTORIAL</a>
        <a href="Logout.php">LOGOUT</a>
    </h4>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">

        <div class="container-box">

            <!-- Project Info -->
            <div class="project-info">
                <h2><?php echo $project['title']; ?></h2>
                <p><strong>Abstract:</strong> <?php echo $project['abstract']; ?></p>

                <p><strong>Objectives:</strong></p>
                <ul>
                    <?php foreach($project['objectives'] as $obj) echo "<li>$obj</li>"; ?>
                </ul>
            </div>

            <!-- Comments -->
            <div class="comments">
                <h3>Supervisor Comments</h3>
                <?php foreach($project['supervisorComments'] as $comment) echo "<p>- $comment</p>"; ?>
            </div>

            <!-- Documents -->
            <h3>Uploaded Documents & Grades</h3>
            <table>
                <tr>
                    <th>Document</th>
                    <th>Grade</th>
                    <th>Actions</th>
                </tr>

                <?php foreach($project['documents'] as $doc): ?>
                <tr>
                    <td><?php echo $doc['name']; ?></td>
                    <td><?php echo $doc['grade']; ?></td>
                    <td>
                        <button class="btn view-btn" onclick="viewDocument('<?php echo $doc['name']; ?>')">View</button>
                        <button class="btn download-btn" onclick="downloadDocument('<?php echo $doc['name']; ?>')">Download</button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>

            <!-- Progress -->
            <h3>Project Progress</h3>
            <div class="progress-container">
                <div class="progress-bar"><?php echo $project['completion']; ?>%</div>
            </div>

        </div>

    </div>

</div>

<footer>
    &copy; <?php echo date("Y"); ?> Student PMS
</footer>

<script>
function viewDocument(doc){
    alert("Viewing: " + doc);
}
function downloadDocument(doc){
    alert("Downloading: " + doc);
}
</script>

</body>
</html>