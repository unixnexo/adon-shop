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

        a {
            text-decoration: none;
            color: purple;
        }
    </style>
</head>

<?php
$query = "SELECT * FROM orders";
$result = mysqli_query($link, $query);
?>

<table border="1px" style="width: 100%;">
        <tr>
            <td>name</td>
            <td>id</td>
            <td>date</td>
            <td>address</td>
            <td>phone number</td>
            <td>track code</td>
            <td>status</td>
            <td>new status</td>
        </tr>
        <?php
        while ($row = mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td><?php echo ($row['username']) ?></td>
            <td><?php echo ($row['id']) ?></td>
            <td><?php echo ($row['orderdate']) ?></td>
            <td><?php echo ($row['address']) ?></td>
            <td><?php echo ($row['mobile']) ?></td>
            <td><?php echo ($row['trackcode']) ?></td>
            <td><?php echo ($row['state']) ?></td>
            <td>
                <a href="action_admin_orders_manage.php?id=<?php echo $row['id'];?>&action=UPDATE[0]">checking [0]</a> 
                &nbsp;
                <a href="action_admin_orders_manage.php?id=<?php echo $row['id'];?>&action=UPDATE[1]">ready [1]</a>
                <br/>
                <a href="action_admin_orders_manage.php?id=<?php echo $row['id'];?>&action=UPDATE[2]">sent [2]</a>
                &nbsp;
                <a href="action_admin_orders_manage.php?id=<?php echo $row['id'];?>&action=UPDATE[3]">terminated [3]</a>
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
