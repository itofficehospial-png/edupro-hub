<?php
session_start();

if(!isset($_SESSION['user'])){
    $_SESSION['user'] = "Supervisor";
}

// ----- PHP: Handle chat, schedule, and notes -----
$chatFile = "chat_log.txt";
$notesFile = "supervisor_notes.txt";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Save chat message
    if (isset($_POST['chat_message']) && !empty($_POST['chat_message'])) {

        $sender = $_POST['sender'];
        $message = trim($_POST['chat_message']);
        $time = date("Y-m-d H:i");

        $entry = "[$time] $sender: $message\n";

        file_put_contents($chatFile, $entry, FILE_APPEND);
    }

    // Save notes
    if (isset($_POST['notes'])) {

        $notes = trim($_POST['notes']);

        file_put_contents($notesFile, $notes);
    }

    // Schedule meeting
    if (isset($_POST['meeting_date']) && isset($_POST['meeting_time'])) {

        $date = $_POST['meeting_date'];
        $time = $_POST['meeting_time'];

        $scheduleMsg = "Meeting scheduled for $date at $time";

        file_put_contents($chatFile,
        "[System] $scheduleMsg\n",
        FILE_APPEND);
    }
}

// Load existing chat and notes
$chatContent =
file_exists($chatFile)
? file_get_contents($chatFile)
: "";

$notesContent =
file_exists($notesFile)
? file_get_contents($notesFile)
: "";
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Meetings / Discussion | EduPro Hub</title>

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
    padding:20px;
    box-shadow:0 3px 10px rgba(0,0,0,0.1);
    margin-bottom:20px;
}

.section-title{
    color:#0f766e;
    margin-bottom:15px;
}

/* Chat */
#chatBox{
    height:300px;
    overflow-y:auto;
    border:1px solid #ddd;
    padding:10px;
    border-radius:5px;
    background:#fafafa;
    font-size:14px;
}

/* Form inputs */
input,
textarea{
    width:100%;
    padding:10px;
    margin-top:8px;
    border:1px solid #ccc;
    border-radius:5px;
}

textarea{
    resize:none;
}

/* Buttons */
.btn{
    margin-top:10px;
    background:#0f766e;
    color:white;
    border:none;
    padding:10px 18px;
    border-radius:5px;
    cursor:pointer;
    transition:0.3s;
}

.btn:hover{
    background:#115e59;
}

/* Grid */
.grid{
    display:flex;
    gap:20px;
    flex-wrap:wrap;
}

.left{
    flex:2;
    min-width:400px;
}

.right{
    flex:1;
    min-width:250px;
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

    .grid{
        flex-direction:column;
    }

    .left,
    .right{
        min-width:100%;
    }
}
</style>
</head>

<body>

<!-- Topbar -->
<div class="topbar">

    <div class="menu-btn"
    onclick="toggleSidebar()">☰</div>

    <h2>Meetings / Discussion</h2>

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

        <div class="grid">

            <!-- Chat -->
            <div class="left">

                <div class="card">

                    <h3 class="section-title">
                        💬 Chat Log
                    </h3>

                    <div id="chatBox">

<pre style="white-space:pre-wrap;">
<?php echo htmlspecialchars($chatContent); ?>
</pre>

                    </div>

                    <form method="POST">

                        <input type="text"
                        name="sender"
                        placeholder="Your name"
                        required>

                        <textarea
                        name="chat_message"
                        placeholder="Type your message..."
                        required></textarea>

                        <button type="submit"
                        class="btn">
                            Send Message
                        </button>

                    </form>

                </div>

            </div>

            <!-- Schedule -->
            <div class="right">

                <div class="card">

                    <h3 class="section-title">
                        📅 Schedule Meeting
                    </h3>

                    <form method="POST">

                        <label>
                            Meeting Date
                        </label>

                        <input type="date"
                        name="meeting_date"
                        required>

                        <label>
                            Meeting Time
                        </label>

                        <input type="time"
                        name="meeting_time"
                        required>

                        <button type="submit"
                        class="btn">
                            Schedule
                        </button>

                    </form>

                </div>

            </div>

        </div>

        <!-- Notes -->
        <div class="card">

            <h3 class="section-title">
                📝 Supervisor Notes
            </h3>

            <form method="POST">

                <textarea
                name="notes"
                style="height:150px;">
<?php echo htmlspecialchars($notesContent); ?>
</textarea>

                <button type="submit"
                class="btn">
                    Save Notes
                </button>

            </form>

        </div>

    </div>

</div>

<footer>
© <?php echo date("Y"); ?>
EduPro Hub | Supervisor Meetings
</footer>

<script>

function toggleSidebar(){

    document
    .getElementById("sidebar")
    .classList
    .toggle("open");
}

// Auto scroll chat
let chatBox =
document.getElementById('chatBox');

chatBox.scrollTop =
chatBox.scrollHeight;

</script>

</body>
</html>