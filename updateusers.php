<?php
include 'dp.php';

/* GET USER DATA */
if(isset($_GET['user_id'])){
    $user_id = $_GET['user_id'];

    $sql = "SELECT * FROM users WHERE Id=$user_id";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
}

/* UPDATE USER */
if(isset($_POST['update_user'])){
    $user_id = $_GET['user_id'];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone_no = $_POST['phone_no'];
    $address = $_POST['address'];

    $sql = "UPDATE users SET
                name='$name',
                email='$email',
                password='$password',
                phone_no='$phone_no',
                address='$address',
                role='user'
            WHERE Id=$user_id";

    if(mysqli_query($conn,$sql)){
        header("location:dashboard.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update User</title>

<style>

/* Reset */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: Arial, Helvetica, sans-serif;
}

/* Body */
body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background: linear-gradient(135deg,#667eea,#764ba2);
}

/* Card */
.form-container{
    background:#fff;
    padding:35px 40px;
    width:400px;
    border-radius:12px;
    box-shadow:0 15px 30px rgba(0,0,0,0.2);
}

/* Heading */
.form-container h2{
    text-align:center;
    margin-bottom:25px;
    color:#333;
}

/* Form Group */
.form-group{
    margin-bottom:18px;
}

/* Label */
label{
    display:block;
    font-weight:bold;
    margin-bottom:6px;
    color:#555;
}

/* Input */
input{
    width:100%;
    padding:10px;
    border-radius:6px;
    border:1px solid #ccc;
    font-size:14px;
    transition:0.3s;
}

/* Input Focus */
input:focus{
    border-color:#667eea;
    outline:none;
    box-shadow:0 0 6px rgba(102,126,234,0.4);
}

/* Button */
button{
    width:100%;
    padding:12px;
    background:#667eea;
    border:none;
    border-radius:6px;
    color:#fff;
    font-size:16px;
    cursor:pointer;
    transition:0.3s;
}

/* Button Hover */
button:hover{
    background:#5a67d8;
}

/* Back Link */
.back-link{
    text-align:center;
    margin-bottom:15px;
}

.back-link a{
    text-decoration:none;
    color:#667eea;
    font-weight:bold;
}

.back-link a:hover{
    text-decoration:underline;
}

</style>
</head>

<body>
<div class="form-box">
<form method="post" action="updateusers.php?user_id=<?php echo $user_id; ?>">

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" required 
        value="<?php echo $row['Name']; ?>">
    </div>

    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" required 
        value="<?php echo $row['Email']; ?>">
    </div>

    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" required 
        value="<?php echo $row['Password']; ?>">
    </div>

    <div class="form-group">
        <label>Phone No</label>
        <input type="text" name="phone_no" required 
        value="<?php echo $row['Phone_no']; ?>">
    </div>

    <div class="form-group">
        <label>Address</label>
        <input type="text" name="address" required 
        value="<?php echo $row['Address']; ?>">
    </div>

    <button type="submit" name="update_user">Update User</button>

</form>
</div>
</div>
</div>
</body>
</html>