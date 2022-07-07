<?php
    require_once("list-connection.php");
    $query =  "select * from sales_table";
    $result = mysqli_query($con,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales</title>

    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <section class="header">
        <div class="container text-center">
            <div class="header">
                <a href="../admin index.php" id="admin-title"><h2>Admin Panel</h2></a>
            </div>
        </div>
    </section>
    <section class="table">
        <div class="container sales-container">
            <div class="nav-menu">
                <ul class="nav"> 
                    <li><a href="../admin index.php"><img src="https://img.icons8.com/cute-clipart/64/000000/home-page.png"/></a></li>
                </ul>
            </div>
            <h2 class="title">Sales List</h2>
            <div class="box">
                <table class="content-table">
                    <thead>
                        <tr class="text-bold">
                            <td>orderNo</td>
                            <td>Date</td>
                            <td>First Name</td>
                            <td>Last Name</td>
                            <td>Resi. Address</td>
                            <td>City</td>
                            <td>Contact</td>
                            <td>Total</td>
                        </tr>
                    </thead>
                    <?php
                        while($row=mysqli_fetch_assoc($result))
                        {
                            $orderNo = $row['orderNo'];
                            $date = $row['date'];
                            $fname = $row['fname'];
                            $lname = $row['lname'];
                            $resaddress = $row['resaddress'];
                            $city = $row['city'];
                            $contact = $row['contact'];
                            $total = $row['total'];
                    ?>
                        <tbody>
                            <tr>
                                <td><?php echo $orderNo?></td>
                                <td><?php echo $date?></td>
                                <td><?php echo $fname?></td>
                                <td><?php echo $lname?></td>
                                <td><?php echo $resaddress?></td>
                                <td><?php echo $city?></td>
                                <td><?php echo $contact?></td>
                                <td><?php echo $total?></td>
                            </tr>
                        </tbody>
                    <?php
                        }
                    ?>
                </table>
            </div>
        </div>
    </section>
</body>
</html>