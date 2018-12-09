<!DOCTYPE html>
<html lang="en">

<?php session_start();?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    .card {
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        max-width: 300px;
        margin: auto;
        text-align: center;
        font-family: arial;
    }

    .title {
        color: black;
        font-size: 30px;
    }
    body {
        background-color: whitesmoke;
    }
</style>

<body>
    <h2 style="text-align:center">Account Details</h2>

    <div class="card">
        <img src="defaultProfilePicture.jpg" style="width:100%">

        <!-- must add username from session -->
        <h1><?php echo ucfirst($_SESSION['username']);?></h1>
        <p class="title">Valued Customer</p>
        <p>Order History</p>
        <table>
        <tr>
            <th>Transaction Date</th>
            <th>Car</th>
            <th>Total</th>
            <th>Days</th>

        </tr>
        <?php
        include 'database.php';
                
                
                //must add session info to pass the password and user here
                $table = get_orders($_SESSION['username'],$_SESSION['password']);
                if($table){
                    if(mysqli_num_rows($table)>0){
                        while($row=mysqli_fetch_assoc($table)){

                            $timestamp= substr($row[TIMESTAMP], 0,10);

                            echo "<tr><td>$timestamp</td><td>$row[CARNAME]</td><td>$row[AMOUNT]</td><td>$row[DAYS]</td></tr>";


                        }

                    }
                }


        ?>
    </table>
        <div style="margin: 24px 0;">
        </div>
        <form action="index.php">
        <p><button>Go Back</button></p>
    </form>
    </div>
</body>

</html>