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
    <title>Mr.Montir</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- owl carousel css file cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
    <style>
  .pull-left {
    margin: 5px; 
  }

  #cart {
    height: auto;
    overflow: hidden; /* Ensures the content is contained within the div */
}

</style>
 
</head>
<body>

<!-- header section starts  -->

<header>

<div class="header-1">

    <a href="index.php" class="logo" > <img src="website/all/Mr.svg" alt="Logo image" class="hidden-xs">  </a>
                               
<div class="col-md-6 offer">
    <a href="#" class="btn btn-sucess btn-sm">
           <?php

        if (!isset($_SESSION['customer_email'])){
        echo "Welcome Guest";
      }else{
      echo "Welcome: " .$_SESSION['customer_name'] . "";
    }


        ?>
    </a>
<a id="pr" href="#"> Shopping Cart Total Price: Rp <?php totalPrice(); ?>, Total Items <?php item(); ?></a>
</div>
  
</div>

<div class="header-2">
   

<nav class="navbar"> 


     <ul >
       
            <li><a  href="index.php">HOME</a></li>
            <li><a href="shop.php">SHOP</a></li>
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
                   

                   <li>
                   <a  href="customer_registration.php"><i class="fa fa-user-plus"></i>Register</a></li>
                   <li>
                   <?php

                    if (!isset($_SESSION['customer_email'])){
                    echo "<a href='checkout.php'>My Account</a>";

                         } else{
                    
                    echo "<a href='customer/my_account.php?my_order'>My Account</a>";
                
                         }

                    ?></li> 
                     
                   <li>
                   <a class="active" href="cart.php"><i class="fa fa-shopping-cart"></i>Goto Cart</a></li>
                    
                   <li>
                     <?php

                    if (!isset($_SESSION['customer_email'])){
                    echo "<a href='checkout.php'>Login</a>";

                         } else{
                    
                    echo "<a href='logout.php'>Logout</a>";
                
                         }

                    ?></li>
             </ul>
       </div>
</ul>



</nav></div></header>
<section class="content" id="content">
  <div class="container">
    <div class="col-md-12">
      <ul class="breadcrumb">
     
        <li><span>Cart</span></li>
        

      </ul>

    </div>
</div></section>  

 
 <div class="col-md-9" id="cart">
   <div class="box">
     <form action="cart.php" method="post" enctype="multipart-form-data">
       <h1>Shopping Cart</h1>
       <?php
       $ip_add=getUserIp();
       $select_cart="select * from cart where ip_add='$ip_add'";
       $run_cart=mysqli_query($con,$select_cart);
       $count=mysqli_num_rows($run_cart);



        ?>
       <p class="text-muted">Currently you have <?php echo $count ?> items in your cart</p>
       <div class="table-respon"></div>
       <table class="table">
         <thead>
           <tr>
             <th colspan="2">Product</th>
             <th>Quantity</th>
             <th>Unit Price</th>
             <th>Delivery</th>
             <th colspan="1">Delete</th>
             <th colspan="1">Sub Total</th>
           </tr>
         </thead>
         <tbody>
          <?php
          $total=0;
          while ($row=mysqli_fetch_array($run_cart)) {
            $pro_id=$row['p_id'];
            $pro_size=$row['size'];
            $pro_qty=$row['qty'];
            $get_product="select * from products where product_id='$pro_id'";
            $run_pro=mysqli_query($con,$get_product);
            while ($row=mysqli_fetch_array($run_pro)) {
              $p_title=$row['product_title'];
              $p_img1=$row['product_img1'];
              $p_price=$row['product_price'];
              $sub_total=$row['product_price']*$pro_qty;
              $total += $sub_total; 

           

            ?>
           <tr>
             <td><img src="admin_area/product_images/<?php echo $p_img1 ?>"></td>
             <td><?php echo $p_title ?></td>
             <td><?php echo $pro_qty ?></td>
             <td>Rp <?php echo $p_price ?></td>
             <td><?php echo $pro_size ?></td>
             <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id ?>"></td>
             <td>Rp <?php echo $sub_total ?></td>
           </tr>
           <?php } } ?>
        </tfoot>
       </table>
<div class="box-footer">
         <div class="pull-left">
          <h4>Total Price</h4>
         </div>
         <div class="pull-right">
           <h4>Rp <?php echo $total + $total * 0.005; ?></h4>
         </div>
       </div>


       <div class="box-footer">
         <div class="pull-left">
           <a href="index.php" class="btn btn-default">
             <i class="fa fa-chevron-left"></i>Continue Shopping
           </a>
         </div>
         <div class="pull-right">
           <button class="btn btn-default" type="submit" name="update" value="update cart">
             <i class="fa fa-refresh">Delete Cart</i>
           </button>
           <?php if (item1() > 0): ?>
    <a href="checkout.php" class="btn btn-primary">
        Proceed to Checkout <i class="fa fa-chevron-right"></i>
    </a>
<?php else: ?>
    <a href="#" class="btn btn-primary disabled" onclick="alert('Keranjang Anda masih kosong, tolong masukkan produk ke dalam keranjang terlebih dahulu.'); return false;">
        Proceed to Checkout <i class="fa fa-chevron-right"></i>
    </a>
<?php endif; ?>
         </div>
       </div>
     </form>
   </div>

<?php

function update_cart(){
  global $con;
  if (isset($_POST['update'])){
    foreach ($_POST['remove'] as $remove_id) {
      $delete_product="delete from cart where p_id='$remove_id'";
      $run_del=mysqli_query($con,$delete_product);
      if ($run_del) {
        echo "<script>window.open('cart.php','_self')</script>";
      }

    }
  }
}
echo @$up_cart=update_cart();
  ?>

 </div>
 <div class="col-m-3">
   <div class="box" id="order-summary">
     <div class="box-header">
       <h3>Ringkasan Pesanan</h3>
     </div>
     <p class="text-muted">     
      Pengiriman dan biaya tambahan dihitung berdasarkan nilai yang Anda masukkan
     </p>
     <div class="table-responsive">
       <table class="table">
         <tr>
           <td>Pesanan Sub Total</td>
           <th>Rp <?php echo $total ?></th>
         </tr>
         <tr>
           <tr>
             <td>Pajak</td>
             <td>Rp <?php echo $total * 0.005; ?></td>
           </tr>
           <tr class="Total">
            <td>Total</td>
            <th>Rp <?php echo $total + $total * 0.005?></th>
           </tr>
         </tr>
       </table>
     </div>
   </div>
 </div>
 

     <!-- footer section starts  -->
   <?php
      include("includes/footer.php");  
      ?>
<!-- footer section   -->
