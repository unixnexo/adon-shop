<!-- Ali Bolouki --> 
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adon | Shop</title>
    <!-- Linking to css file -->
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Supermercado+One&display=swap" rel="stylesheet">

</head>
<body>
    <div class="divTable">
        <div class="divTableRow">
            <div class="divTableCell">
                <!-- Headder | For logo -->
                <header class="divTable">
                    <div class="divTableRow">
                        <div class="divTableCell">
                            <img class="logo_img" src="imgs/logo.jpg" alt="The logo of the web page on the top"/>
                        </div>
                    </div>
                </header>

                <!-- Nav | For main menu on the top-->
                <nav class="divTable">
                    <ul class="divTableRow">
                        <li class="divTableCell"><a class="set_style_link" href="index.php">Main Page</a></li>
                        <li class="divTableCell"><a class="set_style_link" href="register.php">Register</a></li>
                        <?php
							if(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) {
						?>
                       	<li class="divTableCell"><a class="set_style_link" href="logout.php">Log out
                       	<?php echo("({$_SESSION["realname"]})") ?> </a></li>
                       	<?php
							}
							else {
						?>
                        <li class="divTableCell"><a class="set_style_link" href="login.php">Log in</a></li>
                        <?php
							}
						?>
                        <li class="divTableCell"><a class="set_style_link" href="#">About us</a></li>
                        <li class="divTableCell"><a class="set_style_link" href="contact.php">Contact us</a></li>
                        <?php
							if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true && $_SESSION["user_type"] === "admin") {
						?>
                   		<li class="divTableCell"><a class="set_style_link" href="admin_products.php">Products managment</a></li>
                        <li class="divTableCell"><a class="set_style_link" href="admin_orders_manage.php">Orders managment</a></li>
                   		<?php
						}
						?>
                   
                    </ul>
                </nav>

                <!-- Section | For stuffs, properties ... -->
                <!-- <section class="divTable">
                    <section clss="divTableRow">
                        <aside class="divTableCell" style="width: 20%;">Properties of the site</aside>
                        <section class="divTableCell" style="width: 75%;">Stuffs</section>
                    </section>
                </section> -->