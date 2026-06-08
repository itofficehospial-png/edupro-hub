<?php
session_start();

/* ==========================
   DATABASE CONNECTION
========================== */
$conn = new mysqli("localhost", "root", "", "admin");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

/* ==========================
   ADD USER
========================== */
$message = "";

if(isset($_POST['save_user'])){

    $fullname = trim($_POST['fullname']);
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $role     = trim($_POST['role']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO users (Name, Username, Email, Role, Password) VALUES(?,?,?,?,?)");
    $stmt->bind_param("sssss", $Name, $Username, $Email, $Role, $Password);

    if($stmt->execute()){
        $message = "User added successfully!";
    } else {
        $message = "Error adding user.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add User</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    background:linear-gradient(135deg,#1e3c72,#2a5298);
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    padding:20px;
}

.form-container{
    width:100%;
    max-width:550px;
    background:#fff;
    padding:35px;
    border-radius:15px;
    box-shadow:0 10px 30px rgba(0,0,0,.2);
}

.form-container h2{
    text-align:center;
    color:#1e3c72;
    margin-bottom:25px;
}

.form-group{
    margin-bottom:18px;
}

.form-group label{
    display:block;
    margin-bottom:6px;
    font-weight:600;
    color:#333;
}

.form-group input,
.form-group select{
    width:100%;
    padding:12px;
    border:1px solid #ccc;
    border-radius:8px;
    outline:none;
    transition:0.3s;
}

.form-group input:focus,
.form-group select:focus{
    border-color:#1e3c72;
}

.btn{
    width:100%;
    padding:14px;
    border:none;
    border-radius:8px;
    background:#1e3c72;
    color:white;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

.btn:hover{
    background:#16315d;
}

.success{
    background:#d4edda;
    color:#155724;
    padding:12px;
    border-radius:8px;
    margin-bottom:15px;
    text-align:center;
}

</style>
</head>
<body>

<div class="form-container">

    <h2>Add New User</h2>

    <?php if(!empty($message)){ ?>
        <div class="success">
            <?php echo $message; ?>
        </div>
    <?php } ?>

    <form id="userForm" method="POST">

        <div class="form-group">
            <label>Full Name</label>
            <input type="text" name="fullname" required>
        </div>

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" required>
        </div>

        <div class="form-group">
            <label>Email Address</label>
            <input type="email" name="email" required>
        </div>

        <div class="form-group">
            <label>User Role</label>
            <select name="role" required>
                <option value="">Select Role</option>
                <option>Administrator</option>
                <option>Teacher</option>
                <option>Student</option>
                <option>Supervisor</option>
                <option>Staff</option>
            </select>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <button type="submit" name="save_user" class="btn">
            Save User
        </button>

    </form>

</div>

<script>

document.getElementById("userForm").addEventListener("submit", function(e){

    let password = document.querySelector("input[name='password']").value;

    if(password.length < 6){
        alert("Password must be at least 6 characters long.");
        e.preventDefault();
    }

});

</script>

</body>
</html>