<?php
session_start();
if (!isset($_SESSION['customer_email'])) {
  echo "<script>window.open('../checkout.php','_self')</script>";
}else{
include("../includes/db.php");

include("../functions/functions.php");

if (isset($_GET['order_id'])) {
  $order_id=$_GET['order_id'];

  // Fetch order details for autofill
  $get_order = "SELECT invoice_no, due_amount FROM customer_order WHERE order_id='$order_id'";
  $run_order = mysqli_query($con, $get_order);
  $row_order = mysqli_fetch_array($run_order);

  $invoice_no = $row_order['invoice_no'];
  $due_amount = $row_order['due_amount'];
}
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
                    
                    echo "<a href='#'>My Account</a>";
                
                         }

                    ?></li> 
                     
                   <li>
                   <a href="../cart.php"><i class="fa fa-shopping-cart"></i>Goto Cart</a></li>
                    
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

<!-- header section End  -->

<section class="content" id="content">
  <div class="container">
    <div class="col-md-12">
      <ul class="breadcrumb">
     
        <li><span>My Account</span></li>
        

      </ul>

    </div>
</div></section> 
 <div class="co-9">
  <div class="trx">
    <h1 align="center">Please confirm your payment</h1>
    <form action="confirm.php?update_id=<?php echo $order_id ?>" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label> Invoice Number</label>
        <input type="text" class="form-control" name="invoice_number" value="<?php echo $invoice_no; ?>" readonly>
      </div>
      <div class="form-group">
        <label> Amount</label>
        <input type="text" class="form-control" name="amount" value="<?php echo $due_amount; ?>" readonly>
      </div>
      <div class="form-group">
        <label>Select Payment Mode</label>
       <select class="form-control" name="payment_mode">
         <option>DANA</option>
         <option>Paypal</option>
         <option>BRI</option>
         <option>QRIS</option>
       </select>
      </div>
      <div class="form-group">
        <label>Transection Number </label>
        <input type="text" class="form-control" name="trfr_number" required="">
      </div>
      <div class="form-group">
        <label>Upload Payment Proof</label>
        <input type="file" class="form-control" name="payment_proof" accept="image/*" required>
      </div>

      <div class="form-group">
        <label>Payment Date </label>
        <input type="date" class="form-control" name="date" required="">
      </div>
      <div class="text-center">
        <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">Confirm Payment</button>
      </div>
    </form>

    <?php

if (isset($_POST['confirm_payment'])) {
  $update_id = $_GET['update_id'];
  $invoice_number = $_POST['invoice_number'];
  $amount = $_POST['amount'];
  $payment_mode = $_POST['payment_mode'];
  $trfr_number = $_POST['trfr_number'];
  $date = $_POST['date'];
  $complete = "Complete";

  // Simpan bukti pembayaran
  $payment_proof = $_FILES['payment_proof']['name'];
  $proof_tmp_name = $_FILES['payment_proof']['tmp_name'];
  $proof_target_dir = "../website/bukti/"; // Direktori tujuan

  // Buat folder jika belum ada
  if (!is_dir($proof_target_dir)) {
      mkdir($proof_target_dir, 0777, true);
  }

  // Pindahkan file ke folder tujuan
  move_uploaded_file($proof_tmp_name, $proof_target_dir . $payment_proof);

  // Simpan data pembayaran ke tabel payments
  $insert = "INSERT INTO payments (invoice_id, amount, payment_mode, ref_no, payment_date, proof_image) 
             VALUES ('$invoice_number', '$amount', '$payment_mode', '$trfr_number', '$date', '$payment_proof')";
  $run_insert = mysqli_query($con, $insert);

  // Perbarui status pesanan di tabel customer_order
  $update_q = "UPDATE customer_order SET order_status = '$complete' WHERE order_id = '$update_id'";
  mysqli_query($con, $update_q);

  // Ambil produk dan jumlah dari tabel customer_order berdasarkan order_id
  $get_order_details = "SELECT product_id, qty FROM customer_order WHERE order_id = '$update_id'";
  $run_order_details = mysqli_query($con, $get_order_details);

  // Kurangi stok produk
  while ($row = mysqli_fetch_array($run_order_details)) {
      $product_id = $row['product_id'];
      $quantity = $row['qty'];

      // Kurangi stok produk di tabel products
      $update_stock = "UPDATE products SET stok = stok - $quantity WHERE product_id = '$product_id'";
      mysqli_query($con, $update_stock);
  }

  // Berikan notifikasi sukses
  echo "<script>alert('Your order has been received and stock has been updated. Payment proof uploaded.')</script>";
  echo "<script>window.open('my_account.php?order','_self')</script>";
}


?>


  </div>
 </div>
    
  
  <div class="content1" id="content1">
  <div class="container1">
    <div class="col-md-3">
      <?php
      include("includes/sidebar.php");  
      ?>
   
    </div>

</div>
     </div> 
       <!-- footer section starts  -->
        <div>
   <?php
      include("includes/footer.php");  
      ?>
      </div>
      
<!-- footer section   -->


<?php } ?>
