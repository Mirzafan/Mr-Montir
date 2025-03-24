<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results | Mr.Montir</title>
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <style>
.container {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
}

.box {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.results-title {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
    text-align: center;
}

.product-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.product-card {
    background: #f9f9f9;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    text-align: center;
    width: 250px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.product-card img {
    max-width: 100%;
    height: auto;
}

.product-info {
    padding: 15px;
}

.product-info h3 {
    font-size: 18px;
    margin: 10px 0;
}

.product-info .price {
    color: #007bff;
    font-size: 16px;
    margin: 10px 0;
}

.product-info .btn {
    display: inline-block;
    padding: 10px 15px;
    font-size: 14px;
    background: #007bff;
    color: white;
    text-decoration: none;
    border-radius: 5px;
    margin-top: 10px;
}

.no-results {
    text-align: center;
    color: #999;
    font-size: 18px;

    
}

    </style>
</head>
<body>
<header>
    <div class="header-1">
        <a href="index.php" class="logo">
            <img src="website/all/Mr.svg" alt="Logo image" class="hidden-xs">
        </a>
        <div class="col-md-6 offer">
            <a href="#" class="btn btn-success btn-sm">
                <?php
                if (!isset($_SESSION['customer_email'])) {
                    echo "Welcome Guest";
                } else {
                    echo "Welcome: " . $_SESSION['customer_name'];
                }
                ?>
            </a>
            <a id="pr" href="#">Shopping Cart Total Price: Rp <?php totalPrice(); ?>, Total Items <?php item(); ?></a>
        </div>
    </div>
    <div class="header-2">
        <nav class="navbar">
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a class="active" href="shop.php">SHOP</a></li>
                <li><a href="contactus.php">CONTACT</a></li>
                <div class="col-md-6">
                    <ul class="menu">
                        <li>
                            <div class="collapse clearfix" id="search">
                                <form class="navbar-form" method="get" action="result.php">
                                    <div class="input-group">
                                        <input type="text" name="user_query" placeholder="search" class="form-control" required="">
                                        <button type="submit" value="search" name="search" class="btn btn-primary">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li>
                            <a href="cart.php" class="">
                                <i class="fa fa-shopping-cart"></i>
                                <span><?php item(); ?> items in cart</span>
                            </a>
                        </li>
                        <li><a href="customer_registration.php"><i class="fa fa-user-plus"></i>Register</a></li>
                        <li>
                            <?php
                            if (!isset($_SESSION['customer_email'])) {
                                echo "<a href='checkout.php'>My Account</a>";
                            } else {
                                echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                            }
                            ?>
                        </li>
                        <li><a href="cart.php"><i class="fa fa-shopping-cart"></i>Goto Cart</a></li>
                        <li>
                            <?php
                            if (!isset($_SESSION['customer_email'])) {
                                echo "<a href='checkout.php'>Login</a>";
                            } else {
                                echo "<a href='logout.php'>Logout</a>";
                            }
                            ?>
                        </li>
                    </ul>
                </div>
            </ul>
        </nav>
    </div>
</header>

<main>
    <div class="container">
        <?php
        if (isset($_GET['search'])) {
            $user_query = mysqli_real_escape_string($con, $_GET['user_query']);

            // Query to search products
            $query = "SELECT * FROM products WHERE product_title LIKE '%$user_query%' OR product_desc LIKE '%$user_query%'";
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) > 0) {
                echo "<h1 class='results-title'>Search Results for '<em>" . htmlspecialchars($user_query) . "</em>'</h1>";
                echo "<div class='product-grid'>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $pro_id = $row['product_id'];
                    $pro_title = $row['product_title'];
                    $pro_price = $row['product_price'];
                    $pro_img = $row['product_img1'];

                    echo "
                    <div class='product-card'>
                        <a href='details.php?pro_id=$pro_id'>
                            <img src='admin_area/product_images/$pro_img' alt='$pro_title'>
                        </a>
                        <div class='product-info'>
                            <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                            <p class='price'>IDR $pro_price</p>
                            <a href='details.php?pro_id=$pro_id'> <button class='btn-prim' type='submit'>
                                <i class='fa fa-shopping-cart'></i> Add to Cart
                            </a>
                        </div>
                    </div>";
                }
                echo "</div>";
            } else {
                echo "<h1 class='no-results'>No results found for '<em>" . htmlspecialchars($user_query) . "</em>'</h1>";
            }
        }
        ?>
    </div>
</main>

<?php mysqli_close($con); ?>
</body>
</html>
