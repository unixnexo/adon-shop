<!-- Ali Bolouki --> 

<!-- Header -->
<?php
include("includes/header.php");

if (isset ($_POST["name"]) && !empty ($_POST["name"]) &&
    isset ($_POST["username"]) && !empty ($_POST["username"]) &&
    isset ($_POST["password"]) && !empty ($_POST["password"]) &&
    isset ($_POST["re_password"]) && !empty ($_POST["re_password"]) &&
    isset ($_POST["email"]) && !empty ($_POST["email"]) ) {
        # Getting informations from form
        $name = $_POST["name"];
        $username = $_POST["username"];
        $password = $_POST["password"];
        $re_password = $_POST["re_password"];
        $email = $_POST["email"];
    } else {
        exit("Please fill out all the inputs.");
    }

# if the passwords are the same
if ($password != $re_password) {
    exit("Passwords are not match");
}

# checking email format
if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
    exit("Email's format is not correct");
}

# connecting to mysql database
$link = mysqli_connect("localhost","root","","shop");
# error checking
if (mysqli_connect_errno()) {
    exit("There is an error: " . mysqli_connect_error());
}
# inserting infos in database
$query="INSERT INTO `users`(`realname`, `username`, `password`, `email`, `type`) VALUES ('$name','$username','$password', '$email', 0)";

# showing reporting message
if (mysqli_query ($link , $query) === true) {
    echo("<p style=color:green></br>". $name . " Has been saved" . "</p>");
}
else {
    echo("<p style=color:red></br>". $name . " Has not been saved" . "</p>");
}

mysqli_close($link);
?>

<body style="text-align: center;"></body>

<!-- Footer -->
<?php
    include("includes/footer.php");
?>