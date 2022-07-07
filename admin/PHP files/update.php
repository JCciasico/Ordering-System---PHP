<?php

    require_once("connection.php");

    if(isset($_POST['update']))
    {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $image = $_POST['image'];
        $price = $_POST['price'];

        $query = "update food_list set name = '".$name."',image = '".$image."',price = '".$price."' where id='".$id."'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            header("location:burgertable.php");
        }
        else
        {
            echo "Please Check Your Query";
        }
    }

?>