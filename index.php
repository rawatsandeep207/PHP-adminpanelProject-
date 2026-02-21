<?php
include 'dp.php';
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!DOCTYPE html>
<html>
<head>
    <style>
      /* GENERAL */
body {
    background-color: #f8f9fa;
    font-family: Arial, sans-serif;
}

/* ================= NAVBAR ================= */
.navbar {
    background: linear-gradient(45deg, #0d6efd, #0a58ca);
    padding: 12px 0;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.navbar-brand {
    font-size: 24px;
    font-weight: bold;
    color: #ffffff !important;
}

.navbar .nav-link {
    color: #ffffff !important;
    font-weight: 500;
    margin-left: 15px;
    transition: 0.3s;
}

.navbar .nav-link:hover {
    color: #ffd700 !important;
    transform: translateY(-2px);
}

/* ================= PRODUCT CARD ================= */
.product-card {
    background: #ffffff;
    border: none;
    padding: 20px;
    margin: 20px 0;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    transition: 0.3s;
}

.product-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.product-card img {
    height: 180px;
    object-fit: cover;
    border-radius: 8px;
}

.product-card h5 {
    margin-top: 10px;
    font-weight: 600;
}

.product-card p {
    font-size: 14px;
    margin-bottom: 6px;
}

/* ================= FOOTER ================= */
.footer {
    background: #0d6efd;
    color: #ffffff;
    padding: 40px 0 20px 0;
    margin-top: 60px;
}

.footer p {
    margin-bottom: 5px;
}

.footer hr {
    background: #ffffff;
    opacity: 0.2;
}  
</style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="#">Shop</a>
  </div>
  <div class="container">
    <a class="navbar-brand" href="register.php">Signup</a>
  </div>
  <div class="container">
    <a class="navbar-brand" href="login.php">Login</a>
  </div>
  <div class="container">
    <a class="navbar-brand" href="./admin/admin_login.php">Admin Login</a>
  </div>
</nav>

<!-- PRODUCTS -->
<div class="container mt-4">
    <div class="row">

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
        
        <div class="col-md-4">
            <div class="product-card">
                <img src="images/<?php echo $row['Image']; ?>" class="img-fluid mb-2">
                <h5>Name: <?php echo $row['Name']; ?></h5>
                <p>Description: <?php echo $row['Description']; ?></p>
                <p>₹ <?php echo $row['Price']; ?></strong></p>
                <p>Stock: <?php echo $row['Stock']; ?></p>
            </div>
        </div>

    <?php } ?>

    </div>
</div>

<!-- FOOTER -->
<footer class="footer text-center">
    <div class="container">
        <p>© 2026 Shop. All Rights Reserved.</p>
    </div>
</footer>

</body>
</html>