<?php
include("includes/header.php");

if(isset($_POST['username'])&&!empty($_POST['username'])&&isset($_POST['password'])&&!empty($_POST['password'])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
} else {
	exit('Some inputs have not been filed');
}
	
$link = mysqli_connect("localhost","root","","shop");

if(mysqli_connect_errno())
	exit("An error has occurred " . mysqli_connect_error());
	
$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password' ";
$result = mysqli_query($link , $query);

$row = mysqli_fetch_array($result);
if($row) {
	$_SESSION["state_login"] = true;
	$_SESSION["realname"] = $row ["realname"];
	$_SESSION["username"] = $row["username"];
	$_SESSION["email"] = $row["email"];
	
	if ($row["type"] == 0) {
		$_SESSION["user_type"] = "public";
	} elseif ($row["type"] == 1) {
		$_SESSION["user_type"] = "admin";	
	?>
	<script>
		location.replace("admin_products.php");
	</script>
	<?php
	}
	// header("refresh: 0");
    echo("<p style='color:green'><b> Wellcome {$row['realname']} </b></p>");
}
else {
    echo("<p style='color:red'><b> Username or password is incorrect </b></p>");
}

	
mysqli_close($link);	

include("includes/footer.php");
?>