<?php

    $id = $_POST['id'];
    $name = $_POST['name'];
    $image = $_POST['image'];
    $price = $_POST['price'];

    //connection
    $conn = new mysqli('localhost','root','','burger_db');
    if($conn->connect_error){
        die('Connection Failed: '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into food_list (id,name,image,price) values (?,?,?,?)");
        $stmt->bind_param("issd",$id,$name, $image, $price);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        header("location:burgertable.php");
    }

?>