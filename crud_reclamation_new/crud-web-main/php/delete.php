<?php
if(isset($_GET['id'])){
    include "../db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;  
    }

    $id = validate($_GET['id']);

    $query = "DELETE FROM users WHERE id=$id";

$result = mysqli_query($conn, $query);

if ($result){
header("Location: ../read.php?success=Succesfully deleted!");
}else{
header("Location: ../read.php?id=$id&error=unknown error occurred&user_data");

}



} else{
    header("Location: ../read.php");
}