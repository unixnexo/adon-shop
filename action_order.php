<!-- Ali Bolouki --> 

<!-- Header -->
<?php
    include("includes/header.php");

	if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true )) {
?>

<script>
location.replace("index.php");
</script>

<?php
	}//if

    $pro_code = $_POST['pro_code'];
    $pro_name = $_POST['pro_name'];
    $pro_qty = $_POST['pro_qty'];
    $pro_price = $_POST['pro_price'];
    $total_price = $_POST['total_price'];
    $realname = $_POST['realname'];
    $email = $_POST['eamil'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $username = $_SESSION['username'];

    $link = mysqli_connect ("localhost", "root", "", "shop");

    if (mysqli_connect_errno()) {
	    exit("An erroe has occurred" . mysqli_connect_error());
    }

    $pro_date = date('y-m-d');
    $query = "INSERT INTO `orders`(`username`, `orderdate`, `pro_code`, `pro_qty`, `pro_price`, `mobile`, `address`, `trackcode`, `state`) VALUES ('$username', '$pro_date', '$pro_code', '$pro_qty', '$pro_price', '$mobile', '$address', '000000', '0')";

    if (mysqli_query($link, $query) === true) {
        echo("<P style='color: green;'><br/><b>Your order has been saved</b></p><br/>");
        echo("Customer $realname <br/>");
        echo("Prodoct <span style='color: red;'>$pro_name</span> by code <span style='color: red;'>$pro_code</span> with amount of <span style='color: red;'>$pro_qty</span> in price of <span style='color: red;'>$pro_price</span> had been orderd <br/>");
        echo("Price for submition is <span style='color: red;'>$total_price</span> <br/><br/>");

        $query = "update products set pro_qty = pro_qty - $pro_qty where pro_code = $pro_code ";
        mysqli_query($link , $query);
    } else {
        echo("<p style='color: red;'><b>There has been an error | order havent been saved :( </b></p>");
    }

?>

<!-- Footer -->
<?php
    mysqli_close($link);
    include("includes/footer.php");
?>