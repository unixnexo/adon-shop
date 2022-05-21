<!-- Ali Bolouki --> 

<!-- Header -->
<?php
include("includes/header.php");

if (isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true) {
?>

<script>
	location.replace("denied.php");
</script>

<?php
}
?>


<!-- Head -->
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

<script type="text/javascript">
    function check_if_empty() {
        var username;
        username = document.getElementById("username").value;
        if (username == "") {
            alert("Please enter your username");
        } else {
            var conf = confirm("Are u sure about your informations?! ");
            if (conf == true) {
                document.register.submit();
            }
        }
    }
</script>

</br>


<form name="register" action="action_register.php" method="POST">
    <table style="margin: auto; border: 0;">   
        <!-- name -->
        <tr>
            <td><span style="color: red;">*</span> Name:</td>
            <td><input type="text" id="name" name="name" placeholder="Enter your name" required/></td>
        </tr>
        <!-- username -->
        <tr>
            <td><span style="color: red;">*</span> Username:</td>
            <td><input type="text" id="username" name="username" placeholder="Enter your username" required/></td>
        </tr>
        <!-- password -->
        <tr>
            <td><span style="color: red;">*</span> Password:</td>
            <td><input type="password" id="password" name="password" placeholder="Enter your password" required/></td>
        </tr>
        <!-- password | Re-entering -->
        <tr>
            <td><span style="color: red;">*</span> Re-enter password:</td>
            <td><input type="password" id="re_password" name="re_password" placeholder="Re-enter your password" required/></td>
        </tr>
        <!-- eamil -->
        <tr>
            <td><span style="color: red;">*</span> Email:</td>
            <td><input type="email" id="email" name="email" placeholder="Enter your email" required/></td>
        </tr>
        <!-- submit & reset -->
        <tr>
            <td></td>
            <td style="text-align: center;">
                <input type="submit" value="Registering" onclick="check_if_empty();"/>
                <input type="reset" value="Reseting"/>
            </td>
        </tr>

    </table>
</form>

</br>

<!-- Footer -->
<?php
    include("includes/footer.php");
?>
