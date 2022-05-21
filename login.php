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

<!-- Head --><head>
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


<form name="login" action="action_login.php" method="POST">
    <table style="margin: auto; border: 0;">   
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
        <!-- submit & reset -->
        <tr>
            <td></td>
            <td style="text-align: center;">
                <input type="submit" value="Log in"/>
                <input type="reset" value="Reseting"/>
            </td>
        </tr>
    </table>
</form>

<?php
include("includes/footer.php");
?>