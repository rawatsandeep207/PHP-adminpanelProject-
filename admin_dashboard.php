<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
body{
    margin: 0;
    font-family: Arial, Helvetica, sans-serif;
    background-color: #f4f6f9;
}

/* Header */
h1{
    text-align: center;
    background-color: #2c3e50;
    color: white;
    padding: 20px;
    margin: 0;
}

/* Navigation Box */
div{
    width: 300px;
    margin: 40px auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

/* List */
ul{
    list-style: none;
    padding: 0;
}

li{
    margin: 15px 0;
}

/* Links */
a{
    text-decoration: none;
    display: block;
    background-color: #3498db;
    color: white;
    padding: 12px;
    border-radius: 5px;
    text-align: center;
    transition: 0.3s ease;
}

a:hover{
    background-color: #2980b9;
}
</style>
<body>
    <h1>Welcome to Admin dashboard</h1>
    <div>
        <ul>
            <li><a href="addproduct.php">Add Product</a></li>
            <li><a href="vieworder.php">View Order</a></li>
            <li><a href="viewusers.php">View Users</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
    </div>
</body>
</html>