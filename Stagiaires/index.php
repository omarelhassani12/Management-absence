<?php  require '../include/connexion.php' ;?>


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Devoplateform</title>

    <link rel="stylesheet" href="../assets/vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../assets/vendor/fontawesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="../assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css">

    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/dark.css">
</head>

<body class="theme-black full-dark">
       <!-- Page Loader -->
       <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="../images/Devosoft-dark.svg" width="48" height="100" alt="ArrOw"></div>
            <p>Please wait...</p>
        </div>
    </div>


    <nav class="navbar custom-navbar navbar-expand-lg py-2">
        <div class="container-fluid px-0">
            <a href="javascript:void(0);" class="menu_toggle"><i class="fa fa-align-left"></i></a>
            <a href="./index.php" class="navbar-brand"><img src="../images/Devosoft-dark.svg" alt="Devoplateform" /></a>
            <div id="navbar_main">
                <ul class="navbar-nav mr-auto hidden-xs">
                    <li class="nav-item page-header">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index.php"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item active">Gestion d'absence</li>
                        </ul>
                    </li>
                </ul>
                <li class="nav-item dropdown">
                    <a class="dropdown-item" href="../index.php"><i class="fa  fa-arrow-right text-primary"></i>Retour</a>
                </li>
            </div>
        </div>
    </nav>

    <div class="main_content" id="main-content">
        <div class="left_sidebar">
            <nav class="sidebar">

                <ul id="main-menu" class="metismenu">
                    <li class="g_heading">Liste</li>
                    <li><a href="../Empolyes/index.php"><i class="fa fa-user"></i><span>Employés</span></a></li>
                    <li class="active"><a href="./index.php"><i class="fa fa-user"></i><span>Stagiaires</span></a></li>
                
            </nav>
        </div>
        <div class="right_sidebar">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane show active" id="Settings" role="tabpanel" aria-labelledby="Settings-tab">
                    <div class="sidebar-scroll">
                        <div class="sidebar-widget px-3">
                        </div>

                    </div>
                </div>
                <div class="tab-pane" id="Contact" role="tabpanel" aria-labelledby="Contact-tab">
                    <div class="sidebar-widget px-3">

                    </div>
                </div>
            </div>
        </div>

        <div class="page">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="javascript:void(0);">L'absence des stagiaires</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
               
                </div>
                <form class="form-inline my-2 my-lg-0">
                        <a href="./add.php" title="Ajouter" class="btn btn-success ml-2">Ajouter une stagiaire</a>
                </form>
            </nav>
            <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-8 mx-auto">
                <?php if(isset($_GET['message']) && $_GET['message']=="added"): ?>
                <div class="alert alert-success  ">
                    Ajouté avec succés <span class="close" data-dismiss="alert" >&times;</span>
                </div>
                <?php endif; ?>
                <?php if(isset($_GET['message']) && $_GET['message']=="Deleted"): ?>
                <div class="alert alert-danger">
                    Supprimé avec succés <span class="close" data-dismiss="alert" >&times;</span>
                </div>
                <?php endif; ?>
                <?php if(isset($_GET['message']) && $_GET['message']=="updated"): ?>
                <div class="alert alert-primary ">
                    Modifié avec succés <span  class="close" data-dismiss="alert" >&times;</span>
                </div>
                <?php endif; ?>
                </div>
            </div>
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="header">
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover js-basic-example dataTable ">
                                        <thead>
                                            <tr>
                                                <th>cin / id</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Date debut</th>
                                                <th>Nombre d'absence (J)</th>                              
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>cin / id</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>
                                                <th>Date debut</th>
                                                <th>Nombre d'absence (J)</th>                                           
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <?php
                                            $sql = $db->prepare('SELECT * FROM stagiaires');
                                            $sql->execute();
                                            foreach($sql as $result){ ?>
                                            <tr>
                                                <td><?php echo $result['cin']; ?></td>
                                                <td><?php echo $result['nom']; ?></td>
                                                <td><?php echo $result['prenom']; ?></td>
                                                <td><?php echo $result['date_debut']; ?></td>
                                                <td><?php echo $result['nombre_absence']; ?></td>
                                                <td>
                                                <div class="action-list ">          
                                                    <!-- <li> -->
                                                        <a href="update.php?id=<?= $result[0] ?>" class="btn btn-primary">
                                                    <i class="fa fa-edit">
                                                    </i>
                                                    </a>
                                                   <!-- </li>
                                                    <li>--><a href="delete.php?id=<?= $result[0] ?>" class="btn btn-danger">
                                                    <i class="fa fa-trash">
                                                    </i>
                                                    </a>
                                                    <!-- </li> -->
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Jquery Core Js -->
                <script src="../assets/bundles/libscripts.bundle.js"></script>
                <!-- Lib Scripts Plugin Js -->
                <script src="../assets/bundles/vendorscripts.bundle.js"></script>
                <!-- Lib Scripts Plugin Js -->

                <!-- Jquery DataTable Plugin Js -->
                <script src="../assets/bundles/datatablescripts.bundle.js"></script>
                <script src="../assets/vendor/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
                <script src="../assets/vendor/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
                <script src="../assets/vendor/jquery-datatable/buttons/buttons.colVis.min.js"></script>
                <script src="../assets/vendor/jquery-datatable/buttons/buttons.flash.min.js"></script>
                <script src="../assets/vendor/jquery-datatable/buttons/buttons.html5.min.js"></script>
                <script src="../assets/vendor/jquery-datatable/buttons/buttons.print.min.js"></script>

                <script src="../assets/js/theme.js"></script>
                <!-- Custom Js -->
                <script src="../assets/js/pages/tables/jquery-datatable.js"></script>
</body>

</html>