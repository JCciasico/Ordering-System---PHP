<?php

    require_once("connection-chicken.php");

    if(isset($_GET['Del']))
    {
        $id = $_GET['Del'];
        $query = "delete from chicken_list where id='".$id."'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            header("location:chickentable.php");
        }
        else
        {
            echo "please check your query";
        }
    }
    else
    {
        header("location:chickenrtable.php");
    }


?>