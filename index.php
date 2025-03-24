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
        <li>
            
            <li><a class="active" href="index.php">HOME</a></li>
             
            <li><a href="shop.php">SHOP</a></li>
            <li><a href="#OLI">OLI</a></li>
            <li><a href="#AKI">AKI</a></li>
            <li><a href="contactus.php">CONTACT</a></li>
            <li><a href="#footer">ABOUT</a></li>
 
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

                    ?>
                   </li> 

                   <li>
                   <a href="cart.php"><i class="fa fa-shopping-cart"></i>Goto Cart</a></li>
                    
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
    
    
           
    
       
    
<!-- header section ends -->

<!-- home section starts  -->
<section class="home" id="home">

<h1 class="heading"> <span>SELAMAT DATANG<br>MR.MONTIR KHUSUS JATENG</span> </h1>

<div class="slideshow-container">
<!-- dynamic hairstyle images section starts  -->

<?php
$get_slider="select * from slider LIMIT 0,1";
$run_slider= mysqli_query($con,$get_slider);
while ($row= mysqli_fetch_array($run_slider)) {
  $slider_name= $row['slider_name'];
  $slider_image= $row['slider_image'];
   $slider_url= $row['slider_url'];

  echo "<div class='mySlides fade'>
  <a href='$slider_url'><img src='admin_area/slider_images/$slider_image'  width='1400' height='400'></a>

</div>
  ";
}

    ?>
<?php
$get_slider="select * from slider LIMIT 1,10";
$run_slider= mysqli_query($con,$get_slider);
while ($row= mysqli_fetch_array($run_slider)) {
  $slider_name= $row['slider_name'];
  $slider_image= $row['slider_image'];
   $slider_url= $row['slider_url'];
  echo "<div class='mySlides fade '>
  <a href='$slider_url'><img src='admin_area/slider_images/$slider_image' width='1400' height='400'></a>
        </div>";
}

    ?>


<!-- dynamic hairstyle images section End  -->

<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<div  style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
  <span class="dot" onclick="currentSlide(4)"></span> 
  <span class="dot" onclick="currentSlide(5)"></span> 
  

</div>



</section>




<!-- home section ends -->
<!-- new this week section start -->
<!-- hot start -->

<div class="hot">    
    <div class="box">
        <div class="container">
            <div class="col-md-121">
                <h2>PRODUK TERBARU</h2>
           
          <!-- dynamic latest this week images section start  -->
          <div class=" col-sm-4" >
          <div class="row">
                   <?php

                   getPro();


                     ?>
 </div>
</div><!-- hot End -->
 </div>
         </div>
    </div>
</div>
          <!-- dynamic latest this week images section End  -->


                   
      


<!-- new this week section End -->




<!-- OLI Start  -->
<section class="arrival" id="OLI">

<h1 class="heading"> <span>Oli</span> </h1>

<div class="box-container">

    <div class="box">
        <div class="image">
           <a href="details.php?pro_id=56"> <img src="website/products/motul.png"  alt="" width="250"></a>
        </div>
        <div class="info">
            <a href="details.php?pro_id=56"><h3>oli motul</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>
<!-- shop End  -->
    
    <div class="box">
        <div class="image">
           <a href="details.php?pro_id=57">  <img src="website/products/ahm.png" alt="" width="250"></a>
        </div>
        <div class="info">
          <a href="details.php?pro_id=57">  <h3>Oli AHM</h3></a>
           
        </div>
        <div class="overlay">
        
        </div>
    </div>

    <div class="box">
        <div class="image">
           <a href="details.php?pro_id=58"> <img src="website/products/oli2.png" alt="" width="250"></a>
        </div>
        <div class="info">
            <a href="details.php?pro_id=58"> <h3>audilube</h3></a>
           
        </div>
        <div class="overlay">
    </div>
</div>

<div class="box">
        <div class="image">
           <a href="details.php?pro_id=59"> <img src="website/products/shell.png" alt="" width="250"></a>
        </div>
        <div class="info">
            <a href="details.php?pro_id=59"> <h3>Oli shell</h3></a>
           
        </div>
        <div class="overlay">
    </div>
</div>

<div class="box">
        <div class="image">
           <a href="details.php?pro_id=60"> <img src="website/products/petro.jpg" alt="" width="220"></a>
        </div>
        <div class="info">
            <a href="details.php?pro_id=60"> <h3>Oli Petro</h3></a>
           
        </div>
        <div class="overlay">
    </div>
</div>

<div class="box">
        <div class="image">
           <a href="details.php?pro_id=81"> <img src="website/products/mpx.jpg" alt="" width="220"></a>
        </div>
        <div class="info">
            <a href="details.php?pro_id=81"> <h3>oli mpx</h3></a>
           
        </div>
        <div class="overlay">
    </div>
</div>


     <div class="box">
        <div class="image">
           <a href="details.php?pro_id=84"> <img src="website/products/hp.jpg"  alt="" width="200"></a>
        </div>
        <div class="info">
            <a href="details.php?pro_id=84"><h3>Oli HP</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>

    </div>
</section>

<!-- oli products section ends -->
<!-- aki products section starts -->

<section class="parlor" id="AKI">

<h1 class="heading"> <span>Aki</span> </h1>

<div class="box-container">

    <div class="box">
        <div class="image">
           <a href="details.php?pro_id=39"> <img src="website/products/aki.png"  alt="" width="250"></a>
        </div>
        <div class="info">
            <a href="details.php?pro_id=39"><h3>aki acu</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>
<!-- shop End  -->
    
    <div class="box">
        <div class="image">
           <a href="details.php?pro_id=76">  <img src="website/products/gtz.png" alt="" width="300"></a>
        </div>
        <div class="info">
          <a href="details.php?pro_id=76">  <h3>Aki GTZ</h3></a>
           
        </div>
        <div class="overlay">
        
        </div>
    </div>

    <div class="box">
        <div class="image">
           <a href="details.php?pro_id=77"> <img src="website/products/ytx9.png" alt="" width="250"></a>
        </div>
        <div class="info">
            <a href="details.php?pro_id=77"> <h3>AKI YTX9</h3></a>
           
        </div>
        <div class="overlay">
    </div>
</div>

<div class="box">
        <div class="image">
           <a href="details.php?pro_id=78"> <img src="website/products/bosch.png" alt="" width="250"></a>
        </div>
        <div class="info">
            <a href="details.php?pro_id=78"> <h3>AKI BOSCH</h3></a>
           
        </div>
        <div class="overlay">
    </div>
</div>

<div class="box">
        <div class="image">
           <a href="details.php?pro_id=79"> <img src="website/products/R1.png" alt="" width="220"></a>
        </div>
        <div class="info">
            <a href="details.php?pro_id=79"> <h3>AKI YAMAHA</h3></a>
           
        </div>
        <div class="overlay">
    </div>
</div>

<div class="box">
        <div class="image">
           <a href="details.php?pro_id=80"> <img src="website/products/stz.png" alt="" width="220"></a>
        </div>
        <div class="info">
            <a href="details.php?pro_id=80"> <h3>Aki STZ4L</h3></a>
           
        </div>
        <div class="overlay">
    </div>
</div>


     <div class="box">
        <div class="image">
           <a href="details.php?pro_id=85"> <img src="website/products/gs.jpg"  alt="" width="200"></a>
        </div>
        <div class="info">
            <a href="details.php?pro_id=85"><h3>Aki GS</h3></a>
            
        </div>
        <div class="overlay">
          
        </div>
    </div>

    </div>
</section>
<!-- aki products section ends -->


<!-- footer section starts  -->
<?php
      include("includes/footer.php");  
      ?>
<!-- footer section   -->





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
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";

}
</script>



</body>
</html>

