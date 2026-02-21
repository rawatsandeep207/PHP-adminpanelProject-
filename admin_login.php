<?php
session_start();
include '../dp.php';
if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    // Correct SQL syntax
    $stmt = $conn->prepare("SELECT * FROM admin WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {

        $admin = $result->fetch_assoc();

        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_email'] = $admin['email'];

        header("Location:admin_dashboard.php");
        exit();

    } else {
        echo "Invalid Admin Email or Password!";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
  /* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

/* Body */
body {
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: linear-gradient(135deg, #667eea, #764ba2);
}

/* Form Box */
form {
    background: #ffffff;
    padding: 35px 40px;
    border-radius: 10px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    width: 350px;
}

/* Heading */
.heading {
    text-align: center;
    margin-bottom: 25px;
    color: #333;
}

/* Form Groups */
form div {
    margin-bottom: 18px;
}

/* Labels */
label {
    display: block;
    margin-bottom: 6px;
    font-weight: bold;
    color: #555;
}

/* Inputs */
input {
    width: 100%;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
    transition: 0.3s ease;
}

/* Input Focus */
input:focus {
    border-color: #667eea;
    outline: none;
    box-shadow: 0 0 5px rgba(102, 126, 234, 0.4);
}

/* Button */
button {
    width: 100%;
    padding: 10px;
    background: #667eea;
    border: none;
    border-radius: 6px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s ease;
}

/* Button Hover */
button:hover {
    background: #5a67d8;
}
  
    </style>
<body>
    <form action="admin_login.php" method="post">
    <h1 class="heading"> Admin Login</h1>
    
<div>
    <label>Email Address</label>
    <input type="text" name='email' placeholder="write your email">
</div>
<div>
<label>Password</label>
    <input type="text" name='password' placeholder="write your password">
</div>
<div>
    <button type="submit" name="login">Login</button>
</div> 
</body>
</html>