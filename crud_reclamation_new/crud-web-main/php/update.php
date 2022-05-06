<?php 

if (isset($_GET['id'])){
    include "db_conn.php";

    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;  
    }

    $id = validate($_GET['id']);

    $query = "SELECT * FROM users WHERE id=$id";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    }else{
        header("Location: read.php");
    }



}
else if(isset($_POST['update'])){
    include "../db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;  
    }

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $id = validate($_POST['id']);

    
    
    if (empty($name)) {
        header("Location: ../update.php?id=$id&error=Name is required");
    }else if (empty($email)) {
        header("Location: ../update.php?id=$id&error=Email is required");
    }else{
        $query = "UPDATE users
                    SET name='$name', email='$email'
                    WHERE id=$id";

        $result = mysqli_query($conn, $query);

        if ($result){
            header("Location: ../read.php?success=Succesfully updated!");
        }else{
                header("Location: ../update.php?id=$id&error=unknown error occurred&user_data");
   
        }
    }
}
else{
    header("Location: read.php");
}