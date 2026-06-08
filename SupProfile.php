<?php
session_start();

if(!isset($_SESSION['user'])){
    $_SESSION['user'] = "Supervisor";
}

// === Simulate Supervisor Data ===
$supervisor = [

    "name" =>
    "Dr. Jane Atwine",

    "email" =>
    "jane.atwine@eduprohub.ac.ug",

    "department" =>
    "Computer Science and Information Technology",

    "photo" =>
    "https://via.placeholder.com/150",

    "notification_pref" =>
    "Email and Dashboard"
];
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>
Supervisor Profile | EduPro Hub
</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Segoe UI',Tahoma,sans-serif;
    background:#f4f6fa;
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

/* Profile card */
.profile-card{
    background:#fff;
    border-radius:12px;
    box-shadow:0 5px 20px rgba(0,0,0,0.1);
    padding:30px 40px;
}

/* Title */
.section-title{
    color:#2b3e50;
    margin-bottom:30px;
}

/* Profile header */
.profile-header{
    display:flex;
    align-items:center;
    gap:25px;
    border-bottom:2px solid #eef2f7;
    padding-bottom:20px;
    flex-wrap:wrap;
}

.profile-header img{
    width:140px;
    height:140px;
    border-radius:50%;
    border:4px solid #0078d7;
    object-fit:cover;
}

.profile-info h3{
    color:#0078d7;
    margin-bottom:10px;
}

.profile-info p{
    margin:6px 0;
    color:#555;
}

/* Sections */
.section{
    margin-top:30px;
}

.section h4{
    color:#2b3e50;
    border-left:5px solid #0078d7;
    padding-left:10px;
    margin-bottom:20px;
}

/* Form */
.form-group{
    margin-bottom:18px;
}

label{
    display:block;
    margin-bottom:6px;
    font-weight:500;
    color:#333;
}

input[type="text"],
input[type="email"],
input[type="password"],
select{
    width:100%;
    padding:10px;
    border-radius:6px;
    border:1px solid #ccc;
    font-size:15px;
}

/* Button */
.save-btn{
    background:#0078d7;
    color:white;
    border:none;
    border-radius:8px;
    padding:12px 25px;
    font-size:15px;
    cursor:pointer;
    transition:0.3s;
}

.save-btn:hover{
    background:#005ea6;
}

/* Success message */
.success-msg{
    background:#d4edda;
    color:#155724;
    border:1px solid #c3e6cb;
    padding:12px 15px;
    border-radius:6px;
    margin-top:20px;
    display:none;
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

    .profile-header{
        flex-direction:column;
        text-align:center;
    }

    .profile-card{
        padding:20px;
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
        Supervisor Profile
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

        <div class="profile-card">

            <h2 class="section-title">
                👩‍🏫 Supervisor Profile
            </h2>

            <!-- Profile header -->
            <div class="profile-header">

                <img
                src="<?php
                echo $supervisor['photo'];
                ?>"

                alt="Supervisor Photo">

                <div class="profile-info">

                    <h3>

                        <?php
                        echo htmlspecialchars(
                        $supervisor['name']
                        );
                        ?>

                    </h3>

                    <p>

                        <strong>
                            Department:
                        </strong>

                        <?php
                        echo htmlspecialchars(
                        $supervisor['department']
                        );
                        ?>

                    </p>

                    <p>

                        <strong>
                            Email:
                        </strong>

                        <?php
                        echo htmlspecialchars(
                        $supervisor['email']
                        );
                        ?>

                    </p>

                </div>

            </div>

            <!-- Success Message -->
            <div id="messageBox"
            class="success-msg">

                Profile updated successfully!

            </div>

            <!-- Preferences -->
            <div class="section">

                <h4>
                    Preferences
                </h4>

                <form
                id="profileForm"

                onsubmit=
                "return updateProfile(event)">

                    <div class="form-group">

                        <label for="notify">
                            Notification Type
                        </label>

                        <select id="notify">

                            <option>
                                Email only
                            </option>

                            <option>
                                Dashboard only
                            </option>

                            <option selected>

                                <?php
                                echo htmlspecialchars(
                                $supervisor['notification_pref']
                                );
                                ?>

                            </option>

                        </select>

                    </div>

                    <div class="form-group">

                        <label for="password">
                            Change Password
                        </label>

                        <input type="password"

                        id="password"

                        placeholder=
                        "Enter new password">

                    </div>

                    <div class="form-group">

                        <label for="confirm">
                            Confirm Password
                        </label>

                        <input type="password"

                        id="confirm"

                        placeholder=
                        "Re-enter new password">

                    </div>

                    <button type="submit"
                    class="save-btn">

                        Save Changes

                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

<footer>

© <?php echo date("Y"); ?>
EduPro Hub | Supervisor Profile

</footer>

<script>

// Toggle sidebar
function toggleSidebar(){

    document
    .getElementById("sidebar")
    .classList
    .toggle("open");
}

// Update profile
function updateProfile(e){

    e.preventDefault();

    const password =
    document.getElementById(
    "password"
    ).value;

    const confirm =
    document.getElementById(
    "confirm"
    ).value;

    const msg =
    document.getElementById(
    "messageBox"
    );

    if(
    password &&
    password !== confirm
    ){

        alert(
        "Passwords do not match!"
        );

        return false;
    }

    // Simulate saving
    msg.style.display = "block";

    msg.textContent =
    "Profile updated successfully!";

    setTimeout(() => {

        msg.style.display = "none";

    }, 3000);

    document
    .getElementById(
    "password"
    ).value = "";

    document
    .getElementById(
    "confirm"
    ).value = "";

    return false;
}

</script>

</body>
</html>