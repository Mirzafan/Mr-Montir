<?php 
session_start();
if (!isset($_SESSION['customer_email'])) {
  echo "<script>window.open('../checkout.php','_self')</script>";
}else{

include("../includes/db.php");  
include("../functions/functions.php");
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
    <link rel="stylesheet" href="../style.css">

<style>
.footer {
    background-color: ; /* Warna latar belakang */
    color: #fff; /* Warna teks */
    padding: 20px 0; /* Jarak vertikal */
    width: 2000px; /* Pastikan footer penuh */
    text-align: center; /* Pusatkan teks */
}

.footer .container {
    max-width: 3000px; /* Atur lebar maksimum konten */
    margin: 0 auto; /* Pusatkan konten di tengah */
}

.footer .social-links a {
    margin: 0 10px;
    text-decoration: none; /* Hapus garis bawah pada tautan */
}

.footer .social-links i {
    font-size: 24px; /* Ukuran ikon */
}

.content1 {
  height: auto;
}
</style>

</head>
<body>
  

<!-- header section starts  -->

<header>

<div class="header-1">

    <a href="../index.php" class="logo" > <img src="../website/all/Mr.svg" alt="Logo image" class="hidden-xs">  </a>
                               
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
       
            <li><a  href="../index.php">HOME</a></li>
            <li><a  href="../shop.php">SHOP</a></li>
        
            <li><a href="../contactus.php">CONTACT</a></li>
         
 
       <div class="col-md-6">
        <ul class="menu">
            <li>
                         <div class="collapse clearfix" id="search">
                             <form class="navbar-form" method="get" action="../result.php">
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
                  <a href="../cart.php" class="">
                    <i class="fa fa-shopping-cart"></i>
                      <span><?php item(); ?> items in cart</span>
                        </a>
                </li>
                   

                   <li>
                   <a  href="../customer_registration.php"><i class="fa fa-user-plus"></i>Register</a></li>
                   <li>
                   <?php

                    if (!isset($_SESSION['customer_email'])){
                    echo "<a href='checkout.php'>My Account</a>";

                         } else{
                    
                    echo "<a href='#' class='active'>My Account</a>";
                
                         }

                    ?></li> 
                     
                   <li>
                   <a href="../cart.php"><i class="fa fa-shopping-cart"></i>Goto Cart</a></li>
                    
                   <li>
                     <?php

                    if (!isset($_SESSION['customer_email'])){
                    echo "<a href='checkout.php'>Login</a>";

                         } else{
                    
                    echo "<a href='../logout.php'>Logout</a>";
                
                         }

                    ?></li>
             </ul>
       </div>
</ul>



</nav></div></header>

<!-- header section End  -->

<section class="content" id="content">
  <div class="container">
    <div class="col-md-12">
      <ul class="breadcrumb">
     
        <li><span>My Account</span></li>
        

      </ul>

    </div>
</div></section> 
 <div class="col-m-9">

  <!-- including my_order.php starts  -->

   <?php
     if (isset($_GET['my_order']))
     {
      include("my_order.php");
     }
     ?>

     <!-- including my_order.php End  -->

     <!-- including payoffline.php page starts  -->
<?php

if (isset($_GET['pay_offline'])){
  include("pay_offline.php");
}

  ?>

     <!-- including payoffline.php page End  -->
       <!-- including Edit_account.php page start  -->
         <?php
            if (isset($_GET['edit_act'])){
              include("edit_act.php");
            }
           ?>

         <!-- including Edit_account.php page End  -->
           <!-- including change_pass.php page Start  -->
         <?php
            if (isset($_GET['change_pass'])){
              include("change_password.php");
            }
           ?>

            <!-- including change_pass.php page End  -->
             <!-- including delete_pass.php page Start  -->

                <?php
            if (isset($_GET['delete_ac'])){
              include("delete_ac.php");
            }
           ?>

              <!-- including delete_pass.php page End  -->
 </div>

    
  
  <div class="content1" id="content1">
  <div class="container">
    <div class="col-md-3">
      <?php
      include("includes/sidebar.php");  
      ?>

    </div>
</div>
     </div>

<!-- footer section starts  -->

<!-- footer section starts  -->

<footer class="footer" id="footer">
    <div class="container">
        <div class="wolf">
            <div class="footer-ol">
                <h4>Follow Us</h4>
                <div class="social-links">
                    <a href="https://www.facebook.com/mrmontir?locale=id_ID"><i class="fab fa-facebook-f" style="color: #3b5998; font-size: 24px;"></i></a>
                    <a href="https://x.com/mrmontir"><i class="fab fa-twitter" style="color: #0084b4; font-size: 24px;"></i></a>
                    <a href="https://www.instagram.com/mr_montir/?hl=en"><i class="fab fa-instagram" style="color: #E1306C; font-size: 24px;"></i></a>
                </div>
            </div>
            <div class="pal"></div>
            <p class="credit">Copyright &copy; 2024 all rights reserved <span>By kelompok 2</span></p>
        </div>
    </div>
</footer>

<!-- footer section ends -->
<!-- footer section ends -->

  </nav></div></header>  


<!-- jquery cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- owl carousel js file cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- custom js file link  -->
<script src="main/js.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>  
<script>

<?php } ?></body></html>