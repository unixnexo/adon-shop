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

    ini_set('display_errors', 1); ini_set('log_errors',1); error_reporting(E_ALL); mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$link = mysqli_connect ("localhost", "root", "", "shop");

if (mysqli_connect_errno()) {
	exit("An erroe has occurred" . mysqli_connect_error());
}

if (isset($_GET['action'])) {
	$id = $_GET['id'];

    switch ($_GET['action']) {
        case "UPDATE[0]":
            $query = "UPDATE `orders` SET `state` = '0' WHERE `id` = '$id'";
            if (mysqli_query($link, $query) === true) {
				echo("<p style='color: green;'><b>Order set at the status | checking | </b></p>");
			} else {
				echo("<p style='color: red;'><b>There was an error</b></p>");
			}
            break;
            
        case "UPDATE[1]":
            $query = "UPDATE `orders` SET `state` = '1' WHERE `id` = '$id'";
            if (mysqli_query($link, $query) === true) {
				echo("<p style='color: green;'><b>Order set at the status | ready | </b></p>");
			} else {
				echo("<p style='color: red;'><b>There was an error</b></p>");
			}
            break;

        case "UPDATE[2]":
            $query = "UPDATE `orders` SET `state` = '2' WHERE `id` = '$id'";
            if (mysqli_query($link, $query) === true) {
				echo("<p style='color: green;'><b>Order set at the status | sent | </b></p>");
			} else {
				echo("<p style='color: red;'><b>There was an error</b></p>");
			}
            break;

        case "UPDATE[3]":
            $query = "UPDATE `orders` SET `state` = '3' WHERE `id` = '$id'";
            if (mysqli_query($link, $query) === true) {
				echo("<p style='color: green;'><b>Order set at the status | terminated | </b></p>");
			} else {
				echo("<p style='color: red;'><b>There was an error</b></p>");
			}
            break;
    }
} else {
    echo("There is no action detected");
}
?>

<!-- Footer -->
<?php
	mysqli_close($link);
    include("includes/footer.php");
?>