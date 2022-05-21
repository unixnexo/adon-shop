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

    $url = $pro_code = $pro_name = $pro_qty = $pro_price = $pro_image = $pro_detail = "";
    $btn_caption = "adding product";
    if (isset($_GET['action']) && $_GET['action'] == 'EDIT') {
        $id = $_GET['id'];
        $query = "SELECT * FROM products WHERE pro_code ='$id'";
        $result = mysqli_query($link , $query);
        if ($row = mysqli_fetch_array($result)) {
            $pro_code = $row['pro_code'];
            $pro_name = $row['pro_name'];
            $pro_qty = $row['pro_qty'];
            $pro_price = $row['pro_price'];
            $pro_image = $row['pro_image'];
            $pro_detail = $row['pro_detail'];
            $url="?id=$pro_code&action=EDIT";
            $btn_caption = "edit product";
        }
    } 
?>
<head>
    <style>
        td, tr {
            color: orange;
        }

        input {
            color: orange;
            font-size: 80%;
            padding: 2px;
            margin-top: 10px;
            border: 3px solid orange;
            background-color: black;
        }
    </style>
</head>



<br/>
    <form name="add_product" action="action_admin_products.php<?php if (!empty($url)) echo($url); ?>" method="POST" enctype="multipart/form-data">
	<table style="margin: auto; border: 0;">   
        <!-- code -->
        <tr>
            <td><span style="color: red;">*</span> Product code:</td>
            <td><input type="text" id="pro_code" name="pro_code" value="<?php echo ($pro_code) ?>" placeholder="Enter the product code" required/></td>
        </tr>
        <!-- name -->
        <tr>
            <td><span style="color: red;">*</span> product name:</td>
            <td><input type="text" id="pro_name" name="pro_name" value="<?php echo ($pro_name) ?>" placeholder="Enter the product name" required/></td>
        </tr>
        <!-- amount -->
        <tr>
            <td><span style="color: red;">*</span> product amount:</td>
            <td><input type="text" id="pro_qty" name="pro_qty" value="<?php echo ($pro_qty) ?>" placeholder="Enter the product amount" required/></td>
        </tr>
        <!-- price -->
        <tr>
            <td><span style="color: red;">*</span> product price:</td>
            <td><input type="text" id="pro_price" name="pro_price" value="<?php echo ($pro_price) ?>" placeholder="Enter the product price" required/></td>
        </tr>
        <!-- upload image -->
        <tr>
            <td><span style="color: red;">*</span> product image:</td>
            <td>
                <input type="file" id="pro_image" name="pro_image" placeholder="Upload the product image"/>
                <?php
                if (!empty($pro_image)) {
                    echo("<img src='imgs/products/$pro_image' width='80' height='40'/>");
                }
                ?>
            </td>
        </tr>
        <!-- detials -->
        <tr>
            <td><span style="color: red;">*</span> product detials:</td>
            <td><textarea id="pro_detail" name="pro_detail" cols="45" rows="10" wrap="virtual" placeholder="Enter the product detail" required><?php echo($pro_detail)?></textarea></td>
        </tr>
        <!-- submit & reset -->
        <tr>
            <td></td>
            <td style="text-align: center;">
                <input type="submit" value="<?php echo ($btn_caption) ?>"/>
                <input type="reset" value="Reseting"/>
            </td>
        </tr>

    </table>
</form>
<br/>

<?php
$query = "SELECT * FROM products";
$result = mysqli_query($link, $query);
?>

<table border="1px" style="width: 100%;">
        <tr>
            <td>pro_code</td>
            <td>pro_name</td>
            <td>pro_amount</td>
            <td>pro_price</td>
            <td>pro_image</td>
            <td>managment</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo ($row['pro_code']) ?></td>
            <td><?php echo ($row['pro_name']) ?></td>
            <td><?php echo ($row['pro_qty']) ?></td>
            <td><?php echo ($row['pro_price']) ?>$</td>
            <td><img src="imgs/products/<?php echo ($row['pro_image']) ?>" width="150px" height="50px"/></td>
            <td>
                <b><a href="action_admin_products.php?id=<?php echo ($row['pro_code']) ?>&action=DELETE" style="text-decoration: none;">Delete</a></b>
                &nbsp;|&nbsp;
                <b><a href="admin_products.php?id=<?php echo ($row['pro_code']) ?>&action=EDIT" style="text-decoration: none;">Edit</a></b>
            </td>
        </tr>
        <?php
        }//while
        ?>
</table>

<!-- Footer -->
<?php
    include("includes/footer.php");
?>

