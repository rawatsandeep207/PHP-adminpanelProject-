<?php
include '../dp.php';

/* Fetch categories for dropdown */
$cat_sql = "SELECT * FROM category";
$cat_result = mysqli_query($conn, $cat_sql);

if (!$cat_result) {
    die("Category Fetch Error: " . mysqli_error($conn));
}

/* Insert Product */
if(isset($_POST['add_product'])){

    $name = trim($_POST['name']);
    $description = trim($_POST['description']);
    $stock = (int)$_POST['stock'];
    $price = (float)$_POST['price'];
    $category_name = trim($_POST['category_name']);

    $image = "";
    if(isset($_FILES['image']) && $_FILES['image']['error'] == 0){

        $allowed_types = ['image/jpeg','image/png','image/jpg'];
        if(!in_array($_FILES['image']['type'], $allowed_types)){
            die("Only JPG, JPEG & PNG allowed");
        }

        $image = basename($_FILES['image']['name']);
        $tmp_name = $_FILES['image']['tmp_name'];
        $upload_folder = "../images/";
        $upload_path = $upload_folder . $image;

        if(!move_uploaded_file($tmp_name, $upload_path)){
            die("Image Upload Failed");
        }
    }

    $stmt = $conn->prepare("INSERT INTO products 
        (name, description, stock, price, image, category_name) 
        VALUES (?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssidss", $name, $description, $stock, $price, $image, $category_name);

    if($stmt->execute()){
        echo "<script>alert('Product Added Successfully'); window.location='vieworder.php';</script>";
    } else {
        echo "Database Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Product</title>

<style>
body{
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: #f4f6f9;
}

h1{
    text-align: center;
    background: linear-gradient(135deg, #2c3e50, #34495e);
    color: white;
    padding: 18px;
    margin: 0;
}

.form-box{
    width: 450px;
    margin: 40px auto;
    background: #ffffff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
}

.form-group{
    margin-bottom: 18px;
}

label{
    display: block;
    margin-bottom: 6px;
    font-weight: 600;
}

input, select{
    width: 100%;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
}

button{
    width: 100%;
    padding: 12px;
    background: #2ecc71;
    color: white;
    border: none;
    border-radius: 6px;
    font-weight: bold;
    cursor: pointer;
}

button:hover{
    background: #27ae60;
}
ul li a{
text-decoration: none;
color: #2c3e50;
font-size: larger;
}
ul li {
    list-style: none;
display: inline-block;
padding: 10px;
}
.logout{
    background-color: #27ae60;
padding: 5px;
border-radius: 9px;
}
</style>
</head>

<body>
<ul>
    <li><a href="viewusers.php">View Users</a></li>
<li><a href="vieworder.php">View Order</a></li>
            <li><a href="logout.php" class="logout">Logout</a></li>
        </ul>
<h1>Add Product</h1>

<div class="form-box">
<form method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" required>
    </div>

    <div class="form-group">
        <label>Description</label>
        <input type="text" name="description" required>
    </div>

    <div class="form-group">
        <label>Price</label>
        <input type="number" step="0.01" name="price" required>
    </div>

    <div class="form-group">
        <label>Stock</label>
        <input type="number" name="stock" required>
    </div>

    <div class="form-group">
        <label>Upload Image</label>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label>Select Category</label>
     <select name="category_name" required>
    <option value="">Select Category</option>
    <?php while($row = mysqli_fetch_assoc($cat_result)) { ?>
        <option value="<?php echo htmlspecialchars($row['Category_name']); ?>">
            <?php echo htmlspecialchars($row['Category_name']); ?>
        </option>
    <?php } ?>
</select>
   
    </div>

    <button type="submit" name="add_product">Add Product</button>
</form>
</div>
</body>
</html>