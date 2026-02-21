<?php
include '../dp.php';

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if(!$result){
    die("Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Users</title>

<style>
body{
    font-family: Arial, sans-serif;
    background:#f4f6f9;
}

table{
    border-collapse: collapse;
    width: 90%;
    margin: 40px auto;
    background: white;
}

th{
    background: #2c3e50;
    color: white;
    padding: 10px;
}

td{
    padding: 10px;
    text-align: center;
}

tr:nth-child(even){
    background: #f2f2f2;
}
</style>
</head>

<body>

<h2 style="text-align:center;">User List</h2>

<table border="1">
<tr>
<th>Name</th>
<th>Email</th>
<th>Password</th>
<th>Phone_no</th>
<th>Address</th>
<th>Role</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?php echo htmlspecialchars($row['Name']); ?></td>
<td><?php echo htmlspecialchars($row['Email']); ?></td>
<td><?php echo htmlspecialchars($row['Password']); ?></td>
<td><?php echo htmlspecialchars($row['Phone_no']); ?></td>
<td><?php echo htmlspecialchars($row['Address']); ?></td>
<td><?php echo htmlspecialchars($row['Role']); ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>
