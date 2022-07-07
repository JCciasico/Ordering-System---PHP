<?php
    require_once("connection-chicken.php");
    $query =  "select * from chicken_list";
    $result = mysqli_query($con,$query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Burger</title>

    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <section class="header">
        <div class="container">
            <div class="header text-center">
                <a href="../admin index.php" id="admin-title"><h2>Admin Panel</h2></a>
            </div>
        </div>
    </section>
    <section class="table">
        <div class="container table-container">
            <div class="nav-menu">
                <ul class="nav"> 
                    <li><a href="../admin index.php"><img src="https://img.icons8.com/cute-clipart/64/000000/home-page.png"/></a></li>
                </ul>
            </div>
            <div class="categories">
                <a href="burgertable.php"class="choice grilled1">
                    <p>Flame Grilled Burger</p>
                </a>
                <a href="chickentable.php"class="choice chicken1">
                    <p>Chicken Burger</p>
                </a>
            </div>
            <h2 class="title">Burger List</h2>
            <div class="box">
                <table class="content-table">
                    <thead>
                        <tr class="text-bold">
                            <td>ID</td>
                            <td>Burger</td>
                            <td>Image Path</td>
                            <td>Price</td>
                            <td>Edit</td>
                            <td >Delete</td>
                        </tr>
                    </thead>
                    <?php
                        while($row=mysqli_fetch_assoc($result))
                        {
                            $id = $row['id'];
                            $name = $row['name'];
                            $image = $row['image'];
                            $price = $row['price'];
                    ?>
                        <tbody>
                            <tr>
                                <td><?php echo $id?></td>
                                <td><?php echo $name?></td>
                                <td><?php echo $image?></td>
                                <td>₱ <?php echo $price?></td>
                                <td class="text-center"><a href="edit-chicken.php?ID=<?php echo $id?>"><img src="https://img.icons8.com/office/30/000000/edit.png"/></a></td>
                                <td class="text-center"><a href="delete-chicken.php?Del=<?php echo $id?>"><img src="https://img.icons8.com/color/30/000000/delete-forever.png"/></a></td>
                            </tr>
                        </tbody>
                    <?php
                        }
                    ?>
                </table>
            </div>
            <a href="add-chicken.php" class="add-container">
                <div class="add">
                    <h3>Add New Burger</h3>
                </div>
            </a>
        </div>
    </section>
</body>
</html>