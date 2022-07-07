<?php
    require_once("connection-chicken.php");
    $query = "select * from chicken_list where id=(select max(id) from chicken_list)";
    $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result))
    {   
        $id = $row['id'] + 1;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>

    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <section class="header">
            <div class="container">
                <div class="header text-center">
                    <a href="chickentable.php" id="admin-title"><h2>Admin Panel</h2></a>
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
            <h2 class="title">Add New Food</h2>

            <form action="insert-chicken.php" method="POST" class="form-box">
                <label for="id">ID</label>
                <input type="text" id="id" name="id" value="<?php echo $id?>" disabled>
                <input type="hidden" id="id" name="id" value="<?php echo $id?>">

                <label for="burger">Name</label>
                <input type="text" id="burger" name="name" placeholder="Input Name" required>

                <label for="image">Image Path</label>
                <input type="text" id="image" name="image" placeholder="Ex. ../images/chicken/chicken.webp" required>

                <label for="price">Price</label>
                <input type="text" id="price" name="price" placeholder="Input Price" required>
                

                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    </section>
</body>
</html>