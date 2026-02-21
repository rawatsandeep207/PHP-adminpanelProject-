<?php
include 'dp.php';
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Product List</title>
</head>
<style>
body{
    font-family: Arial, sans-serif;
    background-color: #f4f6f9;
    margin: 0;
    padding: 20px;
}

h1{
    text-align: center;
    color: #333;
}

table{
    width: 90%;
    margin: 20px auto;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

table th{
    background-color: #007bff;
    color: white;
    padding: 12px;
    text-align: center;
}

table td{
    padding: 10px;
    text-align: center;
    border-bottom: 1px solid #ddd;
}

table tr:hover{
    background-color: #f1f1f1;
}

img{
    border-radius: 5px;
}

button{
    padding: 8px 15px;
    background-color: #28a745;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover{
    background-color: #218838;
}
a{
    display: block;
    text-align: center;
    margin-top: 20px;
    text-decoration: none;
    font-weight: bold;
    color: #007bff;
}

a:hover{
    color: #0056b3;
}
</style>
<body>
<h1>Product Added</h1>
<table border="1" width="700">
    <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Stock</th>
    </tr>

<?php while($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td>
            <img src="images/<?php echo $row['Image']; ?>" width="60">
        </td>
        <td><?php echo $row['Name']; ?></td>
        <td><?php echo $row['Description']; ?></td>
        <td><?php echo $row['Price']; ?></td>
        <td><?php echo $row['Stock']; ?></td>
    </tr>
<?php } ?>

</table>

</body>
</html>