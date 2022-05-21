<?php
#
$try = basename("C:\xampp\htdocs\Adon_shop\login.php");
echo $try . "<br>";

#
$try1 = "C:\xampp\htdocs\Adon_shop\login.php";
if (file_exists($try1)) {
	echo "We go it <br>";
} else {
	echo "We lost it <br>";
}

#
$try2 = "C:\xampp\htdocs\Adon_shop\login.php";
echo pathinfo($try2, PATHINFO_DIRNAME) . "<br>";
echo pathinfo($try2, PATHINFO_BASENAME) . "<br>";
echo pathinfo($try2, PATHINFO_EXTENSION) . "<br>";
echo pathinfo($try2, PATHINFO_FILENAME) . "<br>";

#
$try3 = getimagesize("imgs\logo.jpg");
echo $try3['mime'] . "<br>";
echo $try3[0]. "<br>";
echo $try3[1]. "<br>";
echo $try3[3]. "<br>";
echo $try3['bits']. "<br>";
echo $try3['channels']. "<br>";

?>