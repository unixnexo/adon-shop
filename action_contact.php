<?php
include("includes/header.php");

$link = mysqli_connect("localhost","root","","shop");

if(mysqli_connect_errno())
	exit("An error has occurred " . mysqli_connect_error());

$username = $_POST["username"];
$email = $_POST["email"];
$text = $_POST["text"];
$query = "INSERT INTO `contact`(`username`, `email`, `text`) VALUES ('$username', '$email', '$text')";

if (mysqli_query($link, $query) === true) {
    echo("<P style='color: green;'><br/><b>Your message has been deliverd!</b></p>");
    echo("<P style='color: blue;'>We'll be in touch via email ;)</p><br/>");
} else {
    echo("<p style='color: red;'><b>There has been an error | Try again : :( </b></p>");
}

?>

<?php
mysqli_close($link);
include("includes/footer.php");
?>