
<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>

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
    <section class="checkout-body">

        <div class="container checkout-container text-center">

            <form action="connect-receipt.php" method="POST" class="chk-form">

                <?php
                    $random = rand(100,999);
                    $date = date('m/d/y');
                ?>
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
                   <h2 id="bill-title">Your Total to Pay is ₱<?php echo $total?></h2>
                   <h2 id="bill-title">Bill To</h2>
                   <input type="text" name="orderNo" value="<?php echo $random?>" disabled/>
                   <input type="hidden" name="orderNo" value="<?php echo $random?>"/>
                   <input type="text" name="date" value="<?php echo $date?>" disabled/>
                   <input type="hidden" name="date" value="<?php echo $date?>"/>
                   <input type="text" name="fname" placeholder="First Name" required>
                   <input type="text" name="lname" placeholder="Last Name" required>
                   <input type="text" name="resaddress" placeholder="Resi. Address" required>
                   <input type="text" name="city" placeholder="City" required>
                   <input type="text" name="contact" placeholder="Contact" required>
                   <input type="text" id="amount" name="amount" placeholder="Enter the Amount to Pay ₱" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                   <input type="hidden" name="total" value="<?php echo $total?>"/>
                   <input type="submit" name="submit"  value ="Submit" id="checkout-btn">
                   <?php  
                    }else{
                        $empty = 'empty'; 
                    ?>
                    <h2 id="bill-title">Your Order is <?php echo $empty?></h2>
                    <h2 id="bill-title">Bill To</h2>
                    <input type="text" name="orderNo" value="Order No." disabled/>
                    <input type="hidden" name="orderNo" value=""/>
                    <input type="text" name="date" value="Date" disabled/>
                    <input type="hidden" name="date" value=""/>
                    <input type="text" name="fname" placeholder="First Name" disabled>
                    <input type="text" name="lname" placeholder="Last Name" disabled>
                    <input type="text" name="resaddress" placeholder="Resi. Address" disabled>
                    <input type="text" name="city" placeholder="City" disabled>
                    <input type="text" name="contact" placeholder="Contact" disabled>
                    <input type="text" name="amount" placeholder="Enter the Amount to Pay ₱" disabled>
                    <input type="hidden" name="total" value="<?php echo $total?>"/>
                    <input type="submit" name="submit"  value ="Submit" id="checkout-btn" disabled>
                <?php
                    } 
                ?>
               
            </form>

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