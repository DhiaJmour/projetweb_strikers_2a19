<!DOCTYPE html>
<html>

<!-- Mirrored from preview.uideck.com/items/inspire-pro/light/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Mar 2019 11:34:47 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inspire - Admin and Dashboard Template</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/fonts/line-icons.css">

    <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="assets/css/main.css">

    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
</head>

<body>


    <?PHP
 
   include "../../cores/categorieC.php";

        $categ=new categorieC;
     
           $listC = $categ->affichercategorie();
       
           if (isset($_POST["submit"]))
           {
               $key = $_POST["key"];
               $listC=$categ->rechercheCateg($key); 
           
           }
   
   if (isset ($_POST['supprimer']))
   {   
   $req="delete from categorie where id=".$_POST['id'];
   $db=config::getConnexion();
   $sql=$db->prepare($req);
   $sql->execute();
   }
   
   
   function nbcateg($x)
   {
   
   $req="select * from products";
   $db=config::getConnexion();
   $listP=$db->query($req) ;
   $nb=0;
   
   foreach ($listP as $row) 
   {
     if($x==$row['categ'])
     { 
       $nb+=1;
     }
   
   }
   return $nb;
   
   }   
   

    ?>

    <div class="app header-default side-nav-light">
        
        <div class="layout">

            <div class="header navbar">
                <div class="header-container">

                    <ul class="nav-left">
                        <li>
                            <a class="sidenav-fold-toggler" href="javascript:void(0);">
                                <i class="lni-menu"></i>
                            </a>
                            <a class="sidenav-expand-toggler" href="javascript:void(0);">
                                <i class="lni-menu"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="search-box">
                            <input class="form-control" type="text" placeholder="Type to search...">
                            <i class="lni-search"></i>
                        </li>
                        <li class="massages dropdown dropdown-animated scale-left">
                            <span class="counter">3</span>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="lni-envelope"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-lg">
                                <li>
                                    <div class="dropdown-item align-self-center">
                                        <h5><span class="badge badge-primary float-right">745</span>Messages</h5>
                                    </div>
                                </li>
                                <li>
                                    <ul class="list-media">
                                        <li class="list-item">
                                            <a href="#" class="media-hover">
                                                <div class="media-img">
                                                    <img src="assets/img/users/avatar-1.jpg" alt="">
                                                </div>
                                                <div class="info">
                                                    <span class="title">
                                                        Amanda Robertson
                                                    </span>
                                                    <span class="sub-title">Dummy text of the printing and typesetting industry.</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-item">
                                            <a href="#" class="media-hover">
                                                <div class="media-img">
                                                    <img src="assets/img/users/avatar-2.jpg" alt="">
                                                </div>
                                                <div class="info">
                                                    <span class="title">
                                                        Danny Donovan
                                                    </span>
                                                    <span class="sub-title">It is a long established fact that a reader will</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-item">
                                            <a href="#" class="media-hover">
                                                <div class="media-img">
                                                    <img src="assets/img/users/avatar-3.jpg" alt="">
                                                </div>
                                                <div class="info">
                                                    <span class="title">
                                                        Frank Handrics
                                                    </span>
                                                    <span class="sub-title">You have 87 unread messages</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="check-all text-center">
                                    <span>
                                        <a href="#" class="text-gray">View All</a>
                                    </span>
                                </li>
                            </ul>
                        </li>
                        <li class="notifications dropdown dropdown-animated scale-left">
                            <span class="counter">2</span>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="lni-alarm"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-lg">
                                <li>
                                    <h5 class="n-title text-center">
                                        <i class="lni-alarm"></i>
                                        <span>Notifications</span>
                                    </h5>
                                </li>
                                <li>
                                    <ul class="list-media">
                                        <li class="list-item">
                                            <a href="#" class="media-hover">
                                                <div class="media-img">
                                                    <div class="icon-avatar bg-primary">
                                                        <i class="lni-envelope"></i>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="title">
                                                        5 new messages
                                                    </span>
                                                    <span class="sub-title">4 min ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-item">
                                            <a href="#" class="media-hover">
                                                <div class="media-img">
                                                    <div class="icon-avatar bg-success">
                                                        <i class="lni-comments-alt"></i>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="title">
                                                        4 new comments
                                                    </span>
                                                    <span class="sub-title">12 min ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-item">
                                            <a href="#" class="media-hover">
                                                <div class="media-img">
                                                    <div class="icon-avatar bg-info">
                                                        <i class="lni-users"></i>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="title">
                                                        3 Friend Requests
                                                    </span>
                                                    <span class="sub-title">a day ago</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-item">
                                            <a href="#" class="media-hover">
                                                <div class="media-img">
                                                    <div class="icon-avatar bg-purple">
                                                        <i class="lni-comments-alt"></i>
                                                    </div>
                                                </div>
                                                <div class="info">
                                                    <span class="title">
                                                        2 new messages
                                                    </span>
                                                    <span class="sub-title">12 min ago</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="check-all text-center">
                                    <span>
                                        <a href="#" class="text-gray">Check all notifications</a>
                                    </span>
                                </li>
                            </ul>
                        </li>
                        <li class="user-profile dropdown dropdown-animated scale-left">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img class="profile-img img-fluid" src="assets/img/avatar/avatar.jpg" alt="">
                            </a>
                            <ul class="dropdown-menu dropdown-md">
                                <li>
                                    <ul class="list-media">
                                        <li class="list-item avatar-info">
                                            <div class="media-img">
                                                <img src="assets/img/avatar/avatar.jpg" alt="">
                                            </div>
                                            <div class="info">
                                                <span class="title text-semibold">Tomas Murray</span>
                                                <span class="sub-title">UI/UX Desinger</span>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="#">
                                        <i class="lni-cog"></i>
                                        <span>Setting</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="lni-user"></i>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="lni-envelope"></i>
                                        <span>Inbox</span>
                                        <span class="badge badge-pill badge-primary pull-right">2</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="lni-lock"></i>
                                        <span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="side-nav expand-lg">
                <div class="side-nav-inner">
                    <ul class="side-nav-menu">

                        <li class="nav-item dropdown">
                            <a href="#" class="dropdown-toggle">
                                <span class="icon-holder">
                                    <i class="lni-bubble"></i>
                                </span>
                                <span class="title">categorie</span>
                                <span class="arrow">
                                    <i class="lni-chevron-right"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu sub-down">
                               <li>
                                    <a href="addC.php">ajouter categorie</a>
                                </li>
                                <li>
                                    <a href="afficherC.php">Afficher categorie</a>
                                </li>
                            </ul>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="#">
                                <span class="icon-holder">
                                    <i class="lni-files"></i>
                                </span>
                                <span class="title">Produits</span>
                                <span class="arrow">
                                    <i class="lni-chevron-right"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu sub-down">
                                <li>
                                    <a href="ajouterProduit.php">Ajouter produit</a>
                                </li>
                                <li>
                                    <a href="afficherP.php">Afficher produit</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="page-container">

                <div class="main-content">
                    <div class="container-fluid">

                        <div class="breadcrumb-wrapper row">
                            <div class="col-12 col-lg-3 col-md-6">
                                <h4 class="page-title">HELLO ADMIN</h4>
                            </div>

                        </div>

                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header border-bottom">
                                        <h4 class="card-title">categorie</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row justify-content-end">
                                            <div class="col-4" style="margin: 10px">
                                            <form method="post">
                                            <label>Rechercher </label>
                                            <input type="text" name="key">
                                            <input type="submit" name="submit">                       
                                            </form>
                                            </div>
                                        </div>
                                        <div class="table-responsive">

                                            <table id="" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Réference</th>
                                                        <th>Categorie</th>
                                                        <th>Quantite products</th>
                                                        <th>logo</th>
                                                        <th>ACTION</th>
                                                    </tr>
                                                </thead>
                                                <?PHP
                                                  $table = array();
                                                  $total=0;
                                                foreach ($listC as $row) {
                                                    ?>
                                                    <tbody>
                                                        <tr> 
        
                                                               <td>
                                                                <?PHP echo $row['id']; ?>
                                                            </td>
                                                            <td>
                                                                <?PHP echo $row['marketName']; 
                                                                ?>
                                                            </td>
                                                        
                                                            <td>
                                                                <?PHP echo $x=nbcateg($row['marketName']);
                                                                $table[$row['marketName']]=$x;
                                                                if ($x==0){?>
                                                               <h6 style="background-color: red" > Stock  vide. </h6>
                                                                 <?php
                                                               } else if ($x==1) {?>
                                                                
                                                                <h6 style="background-color: yellow" > Stock presque vide. </h6>
                                                              <?php
                                                                }
                                                                $total+=1;?>
                                                                
                                                                
                                                            </td>
                                                            <td>
                                                           <img src=" <?PHP echo $row['marketLogo']; ?>" width= 70; height=70 />
                                                        </td>
                                                            <td>
                                                            <form method="POST" action="afficherC.php" >
                                                            <input style="background-color: #495156" class="btn btn-primary btn-block" type="submit" name="supprimer" value="supprimer">
                                                            <input class="btn btn-primary btn-block" type="hidden" value="<?php echo $row['id']; ?>" name="id">
                                                            </form>
                                                            </td>
                                                            <td>
                                                            <a class="btn btn-primary btn-block" href="modifC.php?id=<?php echo $row['id'] ?>">
                                                            Modifier
                                                            </a>
                                                            </td>
                                                            </tr>

                                                    </tbody>
                                                    
                                                <?PHP

}   
ksort($table);


 

    ?>




                                                    <!-- Modal -->



                                                <?PHP
                                            
                                            ?>
                                            </table>
                                            <h5  style="color: white; background-color: green; width: 200px;" align="center"> <?php echo('Total de Catégories:'.$total)?></h5>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    </br>
</br>
  
    
              <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  

                

                 <fieldset style="border-color: white">
                <table align="center">
            <div    class="card-body">
               <?php
               $test=0;
               $chart_data='';
                foreach($table as $key => $value)
                  {

           $chart_data .= "{ id:'".$key."', categ:".$value."}, ";
                 
      
       $test+=1;
     if ($test==10)
      { break;
      }

    }
    $chart_data = substr($chart_data, 0, -2);

    ?>  </div>
           </table>
       </fieldset> 
 
              </div>
           
          </div>

  
 </head>
 <body>  
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 style="color: #696969" align="center">Statistique de quantité</h2>
   <h3 style="color: #4682b4" align="center"> Top catégories </h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
  
 </body>
</html>
<div style="width: 500px;"> 
<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'id',
 ykeys:['categ'],
 labels:['product'],
 hideHover:'auto',
 stacked:true
});
</script>
</div>
</body>
 
</html>
</br>
</br>
</br>
</br>



                    <footer class="content-footer">
                        <div class="footer">
                            <div class="copyright">
                                <span>Copyright © 2018 <b class="text-dark">UIdeck</b>. All Right Reserved</span>
                                <span class="go-right">
                                    <a href="#" class="text-gray">Term &amp; Conditions</a>
                                    <a href="#" class="text-gray">Privacy &amp; Policy</a>
                                </span>
                            </div>
                        </div>
                    </footer>

                </div>

            </div>
        </div>

        <div id="preloader">
            <div class="loader" id="loader-1"></div>
        </div>



        <script src="assets/js/jquery-min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.app.js"></script>
        <script src="assets/js/main.js"></script>

        <script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>

        <script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="assets/plugins/datatables/jszip.min.js"></script>
        <script src="assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="assets/plugins/datatables/buttons.colVis.min.js"></script>

        <script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <script src="assets/js/datatables.init.js"></script>

</body>



<!-- Mirrored from preview.uideck.com/items/inspire-pro/light/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Mar 2019 11:35:02 GMT -->

