<?php

$customer_email = $_SESSION['customer_email'];
$get_customer = "SELECT * FROM customers WHERE customer_email='$customer_email'";
$run_cust = mysqli_query($con, $get_customer);
$row_cust = mysqli_fetch_array($run_cust);
$customer_id = $row_cust['customer_id'];
$customer_name = $row_cust['customer_name'];
$customer_email = $row_cust['customer_email'];
$customer_country = $row_cust['customer_country'];
$customer_city = $row_cust['customer_city'];
$customer_contact = $row_cust['customer_contact'];
$customer_address = $row_cust['customer_address'];
$customer_image = $row_cust['customer_image'];

?>

<div class="rx">
    <center>
        <h1>Edit Your Account</h1>
    </center>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="roup">
            <label>Name</label>
            <input type="text" name="c_name" class="trol" value="<?php echo $customer_name; ?>" required="">
        </div>
        <div class="roup">
            <label>Email</label>
            <input type="email" name="c_email" class="trol" value="<?php echo $customer_email; ?>" required="">
        </div>
        <div class="roup">
            <label>Country</label>
            <select name="c_country" class="form-control" required="" id="country">
                <option value="">Select Country</option>
                <option value="Indonesia" <?php if($customer_country == "Indonesia") echo "selected"; ?>>Indonesia</option>
                <option value="Malaysia" <?php if($customer_country == "Malaysia") echo "selected"; ?>>Malaysia</option>
                <option value="Thailand" <?php if($customer_country == "Thailand") echo "selected"; ?>>Thailand</option>
                <option value="Vietnam" <?php if($customer_country == "Vietnam") echo "selected"; ?>>Vietnam</option>
                <option value="Philippines" <?php if($customer_country == "Philippines") echo "selected"; ?>>Philippines</option>
                <option value="Singapore" <?php if($customer_country == "Singapore") echo "selected"; ?>>Singapore</option>
                <option value="Brunei" <?php if($customer_country == "Brunei") echo "selected"; ?>>Brunei</option>
                <option value="Cambodia" <?php if($customer_country == "Cambodia") echo "selected"; ?>>Cambodia</option>
                <option value="Laos" <?php if($customer_country == "Laos") echo "selected"; ?>>Laos</option>
                <option value="Myanmar" <?php if($customer_country == "Myanmar") echo "selected"; ?>>Myanmar</option>
            </select>
        </div>
        <div class="roup">
            <label>City</label>
            <select name="c_city" class="form-control" required="" id="city">
                <option value="">Select City</option>
                <!-- Dynamically populate cities using JavaScript below -->
            </select>
        </div>
        <div class="roup">
            <label>Contact Number</label>
            <input type="text" name="c_number" class="trol" value="<?php echo $customer_contact; ?>" required="">
        </div>
        <div class="roup">
            <label>Address</label>
            <input type="text" name="c_address" class="trol" value="<?php echo $customer_address; ?>" required="">
        </div>
        <div class="roup">
            <label>Customer Image</label>
            <input type="file" name="c_image" class="trol">
            <img src="customer_images/<?php echo $customer_image; ?>" class="img-responsive" height="70" width="70">
        </div>
        <div class="text-center">
            <button class="btn btn-primary" name="update" type="submit">
                Update Now
            </button>
        </div>
    </form>
</div>

<script>
    const countryToCities = {
        "Indonesia": ["Jakarta", "Surabaya", "Semarang", "Yogyakarta", "Bandung", "Malang", "Solo", "Cirebon", "Tangerang", "Bekasi", "Depok"],
        "Malaysia": ["Kuala Lumpur", "George Town", "Johor Bahru", "Ipoh"],
        "Thailand": ["Bangkok", "Chiang Mai", "Pattaya", "Phuket"],
        "Vietnam": ["Hanoi", "Ho Chi Minh City", "Da Nang", "Hai Phong"],
        "Philippines": ["Manila", "Cebu City", "Davao City", "Quezon City"],
        "Singapore": ["Singapore"],
        "Brunei": ["Bandar Seri Begawan", "Kuala Belait"],
        "Cambodia": ["Phnom Penh", "Siem Reap"],
        "Laos": ["Vientiane", "Luang Prabang"],
        "Myanmar": ["Yangon", "Mandalay", "Naypyidaw"]
    };

    document.getElementById("country").addEventListener("change", function () {
        const selectedCountry = this.value;
        const citySelect = document.getElementById("city");

        citySelect.innerHTML = '<option value="">Select City</option>';

        if (selectedCountry && countryToCities[selectedCountry]) {
            countryToCities[selectedCountry].forEach(city => {
                const option = document.createElement("option");
                option.value = city;
                option.textContent = city;
                if (city === "<?php echo $customer_city; ?>") {
                    option.selected = true;
                }
                citySelect.appendChild(option);
            });
        }
    });

    // Trigger the change event to pre-fill the city dropdown
    document.getElementById("country").dispatchEvent(new Event("change"));
</script>

<?php

if (isset($_POST['update'])) {
    $update_id = $customer_id;
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_country = $_POST['c_country'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_number'];
    $c_address = $_POST['c_address'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];

    if (!empty($c_image)) {
        move_uploaded_file($c_image_tmp, "customer_images/$c_image");
    } else {
        $c_image = $customer_image;
    }

    $update_customer = "UPDATE customers SET 
        customer_name='$c_name',
        customer_email='$c_email',
        customer_country='$c_country',
        customer_city='$c_city',
        customer_contact='$c_contact',
        customer_address='$c_address',
        customer_image='$c_image'
        WHERE customer_id='$update_id'";

    $run_customer = mysqli_query($con, $update_customer);

    if ($run_customer) {
        echo "<script>alert('Your details have been updated. You will need to log in again.')</script>";
        echo "<script>window.open('../logout.php', '_self')</script>";
    } else {
        echo "<script>alert('There was an error updating your details. Please try again.')</script>";
    }
}

?>
