<?php
include '../dp.php';
$sql = "SELECT * FROM products";
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
<title>View Products</title>

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

img{
    width: 60px;
    height: 60px;
    object-fit: cover;
}
ul li{
    list-style: none;
}
ul li a{
    text-decoration: none;
    font-size: larger;
    color: black;
}
.update{
    text-decoration: none;
    color: green;
}
.delete{
    text-decoration: none;
    color: red;
}
ul li{
    background-color: green;
    width: fit-content;
    padding: 6px;
    border-radius: 8px;
}
</style>

</head>
<body>

<h2 style="text-align:center;">Product List</h2>

<table border="1">
<tr>
<th>Name</th>
<th>Description</th>
<th>Price</th>
<th>Stock</th>
<th>Image</th>
<th>Category Name</th>
<th>Update</th>
<th>Delete</th>
</tr>
<ul>
    <li><a href="logout.php">Logout</a></li>
</ul>
<?php while($row = mysqli_fetch_assoc($result)) { ?>
<tr>
<td><?php echo htmlspecialchars($row['Name'] ); ?></td>
<td><?php echo htmlspecialchars($row['Description']); ?></td>
<td><?php echo $row['Price']; ?></td>
<td><?php echo $row['Stock']; ?></td>
<td>
<?php if(!empty($row['Image'])) { ?>
    <img src="../images/<?php echo $row['Image']; ?>">
<?php } else { echo "No Image"; } ?>
</td>
<td><?php echo htmlspecialchars($row['Category_name']); ?></td>
<td><a class="update" href="updateitems.php?product_id=<?php echo $row['Id']?>">Update</a></td>
<td><a class="delete" href="deleteitems.php?product_id=<?php echo $row['Id'] ?>">Delete</a></td>
</tr>
<?php } ?>
</table>
</body>
</html>