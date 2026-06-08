<?php
session_start();

if(!isset($_SESSION['user'])){
    $_SESSION['user'] = "Supervisor";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Project Review | EduPro Hub</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Segoe UI',sans-serif;
    background:#f5f7fa;
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
    background:white;
    border-radius:12px;
    box-shadow:0 3px 12px rgba(0,0,0,0.1);
    padding:20px;
    margin-bottom:25px;
    transition:0.3s;
}

.card:hover{
    transform:scale(1.01);
}

.section-title{
    color:#333;
    margin-bottom:10px;
    border-left:5px solid #0f766e;
    padding-left:10px;
}

.proposal-content{
    line-height:1.7;
    color:#444;
    margin-top:10px;
}

/* Attachments */
.attachments a{
    display:inline-block;
    background:#e8f2ff;
    color:#00609b;
    padding:10px 15px;
    border-radius:8px;
    margin-right:10px;
    margin-top:10px;
    text-decoration:none;
    font-weight:500;
}

.attachments a:hover{
    background:#d4e7ff;
}

/* Textarea */
.comment-box textarea{
    width:100%;
    height:100px;
    border-radius:8px;
    border:1px solid #ccc;
    padding:10px;
    font-size:15px;
    resize:none;
    margin-top:10px;
}

/* Buttons */
.actions{
    margin-top:15px;
    display:flex;
    gap:10px;
}

.btn{
    border:none;
    color:white;
    padding:10px 20px;
    border-radius:8px;
    font-weight:500;
    cursor:pointer;
    transition:0.3s;
}

.approve{
    background:#28a745;
}

.approve:hover{
    background:#218838;
}

.reject{
    background:#dc3545;
}

.reject:hover{
    background:#c82333;
}

/* Feedback */
.feedback-history{
    margin-top:15px;
}

.feedback-item{
    background:#f1f9ff;
    border-left:4px solid #0f766e;
    padding:10px 15px;
    border-radius:6px;
    margin-bottom:10px;
}

.feedback-item p{
    margin:5px 0;
}

.timestamp{
    font-size:13px;
    color:gray;
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

    .actions{
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

    <h2>Project Review</h2>

    <div style="margin-left:auto;">
        Welcome,
        <?php echo $_SESSION['user']; ?> 👋
    </div>

</div>

<div class="wrapper">

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">

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

    <!-- Main Content -->
    <div class="main-content">

        <!-- Student Proposal -->
        <div class="card">

            <h3 class="section-title">
                Student Proposal
            </h3>

            <p>
                <strong>Student Name:</strong>
                Mary Atim
            </p>

            <p>
                <strong>Project Title:</strong>
                AI in Health Diagnostics
            </p>

            <p class="proposal-content">

                This project aims to develop an
                AI-based health diagnostic tool
                capable of detecting early signs
                of diseases using patient data
                and machine learning models.

                The system will provide
                preliminary analysis to assist
                doctors in medical decision-making.

            </p>

            <div class="attachments">

                <h4>Attached Files:</h4>

                <a href="#">
                    Proposal_Document.pdf
                </a>

                <a href="#">
                    Dataset_Summary.xlsx
                </a>

            </div>

        </div>

        <!-- Review -->
        <div class="card">

            <h3 class="section-title">
                Review & Feedback
            </h3>

            <form method="post"
            onsubmit="return false">

                <div class="comment-box">

                    <textarea
                    name="comment"
                    id="comment"
                    placeholder="Write your feedback here..."
                    required></textarea>

                </div>

                <div class="actions">

                    <button type="button"
                    class="btn approve"
                    onclick="handleDecision('Approved')">

                        ✅ Approve

                    </button>

                    <button type="button"
                    class="btn reject"
                    onclick="handleDecision('Rejected')">

                        ❌ Reject

                    </button>

                </div>

            </form>

        </div>

        <!-- Feedback History -->
        <div class="card">

            <h3 class="section-title">
                Feedback History
            </h3>

            <div class="feedback-history"
            id="feedbackHistory">

                <div class="feedback-item">

                    <p>
                        <strong>Supervisor:</strong>

                        Ensure your dataset is
                        anonymized before model training.

                    </p>

                    <p class="timestamp">
                        ⏰ Oct 28, 2025 - 3:45 PM
                    </p>

                </div>

                <div class="feedback-item">

                    <p>
                        <strong>Supervisor:</strong>

                        Add a clear methodology
                        section in your proposal document.

                    </p>

                    <p class="timestamp">
                        ⏰ Nov 1, 2025 - 10:12 AM
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

<footer>

© <?php echo date("Y"); ?>
EduPro Hub | Project Review Portal

</footer>

<script>

// Toggle sidebar
function toggleSidebar(){

    document
    .getElementById("sidebar")
    .classList
    .toggle("open");
}

// Handle approval/rejection
function handleDecision(status){

    const comment =
    document.getElementById('comment')
    .value
    .trim();

    if(comment === ""){

        alert(
        "Please write feedback before submitting."
        );

        return;
    }

    alert(
    "Project has been " +
    status +
    " successfully!"
    );

    const feedbackHistory =
    document.getElementById(
    'feedbackHistory'
    );

    const newFeedback =
    document.createElement('div');

    newFeedback.classList.add(
    'feedback-item'
    );

    const now = new Date();

    const timestamp =
    now.toLocaleString();

    newFeedback.innerHTML = `

        <p>
            <strong>Supervisor:</strong>
            ${comment}
        </p>

        <p class="timestamp">
            ⏰ ${timestamp}
        </p>

        <p>
            <em>Status: ${status}</em>
        </p>

    `;

    feedbackHistory.prepend(
    newFeedback
    );

    document.getElementById(
    'comment'
    ).value = "";
}

</script>

</body>
</html>