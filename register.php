<?php
include 'dp.php';
if (isset($_POST['register'])) {
    $username     = trim($_POST['name']);
    $email        = trim($_POST['email']);
    $password     = trim($_POST['password']);
    $phone_number = trim($_POST['phone_no'] ?? '');
    $address      = trim($_POST['address']);
    $role         = 'user';   // default role

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (empty($username) || empty($email) || empty($password)) {
        die("All required fields must be filled!");
    }

    // ✅ Check if email already exists
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        die("Email already registered!");
    }
    $check->close();

    // ✅ Insert with role column
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, phone_no, address, role) VALUES (?, ?, ?, ?, ?, ?)");

    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("ssssss", $username, $email, $password, $phone_number, $address, $role);

    if ($stmt->execute()) {
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
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

/* Body Styling */


/* Form Container */
form {
    background-color: #ffffff;
    padding: 30px 40px;
    border-radius: 10px;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    width: 350px;
    height: 520px;
margin-left: 450px;
}

/* Heading */
.heading {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

/* Form Groups */
form div {
    margin-bottom: 15px;
}

/* Labels */
label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}

/* Inputs */
input {
    width: 100%;
    padding: 8px 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
    transition: 0.3s ease;
}

/* Input Focus Effect */
input:focus {
    border-color: #4CAF50;
    outline: none;
    box-shadow: 0 0 5px rgba(76, 175, 80, 0.4);
}

/* Button */
button {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    border: none;
    border-radius: 5px;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: 0.3s ease;
}

/* Button Hover */
button:hover {
    background-color: #45a049;
}
.home-link {
    margin-bottom: 20px;
    text-align: center;
}

.home-link a {
    text-decoration: none;
    background-color: #667eea;
    color: white;
    padding: 8px 15px;
    border-radius: 5px;
    font-weight: bold;
    transition: 0.3s ease;
    margin-right: 1150px;
    margin-bottom: 10px;
}

.home-link a:hover {
    background-color: #5a67d8;
}

   
    </style>
<body>
       <div class="home-link">
<a href="index.php">Home</a>
</div>

  
    <form action="register.php" method="post">
   
<h1 class="heading">Register</h1>
    <div>
    <label>Username</label>
    <input type="text" name='name' placeholder="write your name">
</div>
<div>
    <label>Email Address</label>
    <input type="text" name='email' placeholder="write your email">
</div>
<div>
<label>Password</label>
    <input type="text" name='password' placeholder="write your password">
</div>
<div>
    <label>Phone Number</label>
    <input type="text" name='phone_no' placeholder="write your phone number"> 
</div>
<div>
    <label>Address</label>
    <input type="text" name='address' placeholder="write your address"> 
</div>
<div>
    <button type="submit" name="register">Register</button>
</div> 
</form>   
</body>
</html>