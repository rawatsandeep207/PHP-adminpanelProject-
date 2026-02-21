<?php
include 'dp.php';
$sql="select * from users";
$result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>
<style>
body{
    font-family: Arial, Helvetica, sans-serif;
    background: #f4f6f9;
    margin: 0;
    padding: 0;
}

/* Heading */
h1{
    text-align: center;
    padding: 20px;
    background: #2c3e50;
    color: white;
    margin: 0;
}

/* Table Styling */
table{
    width: 90%;
    margin: 30px auto;
    border-collapse: collapse;
    background: white;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

/* Table Header */
th{
    background: #34495e;
    color: white;
    padding: 12px;
    text-transform: uppercase;
    font-size: 14px;
}

/* Table Cells */
td{
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

/* Hover Effect */
tr:hover{
    background: #f1f1f1;
}

/* Responsive */
@media (max-width: 768px){
    table{
        width: 100%;
        font-size: 12px;
    }
    th, td{
        padding: 8px;
    }
}
.update{
    text-decoration: none;
    font-size: medium;
    color:green;
    margin: 6px;
}

.delete{
    text-decoration: none;
    font-size:medium;
    color: red;
}
</style>
<body>
<h1>Welcome to dashboard</h1>
<table>
<tr>
<td>Name</td>
<td>Email</td>
<td>Password</td>
<td>Phone_no</td>
<td>Address</td>
<td>Role</td>
<td>Action</td>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){?>
<tr>
<td><?php echo $row ['Name']?></td>
<td><?php echo $row ['Email']?></td>
<td><?php echo $row ['Password']?></td>
<td><?php echo $row ['Phone_no']?></td>
<td><?php echo $row ['Address']?></td>
<td><?php echo $row ['Role']?></td>
<td><a class="update" href="updateusers.php?user_id=<?php echo $row['Id']?>">Update</a>
<a class="delete" href="deleteusers.php?user_id=<?php echo $row['Id'] ?>">Delete</a></td>

</tr>
<?php
}
?>
</table>
</body>
</html>