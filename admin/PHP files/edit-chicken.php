<?php

    require_once("connection-chicken.php");
    $id = $_GET['ID'];
    $query = "select * from chicken_list where id='".$id."'";
    $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        $id = $row['id'];
        $name = $row['name'];
        $image = $row['image'];
        $price = $row['price'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>

    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <section class="header">
            <div class="container text-center">
                <div class="header">
                    <a href="burgertable.php" id="admin-title"><h2>Admin Panel</h2></a>
                </div>
            </div>
    </section>
    <section class="table">
        <div class="container form-container">
            <div class="nav-menu">
                <ul class="nav"> 
                    <li><a href="chickentable.php"><img src="https://img.icons8.com/dusk/64/000000/circled-left-2.png"/></a></li>
                    <li><a href="../admin index.php"><img src="https://img.icons8.com/cute-clipart/64/000000/home-page.png"/></a></li>
                </ul>
            </div>
            <h2 class="title">Edit Information</h2>
            <form action="update-chicken.php?id=<?php echo $id?>" method="POST" class="form-box">
                <label for="id">ID</label>
                <input type="text" id="id" name="id" value="<?php echo $id?>" disabled>

                <label for="burger">Burger</label>
                <input type="text" id="burger" name="name" value="<?php echo $name ?>">

                <label for="image">Image Path</label>
                <input type="text" id="image" name="image" value="<?php echo $image ?>">

                <label for="price">Price</label>
                <input type="text" id="price" name="price" value="<?php echo $price ?>">
                

                <input type="submit" name="update" value="Update">
            </form>
        </div>
    </section>
</body>
</html>