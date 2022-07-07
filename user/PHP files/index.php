<?php
session_start();

require_once("connect.php");

if(isset($_POST["order"])){

    if(isset($_SESSION["order_cart"]))  
      {  
        $item_array_id = array_column($_SESSION["order_cart"], "item_id");  
        if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["order_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["order_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="index.php"</script>';  
           }
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["order_cart"][0] = $item_array;  
      }  
}
if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["order_cart"] as $keys => $values)  
           {  
                if($values["item_name"] == $_GET["name"])  
                {  
                     unset($_SESSION["order_cart"][$keys]);  
                    //  echo '<script>alert("Item Removed")</script>';  
                    //  echo '<script>window.location="index.php"</script>';  
                }  
           }  
      }  
 }  

?>

<?php
    if(isset($_POST['clear']))
    {
        session_unset();

    }
?>

<!-- JS -->
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>



<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bhorgehr</title>

    <!-- css link -->
    <link rel="stylesheet" href="../css/style.css" type="text/css">

</head>
<body>
    <!-- header starts here-->
    <section class="header">

        <div class="container nav-container">

                <div class="logo">

                    <img src="../images/logo1.png" alt="burger queen logo" width="270px" height="75px">
                
                </div>
    
                <div class="nav-list text-right">

                    <ul class="nav-responsive">
                        <li>
                            <a href="#">Home</a>
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
    <!-- header ends here-->

    <!-- list starts here-->
    <section class="order-body">

        <div class="container food-container">

            <div class="box left">
                <div class="categories">
                    <a href="#"class="choice grilled">
                        <p>Flame Grilled Burgers</p>
                    </a>
                    <a href="index-chicken.php" class="choice chicken">
                        <p>Chicken Burgers & More</p>
                    </a>
                </div>
                <div class="categories">
                    <div class="choice1 grilled1">
                    </div>
                </div>
                <h2 class="text-center" id="burger-title">Flame Grilled Burgers</h2>
                
                <?php

                    $query = "SELECT * FROM table_1 WHERE active = 'Yes'";
                    $result = mysqli_query($connect,$query);
                    if(mysqli_num_rows($result)>0)
                    {
                        while($row = mysqli_fetch_array($result))
                        {
                    ?>
                    <form action="index.php?action=add&id=<?php echo $row["id"];?>" class="food-box" method="POST">
                        <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" alt="burgerimage" class="image-responsive">
                        <h3 class="burger-names"><?php echo $row["name"]; ?></h3>
                        <h4>₱ <?php echo $row["price"]; ?></h4>
                        <input type="number" min="1" max="99" onkeydown="return false" name="quantity" value="1" class="text-center qty"/>
                        <input type="hidden" name="hidden_name" value="<?php echo $row["name"];?>"/>
                        <input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>"/>
                        <button class="button" type="submit" name="order" value="Add to Order">Order</button>
                    </form>
                    <?php
                        }
                    }
                ?>
                
            </div>

            <div class="box right">

                <h2 class="text-center" id="title-font">YOUR ORDER</h2>
                
                <form action="" method="POST" class="clear-btn">
                    <input id="clear-btn" type="submit" value="Clear All" name="clear">
                </form>
                <form action="checkout.php">
                    <table class="text-center table"> 
                            <tr class="table-text">  
                                <th id="t-h" width="40%">Burger</th>  
                                <th width="10%">Qty</th>  
                                <th width="20%">Price</th>  
                                <th width="15%">Total</th>  
                                <th width="5%">Action</th>  
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
                                    <td><a href="index.php?action=delete&name=<?php echo $values["item_name"]; ?>" id="remove"><img src="../images/remove.png" alt="remove"></a></td>  
                                </tr>  
                                <?php  
                                        $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                                    }  
                                ?>
                            <tbody>  
                                <tr class="table-text">  
                                    <td colspan="3" id="total">Total Order</td>  
                                    <td text-align="right">₱ <?php echo number_format($total, 2); ?></td>  
                                    <td></td>  
                                </tr> 
                            </tbody> 
                            <?php  
                            }  
                            ?>  
                    </table>

                    <button class="button" type="submit" name="checkout" value="#">Checkout</button>  
                    
                </form>    
            </div>

            <div class="clear"></div>

        </div>
        
    </section>
    <!-- list ends here-->

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