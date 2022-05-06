<?php


if (isset($_POST['create'])) {
    include "../db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;  
    }

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);

    $user_data = 'name='.$name. 'email='.$email;
    
    
    if (empty($name)) {
        header("Location: ../index.php?error=Name is required");
    }else if (empty($email)) {
        header("Location: ../index.php?error=Email is required");
    }else{
        $query = "INSERT INTO users(name, email) VALUES('$name', '$email')";

        $result = mysqli_query($conn, $query);

        if ($result){
            header("Location: ../read.php?success=Succesfully created!");
        }else{
                header("Location: ../index.php?error=unknown error occurred&user_data");
   
        }
    }
}