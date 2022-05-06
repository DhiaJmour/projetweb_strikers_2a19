<?php
// Include config file
require_once "config-pdo-format.php";
 
// Define variables and initialize with empty values
$name = $texte = $code = $email= $type= "";
$name_err = $texte_err = $code_err = $email_err= $type_err= "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
    
    // Validate texte
    $input_texte = trim($_POST["texte"]);
    if(empty($input_texte)){
        $texte_err = "veuillez nous expliquer la raison de votre reclamation.";     
    } else{
        $texte = $input_texte;
    }

    // Validate email
    $input_email = trim($_POST["email"]);
    if(empty($input_email)){
        $email_err = "veuillez entrer votre adresse électronique ci dessous.";     
    } else{
        $email = $input_email;
    }
    
    // Validate id_commande
    $input_code = trim($_POST["code"]);
    if(empty($input_code)){
        $code_err = "entrer le code de votre commande.";     
    } elseif(!ctype_digit($input_code)){
        $code_err = "Please enter a positive integer value.";
    } else{
        $code = $input_code;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($texte_err) && empty($code_err)&& empty($email_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO employees (name,email, texte, code) VALUES (:name, :email,:texte, :code)";
 
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":name", $param_name);
            $stmt->bindParam(":email", $param_email);
            $stmt->bindParam(":texte", $param_texte);
            $stmt->bindParam(":code", $param_code);
            
            // Set parameters
            $param_name = $name;
            $param_email = $email;
            $param_texte = $texte;
            $param_code = $code;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records created successfully. Redirect to landing page
                header("location: index-pdo-format.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        unset($stmt);
    }
    
    // Close connection
    unset($pdo);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
    <!---->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">envoyer une reclamation</h2>
                    <p> Prière de remplir le formulaire suivant pour envoyer une reclamation.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>nom</label>
                            <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                            <span class="invalid-feedback"><?php echo $name_err;?></span>
                        </div>
                        <!--case a cocher -->
                       
 <!-- fin case a cocher -->
 <!--inserer une add email-->

 <div class="form-group">
        <label for="email">Email</label>
        <input type="email" 
                class="form-control" 
                id="email" 
                name="email"
                value="<?php if(isset($_GET['email']))
                    echo ($_GET['email']); ?>"
                    
                placeholder="Enter your email"<?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                
                <span class="invalid-feedback"><?php echo $email_err;?></span>
    
    </div>
  
 <!--fin insertion email-->

                        <div class="form-group">
                            <label>texte</label>
                            <textarea name="texte" class="form-control <?php echo (!empty($texte_err)) ? 'is-invalid' : ''; ?>"><?php echo $texte; ?></textarea>
                            <span class="invalid-feedback"><?php echo $texte_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>code commande</label>
                            <input type="text" name="code" class="form-control <?php echo (!empty($code_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $code; ?>">
                            <span class="invalid-feedback"><?php echo $code_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index-pdo-format.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>