<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config-pdo-format.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM employees";
    
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        
        // Set parameters
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            if($stmt->rowCount() >= 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                
            
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    unset($stmt);
    
    // Close connection
    unset($pdo);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">View Record</h1>
                    <?php
                    while($row = $result->fetch()){
                        ?>
                   <div class='form-group'>
                        <label>Name</label>
                        <p><b><?php echo $row['name']; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>email</label>
                        <p><b><?php echo $row["email"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>texte</label>
                        <p><b><?php echo $row["texte"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>code</label>
                        <p><b><?php echo $row["code"]; ?></b></p>
                    </div>
                    <?php
                    } ?>
                    <p><a href="index-pdo-format.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>