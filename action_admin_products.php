<!-- Ali Bolouki --> 

<!-- Header -->
<?php
    include("includes/header.php");

	if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true && $_SESSION["user_type"] === "admin")) {
?>

<script>
location.replace("index.php");
</script>

<?php
	}//if

$link = mysqli_connect ("localhost", "root", "", "shop");

if (mysqli_connect_errno()) {
	exit("An erroe has occurred" . mysqli_connect_error());
}

if (!(isset($_GET['action']) && $_GET['action']=='DELETE')){

if (isset($_POST["pro_code"]) && !empty($_POST["pro_code"])
&& isset($_POST["pro_name"]) && !empty($_POST["pro_name"])
&& isset($_POST["pro_qty"]) && !empty($_POST["pro_qty"])
&& isset($_POST["pro_price"]) && !empty($_POST["pro_price"])
&& isset($_POST["pro_detail"]) && !empty($_POST["pro_detail"]))  {
	$pro_code = $_POST["pro_code"];
	$pro_name = $_POST["pro_name"];
	$pro_qty = $_POST["pro_qty"];
	$pro_price = $_POST["pro_price"];
	$pro_image = $_FILES["pro_image"]["name"];
	$pro_detail = $_POST["pro_detail"];
} else {
	echo("Some inputs are null | please fill out all <br/>");
	//should be exit
}
}//if

	if (isset($_GET['action'])) {
	$id = $_GET['id'];

	switch ($_GET['action']) {
		case 'EDIT':
			$query = "UPDATE `products` SET `pro_code`='$pro_code',`pro_name`='$pro_name',`pro_qty`='$pro_qty',`pro_price`='$pro_price',`pro_detail`='$pro_detail' WHERE `pro_code`= '$id'";
			if (mysqli_query($link, $query) === true) {
				exit("<p style='color: green;'><b>Product edited sussccfuly</b></p>");
			} else {
				exit("<p style='color: red;'><b>There was an error</b></p>");
			}
			break;
		case 'DELETE':
			$query = "SELECT pro_image FROM products WHERE pro_code= '$id'";
			$result = mysqli_query ($link, $query);
			$row = mysqli_fetch_array ($result);
			$pro_image = $row ['pro_image'];

			$query = "DELETE FROM `products` WHERE pro_code = '$id'";
			if (mysqli_query($link, $query) === true) {
				unlink("imgs/products/$pro_image");
				exit("<p style='color: green;'><b>Product deleted sussccfuly</b></p>");
			} else {
				exit("<p style='color: red;'><b>There was an error</b></p>");
			}
			break;
	}
}//if

// adding images into the imgs/products folder
$target_dir = "imgs/products/";
$target_file = $target_dir . $_FILES["pro_image"]["name"];
$uploadOK = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

// check if its an image that has being sent
$check = getimagesize($_FILES["pro_image"]["tmp_name"]);
if ($check !== false) {
	echo "The file type is a picture: " . $check["mime"] . "</br>";
	$uploadOK = 1;
} else {
	echo "The file type is NOT a picture </br>";
	$uploadOK = 0;
}

// check if there is no same name for the image 
if (file_exists($target_file)) {
	echo "There is the same name as u entered in the server </br>";
	$uploadOK = 0;
}

// the size of the image | if its bigger than 500 kb
if ($_FILES["pro_image"]["size"] > (500*1024)) {
	echo "The image size is more than 500 KB </br>";
	$uploadOK = 0;
}

// it should be just an image
$imageFileType != strtolower($imageFileType);
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
	echo "We just value this file types 'jpg - png - jpeg - git' </br>";
	$uploadOK = 0;
}

// inserting into database table
if ($uploadOK == 1) {
	$query = "INSERT INTO `products`(`pro_code`, `pro_name`, `pro_qty`, `pro_price`, `pro_image`, `pro_detail`) VALUES ('$pro_code', '$pro_name', $pro_qty, $pro_price, '$pro_image', '$pro_detail')";
	
	if (mysqli_query($link, $query) === true) {
		echo ("</br><p style='color:green';><b>The product is now alive</b></p>");
		// sendig to webserver
		if (move_uploaded_file($_FILES["pro_image"]["tmp_name"], $target_file)) {
			echo "Document " .$_FILES["pro_image"]["name"] . " succssfully got to webserver </br>";
		} else {
			echo "There is an error about the pic sending over the server </br>";
		}
	} else {
		echo ("</br><p style='color:red';><b>The product is NOT alive</b></p>");
	}
} else {
	echo "Try again :( </br>";
}
	
?>

<!-- Footer -->
<?php
	mysqli_close($link);
    include("includes/footer.php");
?>
