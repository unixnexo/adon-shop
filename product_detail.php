<?php
include("includes/header.php");

$link = mysqli_connect("localhost","root","","shop");

if(mysqli_connect_errno())
	exit("An error has occurred " . mysqli_connect_error());

$pro_code = 0;
if (isset($_GET['id'])) {
    $pro_code = $_GET['id'];
}

$query = "select * from products where pro_code = '$pro_code' ";
$result = mysqli_query($link , $query);
?>

<table style="width: 100%;" border="1px">
<tr>
    <?php
    if ($row = mysqli_fetch_array($result)) {
    ?>
    <td style="border-style: dotted dashed; vertical-align: top; width: 33%;">
        <h4 style="color: brown;"> <?php echo ($row['pro_name']) ?> </h4>
        <a href="order.php?id=<?php echo ($row['pro_code']) ?>">
            <img src="imgs/products/<?php echo ($row['pro_image']) ?>" width="250px" height="150px"/>
        </a>
        <br/>
        price: <?php echo ($row['pro_price']) ?>$
        <br/>
        amount: <?php echo ($row['pro_qty']) ?>
        <br/>
        details: <?php echo (substr($row['pro_detail'],0,120)) ?>...
        <br/>
        <b><a href="order.php?id=<?php echo ($row['pro_code']) ?>" style="text-decoration: none;">Buy</a></b>
    </td>

<?php
}//if
?>
</tr>
</table>

<?php
include("includes/footer.php");
?>