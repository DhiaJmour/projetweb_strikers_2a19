<?php include 'php/read.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>READ PAGE</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<div class="container">
<div class="box">
    <h4 class="display-4 text-center">Read</h4><hr><br>

    <?php if (isset($_GET['success'])) { ?> 
  <div class="alert alert-success" role="alert">
  <?php echo $_GET['success']; ?>

</div>

<?php } ?>
<div class="link-right">

<button type="button" class="btn btn-link"> <a href="index.php"> Create </a></button>
</div>
    <?php if (mysqli_num_rows($result)) { ?>

        
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>
      <?php
      $i = 0;
      while($rows = mysqli_fetch_assoc($result)) { 
          $i ++ ?>


    <tr>
      <th scope="row"><?=$i?></th>
      <td><?=$rows['name']?></td>
      <td><?=$rows['email']?></td>
      <td>
        <a href="update.php?id=<?=$rows['id']?>" class="btn btn-success">Update</a>
        <a onclick="return confirm('Are you sure to delete this record?')" href="php/delete.php?id=<?=$rows['id']?>" class="btn btn-danger">Delete</a>
      </td>
  
    </tr>
    <?php }?>
  </tbody>
  
</table>
<?php }?>

</div>

</div>

</body>
</html>