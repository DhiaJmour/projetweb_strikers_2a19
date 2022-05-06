
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">details réclamations</h2>
                        <a href="create-pdo-format.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> ajouter réclamation</a>
                    </div>
                    <form method="POST">
                    <div class="form-group">

                <label for="email">Recherche par id</label>
            <input type="recherche" 
                class="form-control" 
                id="recherche" 
                name="recherche"
                placeholder="recherche par id"
             >
             
             <input type="submit" class="btn btn-primary" value="Recherche par id">
    
    </div>
    <form>
                    <?php
                    // Include config file
                    require_once "config-pdo-format.php";
                    if(isset($_POST["recherche"])){
                        if(!empty($_POST["recherche"])){
                            $sql = "SELECT * FROM employees where id=".$_POST["recherche"]; 
                        }
                        else{
                            $sql = "SELECT * FROM employees";
                        }
                    }
                    // Attempt select query execution
                    else{
                        $sql = "SELECT * FROM employees";
                    }
                  
                    if($result = $pdo->query($sql)){
                        if($result->rowCount() > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>id</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>texte</th>";
                                        echo "<th>code</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = $result->fetch()){
                                    echo "<tr>";
                                        echo "<td>" . $row['id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['texte'] . "</td>";
                                        echo "<td>" . $row['code'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="read-back.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="How to Send Email using PHP/mail.php?id='. $row['id'] .'" class="mr-3" title="send email" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="delete-back.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            unset($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                    
                    // Close connection
                    unset($pdo);
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>