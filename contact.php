<!-- Ali Bolouki --> 

<!-- Header -->
<?php
    include("includes/header.php");

    if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true )) {
?>
        
        <br/>
        <span style="color: red;"><b>You need to log in in order to send a message</b></span>
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

	if (!($_SESSION["user_type"] === "public")) {
?>

<script>
location.replace("index.php");
</script>

<?php
    }//if
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
<form name="contact" action="action_contact.php" method="POST">
    <table style="margin: auto; border: 0;">   
        <!-- username -->
        <tr>
            <td>Username:</td>
            <td><input type="text" id="username" name="username" value="<?php echo $_SESSION['username']; ?>" placeholder="Your username" readonly/></td>
        </tr>
        <!-- email -->
        <tr>
            <td>Email:</td>
            <td><input type="text" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" placeholder="Your email" readonly/></td>
        </tr>
        <!-- textarea -->
        <tr>
            <td>Your text:</td>
            <td><textarea id="text" name="text" cols="30" rows="5" placeholder="Enter what u wanna say!..." required></textarea></td>
        </tr>
        <!-- submit & reset -->
        <tr>
            <td></td>
            <td style="text-align: center;">
                <input type="button" onclick="user_check();" value="Send"/>
                <input type="reset" value="Reset"/>
            </td>
        </tr>
    </table>
</form>
<br/>

<script>
    function user_check() {
        a = confirm("Are u sure for sending this message to admin>?>");
        if (a === true) {
            document.contact.submit();
        } else {
            alert("Message is still here");
        }
    }
</script>

<?php
include("includes/footer.php");
?>