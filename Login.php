<?php
session_start();

// Database connection
$conn = mysqli_connect("localhost", "root", "", "RegistrationDB");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// LOGIN PROCESS
if (isset($_POST['Login'])) {

    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $Password = $_POST['Password'];

    // Use prepared statement (safer)
    $stmt = $conn->prepare("SELECT * FROM register WHERE Email = ?");
    $stmt->bind_param("s", $Email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc();

        // Verify hashed password
        if (password_verify($Password, $user['Password'])) {

            // Store session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['Name'] = $user['Name'];
            $_SESSION['Email'] = $user['Email'];
            $_SESSION['Role'] = $user['Role'];

            // Redirect based on role
            if ($user['Role'] === "Admin") {
                header("Location: AdminD.php");
                exit();

            } elseif ($user['Role'] === "Supervisor") {
                header("Location: SupDashboard.php");
                exit();

            } elseif ($user['Role'] === "Student") {
                header("Location: StdDashboard.php");
                exit();

            } else {
                echo "<script>alert('Unknown role');</script>";
            }

        } else {
            echo "<script>alert('Incorrect Password');</script>";
        }

    } else {
        echo "<script>alert('User not found');</script>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>EduPro Hub Login</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',Tahoma,Geneva,Verdana,sans-serif;
}

body{

min-height:100vh;
display:flex;
justify-content:center;
align-items:center;

background:url('https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1470&q=80');

background-size:cover;
background-position:center;

}

.container{

width:420px;
padding:35px;

background:rgba(255,255,255,0.95);

border-radius:20px;

backdrop-filter:blur(15px);

box-shadow:
0 10px 40px rgba(0,0,0,.3);

}

.logo{

text-align:center;
font-size:35px;
font-weight:bold;
color:#00609b;

margin-bottom:10px;

}

h2{

text-align:center;
margin-bottom:8px;
color:#333;

}

.info{

text-align:center;
font-size:14px;
color:#666;
margin-bottom:25px;

}

form{

display:flex;
flex-direction:column;

}

label{

font-weight:600;
margin-bottom:8px;
color:#444;

}

input{

padding:14px;
margin-bottom:18px;

border:1px solid #ddd;

border-radius:10px;

outline:none;

font-size:15px;

transition:0.3s;

}

input:focus{

border-color:#00609b;

box-shadow:
0 0 10px rgba(0,96,155,.3);

}

button{

padding:14px;

border:none;

border-radius:10px;

background:#00609b;

color:white;

font-size:16px;

font-weight:bold;

cursor:pointer;

transition:0.3s;

}

button:hover{

background:#004d80;

transform:translateY(-2px);

}

.links{

display:flex;
justify-content:space-between;

margin-top:18px;

font-size:14px;

}

.links a{

text-decoration:none;
color:#00609b;
font-weight:bold;

}

.footer{

margin-top:25px;
text-align:center;
color:#666;
font-size:14px;

}

.footer a{

text-decoration:none;
font-weight:bold;
color:#00609b;

}

@media(max-width:500px){

.container{

width:90%;
padding:25px;

}

}

</style>

</head>

<body>

<div class="container">

<div class="logo">
EduPro Hub
</div>

<h2>Welcome Back</h2>

<div class="info">
Login using your registered account
</div>


<form method="POST">

<label>Email</label>

<input
type="email"
name="Email"
placeholder="Enter your email"
required>


<label>Password</label>

<input
type="password"
name="Password"
placeholder="Enter your password"
required>


<button
type="submit"
name="Login">

Login

</button>

</form>


<div class="links">

<a href="#">
Forgot Password?
</a>

<a href="Registration.php">
Register
</a>

</div>

<div class="footer">

Students • Supervisors • Admins

</div>

</div>

</body>
</html>
```
