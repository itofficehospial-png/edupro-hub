<?php
session_start();

// Database Connection
$conn = mysqli_connect("localhost", "root", "", "RegistrationDB");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Registration
if (isset($_POST['register'])) {

    $Name = mysqli_real_escape_string($conn, $_POST['Name']);
    $Email = mysqli_real_escape_string($conn, $_POST['Email']);
    $Password = password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $Role = mysqli_real_escape_string($conn, $_POST['Role']);

    // Check if email already exists
    $check = mysqli_query($conn, "SELECT * FROM register WHERE Email='$Email'");

    if (mysqli_num_rows($check) > 0) {

        echo "<script>
                alert('Email already exists!');
              </script>";

    } else {

        $sql = "INSERT INTO register (Name, Email, Password, Role)
                VALUES ('$Name','$Email','$Password','$Role')";

        if (mysqli_query($conn, $sql)) {

            echo "<script>
                    alert('Registration Successful!');
                    window.location='Home.php';
                  </script>";

        } else {

            echo "<script>
                    alert('Registration Failed: ".mysqli_error($conn)."');
                  </script>";
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>EduPro Hub Registration</title>

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

backdrop-filter:blur(10px);

box-shadow:
0 10px 40px rgba(0,0,0,0.3);

}

.logo{

text-align:center;
font-size:32px;
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
color:#666;
font-size:14px;
margin-bottom:25px;

}

form{

display:flex;
flex-direction:column;

}

label{

font-weight:600;
margin-bottom:6px;
color:#444;

}

input,select{

padding:13px;
margin-bottom:18px;
border-radius:10px;
border:1px solid #ddd;
outline:none;
font-size:15px;
transition:0.3s;

}

input:focus,
select:focus{

border-color:#00609b;
box-shadow:0 0 8px rgba(0,96,155,0.3);

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

.footer{

margin-top:20px;
text-align:center;
font-size:14px;
color:#666;

}

.footer a{

text-decoration:none;
color:#00609b;
font-weight:bold;

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

<h2>Create Account</h2>

<div class="info">
Register once and get started immediately
</div>

<form method="POST">

<label>Name</label>

<input
type="text"
name="Name"
placeholder="Enter Full Name"
required>

<label>Email</label>

<input
type="Email"
name="Email"
placeholder="Enter Email"
required>

<label>Password</label>

<input
type="password"
name="Password"
placeholder="Enter Password"
required>

<label>Role</label>

<select name="Role" required>

<option value="">Role</option>

<option value="Student">
Student
</option>

<option value="Supervisor">
Supervisor
</option>

<option value="Admin">
Admin
</option>

</select>

<button type="submit" name="register">
Register
</button>

</form>

<div class="footer">

Already registered?
<a href="Home.php">
Get Started
</a>

</div>

</div>

</body>
</html>