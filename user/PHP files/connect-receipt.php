<?php
    session_start();   
    if(!empty($_SESSION["order_cart"]))  
    {  
    $total = 0;  
    foreach($_SESSION["order_cart"] as $keys => $values)  
    {  
?>  
        
<?php  
    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
    }  
?> 
    <?php  
    }
?>

<?php

$orderNo = $_POST['orderNo'];
$date = $_POST['date'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$resaddress = $_POST['resaddress'];
$city = $_POST['city'];
$contact = $_POST['contact'];
$total = $_POST['total'];
$amount = $_POST['amount'];

//connection
$conn = new mysqli('localhost','root','','salesdb');
if($conn->connect_error){
    die('Connection Failed: '.$conn->connect_error);
}else{

    if(empty($_POST['amount']) || $_POST['amount'] < $total)
    {
        echo '<script>alert("The Amount you entered is not enough!")</script>';  
        echo '<script>window.location="checkout.php"</script>'; 
    }else{
        $stmt = $conn->prepare("insert into sales_table (orderNo,date,fname,lname,resaddress,city,contact,total) values (?,?,?,?,?,?,?,?)");
        $stmt->bind_param("isssssid",$orderNo,$date, $fname, $lname, $resaddress, $city, $contact,$total);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
}

?>
                    
<?php
    if(isset($_POST['orderAgain']))
    {
        header("location:index.php");
        session_destroy();

    }
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt</title>

    <!-- CSS link -->
    <link rel="stylesheet" href="../css/style.css" type="text/css">

</head>
<body>
    <!-- header starts here -->
    <section class="header">

        <div class="container nav-container">

                <div class="logo">

                    <img src="../images/logo1.png" alt="burger queen logo" width="270px" height="75px">
                
                </div>
    
                <div class="nav-list text-right">

                    <ul class="nav-responsive">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            <a href="about.php">About</a>
                        </li>
                        <li>
                            <a href="#footer">Contacts</a>
                        </li>
                    </ul>

                </div>

                <div class="clear"></div>

            </div>

        </div>

    </section>
    <!-- header ends here -->

    <!-- Checkout form starts here -->
    <section class="receipt-body">

        <div class="container receipt-container text-center">

            <div class="receipt text-receipt">
                <div class="receipt-font">
                    <h2>Hello, <?php echo $fname." ".$lname; ?></h2>
                    <h2>Thank you for you order!</h2>
                    <h2>Here is your receipt</h2>
                </div>

                <table class="text-center center receipt-table"> 
                        <tr class="table-text order-table"> 
                            <th id="order-no">Order no.</th>  
                            <th colspan ="3" text-align="right"><?php echo $orderNo; ?></th>   
                        </tr>
                        <tr class="table-text date-table"> 
                            <td id="order-no">Date:</td>  
                            <td colspan ="3" text-align="right"><?php echo $date; ?></td>   
                        </tr>    
                        <tr class="table-desc">  
                            <th width="50%">Burger</th>  
                            <th width="10%">Qty</th>  
                            <th width="20%">Price</th>  
                            <th width="20%">Total</th>  
                        </tr> 
                        
                        <?php   
                            if(!empty($_SESSION["order_cart"]))  
                            {  
                                $total = 0;  
                                foreach($_SESSION["order_cart"] as $keys => $values)  
                                {  
                            ?>  
                            <tr class="table-text">  
                                <td><?php echo $values["item_name"]; ?></td>  
                                <td><?php echo $values["item_quantity"]; ?></td>  
                                <td>₱ <?php echo $values["item_price"]; ?></td>  
                                <td>₱ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                            </tr>  
                            <?php  
                                        $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                        $change = $amount-$total;  
                                }  
                            ?>
                            <tr class="table-text total-table"> 
                                <td colspan="3" id="total-receipt">Total Order</td>  
                                <td text-align="right">₱ <?php echo number_format($total, 2); ?></td>   
                            </tr>
                            <tr class="table-text change-table"> 
                                <td colspan="3" id="total-receipt">Amount Received</td>  
                                <td text-align="right">₱ <?php echo number_format($amount, 2); ?></td>   
                            </tr>
                            <tr class="table-text change-table"> 
                                <td colspan="3" id="total-receipt">Change</td>  
                                <td text-align="right">₱ <?php echo number_format($change, 2); ?></td>   
                            </tr>
                            
                            <?php  
                            }  
                            ?>  
                    </table>

                    <form name="form" class="choose" action="" method="POST">
                        <input type="submit" name="orderAgain"  value ="Order Again" id="choose-button">
                    </form>

            </div>

 
            <div class="clear"></div>

        </div>
        
    </section>
    <!-- Checkout form ends here -->

    <!-- social starts here -->
    <section class="social">
        <div class="container">
            <ul class="text-center">
                <li><a href="#"><img src="https://img.icons8.com/fluency/48/000000/facebook-new.png"/></a></li>
                <li><a href="#"><img src="https://img.icons8.com/fluency/48/000000/twitter.png"/></a></li>
                <li><a href="#"><img src="https://img.icons8.com/fluency/48/000000/instagram-new.png"/></a></li>
            </ul>
        </div>
    </section>
    <!-- social ends here -->
    <!-- footer starts here-->
    <section class="footer" id="footer">
        <div class="container">
            <p class="text-center">Bhorgehr | All rights reserved.</p>
        </div>
    </section>
    <!-- footer ends here-->
</body>
</html>