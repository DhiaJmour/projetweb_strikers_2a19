<!DOCTYPE html>
<html>

<!-- Mirrored from preview.uideck.com/items/inspire-pro/light/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Mar 2019 11:34:47 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inspire - Admin and Dashboard Template</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/fonts/line-icons.css">

    <link rel="stylesheet" href="assets/plugins/morris/morris.css">

    <link rel="stylesheet" type="text/css" href="assets/css/main.css">

    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">

    <link rel="stylesheet" href="assets/plugins/morris/morris.css">
</head>

<body>
<?php
include "../../entities/categorie.php";
include "../../cores/categorieC.php";
$cat = new categorieC();
$listC = $cat->affichercategorie();
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
                                                    <span class="sub-title">Dummy text of the printing and typesetting
                                                        industry.</span>
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
                                                    <span class="sub-title">It is a long established fact that a reader
                                                        will</span>
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
                                    <i class="lni-dashboard"></i>
                                </span>
                                <span class="title">MY CATEGORY</span>
                                <span class="arrow">
                                    <i class="lni-chevron-right"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu sub-down">
                               <li>
                                    <a href="addC.php">ajouter categorie</a>
                                </li>
                                <li>
                                    <a href="afficherC.php">afficher categorie</a>
                                </li>
                            </ul>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle" href="#">
                                <span class="icon-holder">
                                    <i class="lni-files"></i>
                                </span>
                                <span class="title">produits</span>
                                <span class="arrow">
                                    <i class="lni-chevron-right"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu sub-down">
                                <li>
                                    <a href="ajouterProduit.php">Ajouter Produit</a>
                                </li>
                                <li>
                                    <a href="afficherP.php">Afficher Produit</a>
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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-bottom">
                                <h4 class="card-title">Ajout d'un produit</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-description">
                                    Ajouter un produit
                                </p>
                                <form method="POST" action="postP.php" name="hey" class="forms-sample"
                                    onsubmit="return verifForm(this)" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">Reference voiture </label>
                                        <input type="text" name="refC" class="form-control" id="exampleInputName2"
                                            placeholder="ref..." onblur="verifname(this)">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleSelectGender">Categorie</label>
                                        <select class="form-control" name="categ" id="exampleSelectGender">
                                            <option></option>
                                        <?php
                                    foreach ($listC as $cat) 
                                    {
                                        ?>
                                    <option><?php echo $cat['marketName'] ?> </option>
                                    <?php
                                    }

                                    ?>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName1">Nom du voiture</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputName1"
                                            placeholder="Nom" onblur="verifname(this)">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputName1">Prix</label>
                                        <input type="text" name="price" class="form-control" id="exampleInputName1"
                                            placeholder="en dt" onblur="verifname(this)">
                                    </div>
                                  
                                    <div class="form-group m-b-20">
                                        <label for="exampleTextarea1">Carecteristique</label>
                                        <textarea class="form-control" name="carac" id="exampleTextarea1" rows="4"
                                            onblur="verifname(this)"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>File upload</label>
                                        <div class="custom-file">
                                            <input type="file" name="image" class="custom-file-input"
                                                id="inputGroupFile02">
                                            <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                        </div>
                                    </div>
                               

                                    <div class="form-group">
                                        <label for="exampleInputCity1">Quantité</label>
                                        <input type="number" name="quantity" class="form-control" id="exampleInputCity1"
                                             onblur="verifname(this)">
                                    </div>

                                  


                                    <button type="submit" name="ajouter" value="ajouter"
                                        class="btn btn-common mr-3">Ajouter</button>
                                    <button class="btn btn-light">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>






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

    <script src="assets/plugins/morris/morris.min.js"></script>
    <script src="assets/plugins/raphael/raphael-min.js"></script>
    <script src="assets/js/dashborad2.js"></script>
    <script src="assets/js/controle_desaisie.js"></script>











</body>

<!-- Mirrored from preview.uideck.com/items/inspire-pro/light/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 03 Mar 2019 11:35:02 GMT -->

</html>