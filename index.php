<?php require './include/connexion.php'; ?>
<?php include './include/session.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keyword" content="">
    <meta name="author" content="Omar EL HASSANI">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Devoplateform</title>

    <link rel="stylesheet" href="./assets/vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./assets/vendor/fontawesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="./assets/css/main.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/dark.css" type="text/css">
</head>

<body class="theme-black full-dark">

    <nav class="navbar custom-navbar navbar-expand-lg py-2">
        <div class="container-fluid px-0">
            <a href="javascript:void(0);" class="menu_toggle"><i class="fa fa-align-left"></i></a>
            <a href="./index.php" class="navbar-brand"><img src="./images/Devosoft-dark.svg" alt="Devoplateform" /></a>
            <div id="navbar_main">
                <ul class="navbar-nav mr-auto hidden-xs">
                    <li class="nav-item page-header">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./index.php"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active">Gestion d'absence</li>
                        </ul>
                    </li>
                </ul>

                <li class="nav-item dropdown">
                    <a class="dropdown-item" href="./logout.php"><i class="fa   fa-sign-out text-primary"></i>Logout</a>
                </li>
            </div>
        </div>
    </nav>

    <div class="main_content" id="main-content">

        <div class="left_sidebar">
            <nav class="sidebar">
                <ul id="main-menu" class="metismenu">
                    <li class="g_heading">Liste</li>
                    <li><a href="./Empolyes/index.php"><i class="fa fa-user"></i><span>Employés</span></a></li>
                    <li><a href="./Stagiaires/index.php"><i class="fa fa-user"></i><span>Stagiaires</span></a></li>
                </ul>
            </nav>
        </div>
        <!-- the main page -->
        <div class="page">
            <!-- the navbar of main page -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <span class="navbar-brand">Dashboard</span>
            </nav>
            <!-- the title of main page  -->
            <div class="container-fluid">
                <div class="card">
                    <div class="body text-center">
                        <div class="header">
                            <h2>Les absence des employés et des stagiaires</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card widget_2 big_icon ">
                            <div class="body">
                                <?php
                                $req = $db->query("SELECT * FROM employes");
                                $emp = $req->fetch();
                                $cin = $emp['cin'];
                                $req1 = $db->query("SELECT COUNT(cin) as all_emp FROM employes");
                                $emp1 = $req1->fetch();
                                ?><a href="./Empolyes/index.php">
                                    <h2>Employés</h2>
                                    <br>
                                    <br>
                                    <br>
                                    <h1><?php echo $emp1['all_emp']; ?></h1>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card widget_2 big_icon ">
                            <div class="body">
                                <?php
                                $req = $db->query("SELECT * FROM stagiaires");
                                $emp = $req->fetch();
                                $cin = $emp['cin'];
                                $req1 = $db->query("SELECT COUNT(cin) as all_stg FROM stagiaires");
                                $emp1 = $req1->fetch();
                                ?><a href="./Stagiaires/index.php">
                                    <h2>Stagiaires</h2>
                                    <br>
                                    <br>
                                    <br>
                                    <h1><?php echo $emp1['all_stg']; ?></h1>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card widget_2 big_icon ">
                            <div class="body">
                                <?php
                                $req  = $db->query("SELECT * FROM employes");
                                $emp  = $req->fetch();
                                $cin = $emp['cin'];
                                $req1 = $db->query("SELECT cin,nom,prenom,nombre_absence FROM employes WHERE nombre_absence =(SELECT MAX(nombre_absence) as all_nbr_emp FROM employes)");
                                $emp1 = $req1->fetch();
                                ?>
                                <h6>l'employé ayant le plus grand nombre de jours d'absences :</h6>
                                <h6><?php echo $emp1['cin'];  ?></h6>
                                <h6><?php echo $emp1['nom']; ?></h6>
                                <h6><?php echo $emp1['prenom']; ?></h6>
                                <h5><?php echo $emp1['nombre_absence']; ?></h5>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <div class="card widget_2 big_icon ">
                            <div class="body">
                                <?php
                                $req  = $db->query("SELECT * FROM stagiaires");
                                $emp  = $req->fetch();
                                $cin  = $emp['cin'];
                                $req1 = $db->query("SELECT cin,nom,prenom,nombre_absence FROM stagiaires WHERE nombre_absence =(SELECT MAX(nombre_absence) as all_nbr_emp FROM stagiaires)");
                                $emp1 = $req1->fetch();
                                ?>
                                <h6>l'employé ayant le plus grand nombre de jours d'absences :</h6>
                                <h6><?php echo $emp1['cin'];  ?></h6>
                                <h6><?php echo $emp1['nom']; ?></h6>
                                <h6><?php echo $emp1['prenom']; ?></h6>
                                <h5><?php echo $emp1['nombre_absence']; ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card bg-primary">
                <div class="col-lg-4 col-md-12">
                    <div class="card-body py-5">
                        <div class="d-flex align-items-start">
                            <div class="icon icon-lg">
                                <img src="./images/Devosoft-dark.svg" alt="Devoplateforme" />
                            </div>
                            <div class="icon-text">
                                <h4 class="heading text-white"><strong>Devo</strong>plateforme</h4>
                                <p class="text-white">Cette application est pour gèrer les absences des employés et des
                                    stagiaires de l'entreprise <strong>Devo</strong>soft</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- script -->
    <!-- Core -->
    <script src="./assets/bundles/libscripts.bundle.js"></script>
    <script src="./assets/bundles/vendorscripts.bundle.js"></script>


    <script src="./assets/js/theme.js"></script>
</body>

</html>