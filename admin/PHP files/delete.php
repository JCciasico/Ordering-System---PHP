<?php

    require_once("connection.php");

    if(isset($_GET['Del']))
    {
        $id = $_GET['Del'];
        $query = "delete from food_list where id='".$id."'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            header("location:burgertable.php");
        }
        else
        {
            echo "please check your query";
        }
    }
    else
    {
        header("location:burgertable.php");
    }


?>