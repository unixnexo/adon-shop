<?php
include("includes/header.php");

$link = mysqli_connect("localhost","root","","shop");

if(mysqli_connect_errno())
	exit("An error has occurred " . mysqli_connect_error());

$pro_code = 0;
if (isset($_GET['id'])) {
    $pro_code = $_GET['id'];
} 

if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true )) {
?>

<br/>
<span style="color: red;"><b>You need to log in in order to order somthin</b></span>
<br/><br/>
If u have an account click
<a href="login.php" style="text-decoration: none;"><span style="color: blue;"><b>here</b></span></a>
<br/>
For registering click
<a href="register.php" style="text-decoration: none;"><span style="color: green;"><b>here</b></span></a>
<br/><br/>

<?php
exit();
}//if
$query = "select * from products where pro_code = '$pro_code' ";
$result = mysqli_query($link , $query);
?>

<form name="order" action="action_order.php" method="POST">
    <table style="width: 100%;" border="1px">
        <tr>
        <td style="width: 60%;">
        <?php
        if ($row = mysqli_fetch_array($result)) {
        ?>
        <br/>
        <table style="width: 100%; margin-left: auto; margin-right: auto;" border="0">
            <tr>
                <td style="width: 22%;">product code <span style="color: red;">*</span></td>
                <td style="width: 78%;"><input type="text" id="pro_code" name="pro_code" value="<?php echo($pro_code); ?>" readonly/></td>
            </tr>
            <tr>
                <td>product name <span style="color: red;">*</span></td>
                <td><input type="text" id="pro_name" name="pro_name" value="<?php echo ($row['pro_name']); ?>" readonly/></td>
            </tr>
            <tr>
                <td>amount  <span style="color: red;">*</span></td>
                <td><input type="text" style="text-align: left;" id="pro_qty" name="pro_qty" onchange="calc_price();"/></td>
            </tr>
            <tr>
                <td>product price<span style="color: red;">*</span></td>
                <td><input type="text" style="text-align: left;" id="pro_price" name="pro_price" value="<?php echo ($row['pro_price']); ?>" readonly/> $ </td>
            </tr>
            <tr>
                <td>buy for<span style="color: red;">*</span></td>
                <td><input type="text" style="text-align: left;" id="total_price" name="total_price" value="0" readonly/> $ </td>
            </tr>

        <script>
            function calc_price() {
            var pro_qty = <?php echo ($row['pro_qty']) ?>;
            var price = document.getElementById('pro_price').value;
            var count = document.getElementById('pro_qty').value;
            var total_price;
            if (count > pro_qty) {
                alert("There is not much amount of that product");
                document.getElementById('pro_qty').value = 0;
                count = 0;
            }
            if (count == 0 || count == "") {
                otal_price = 0;
            } else {
                total_price = count * price;
                document.getElementById('total_price').value = total_price;
            }
            }
        </script>

            <?php
            $query = "select * from users where username = '{$_SESSION['username']}' ";
            $result = mysqli_query($link , $query);
            $user_row = mysqli_fetch_array($result);
            ?>

            <tr>
                <td><br/><br/><br/></td>
                <td></td>
            </tr>
            <tr>
                <td style="width: 40%;">customer name<span style="color: red;">*</span></td>
                <td style="width: 60%;">
                    <input type="text" style="background-color: lightgray;" id="realname" name="realname" value="<?php echo ($user_row['realname']) ?>" readonly/>
                </td>
            </tr>
            <tr>
                <td>customer email<span style="color: red;">*</span></td>
                <td>
                    <input type="text" style="background-color: lightgray; text-align: left;" id="eamil" name="eamil" value="<?php echo ($user_row['email']) ?>" readonly/>
                </td>
            </tr>
            <tr>
                <td>customer phone-number<span style="color: red;">*</span></td>
                <td>
                    <input type="text" style="text-align: left;" id="mobile" name="mobile" value="09"/>
                </td>
            </tr>
            <tr>
                <td>customer delivring address<span style="color: red;">*</span></td>
                <td>
                    <textarea style="font-family: tahome;" id="address" name="address" cols="30" rows="3" wrap="virtual" placeholder=":|"></textarea>
                </td>
            </tr>
            <tr>
                <td><br/><br/><br/></td>
                <td><input type="button" value="Buy" onclick="check_input();" /></td>
            </tr>
        </table>

        </td>

        <td>
<script>
    function check_input() {
        var r = confirm("Are u sure about everythin??!");
        if (r === true) {
            var validatior = true;
            var count = document.getElementById('pro_qty').value;
            var mobile = document.getElementById('mobile').value;
            var address = document.getElementById('address').value;

            if (count == 0 || count == "") {
                validatior = false;
            }

            if (mobile.length < 11) {
                validatior = false;
            }

            if (address.length < 15) {
                validatior = false;
            }
          
            if (validatior) {
                document.order.submit();
            } else {
            alert("Check your inputs, somethin is wrong bitch");
            }
        } 
    }
</script>
    
    <table>
        <tr>
            <td style="border-style: dotted dashed; vertical-align: top; width: 33%;">
                <h4 style="color: brown;"><?php echo ($row['pro_name']) ?></h4>
                <img src="imgs/products/<?php echo ($row['pro_image']) ?>" width="250px" height="120px"/>
                <br/>
                price: <?php echo ($row['pro_price']) ?>&
                <br/>
                amount: <span style="color: red;"><?php echo ($row['pro_qty']) ?></span>
                <br/>
                details: <span style="color: green;">
                <?php 
                $count = strlen($row['pro_detail']);
                echo (substr($row['pro_detail'],0,(int)($count/4)));
                ?>
                ...</span>
                <br/><br/>
            </td>
        </tr>
    </table>

</tr>
</table>
</form>

<?php
}//if
include("includes/footer.php");
?>