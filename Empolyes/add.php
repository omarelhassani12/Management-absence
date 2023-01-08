<?php require '../include/connexion.php'; ?> 
<?php 
    if(isset($_POST['valider'])){
        $cin                    = $_POST['cin'];
        $nom                    = $_POST['nom'];
        $prenom                 = $_POST['prenom'];
        $date_debut             = $_POST['date_debut'];
        $nombre_absence         = $_POST['nombre_absence'];

        $req = $db->prepare("INSERT INTO employes(cin,nom,prenom,date_debut,nombre_absence)
                             VALUES('$cin','$nom','$prenom','$date_debut','$nombre_absence')");
        var_dump($req);
        if($req->execute()){
            echo 'success';
        }else{
           echo 'fail';
        }
        header('location: ./index.php?message=added');
    }
?> 

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>Devoplateforme</title>

    <link rel="stylesheet" href="../assets/vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../assets/vendor/fontawesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="../assets/css/main.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/dark.css" type="text/css">
</head>

<body class="theme-black full-dark">
    <nav class="navbar custom-navbar navbar-expand-lg py-2">
        <div class="container-fluid px-0">
            <a href="javascript:void(0);" class="menu_toggle"><i class="fa fa-align-left"></i></a>
            <a href="./add.php" class="navbar-brand"><img src="../images/Devosoft-dark.svg" alt="Devoplateforme" /></a>
            <div id="navbar_main">
                <ul class="navbar-nav mr-auto hidden-xs">
                    <li class="nav-item page-header">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index.php"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item">Ajouter</li>
                        </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="dropdown-item" href="./index.php"><i class="fa  fa-arrow-right text-primary"></i>Retour</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="main_content" id="main-content">
        <div class="left_sidebar">
            <nav class="sidebar">
                <ul id="main-menu" class="metismenu">
                    <li class="g_heading">Ajouter</li>
                    <li class="active"><a href="./add.php"><i class="fa fa-plus-circle"></i><span>Ajouter un employe</span></a></li>
                    <li><a href="../Stagiaires/add.php"><i class="fa fa-plus-circle"></i><span>Ajouter un stagiaire</span></a></li>
                </ul>
            </nav>
        </div>


        <div class="page">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="javascript:void(0);">Ajouter un employe</a>
            </nav>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2>entre les informations de l'employe</h2>
                            </div>
                            <div class="body">
                            <form method="POST" action="">
                                <label for="cin">cin</label>
                                <div class="input-group mb-3">
                                    <input  name="cin" 
                                            type="text" 
                                            class="form-control" 
                                            id="cin"
                                            required
                                            minlength="6"
                                            maxlength="10"
                                    >
                                </div>
                                <label for="nom">nom</label>
                                <div class="input-group mb-3">
                                    <input  name="nom" 
                                            type="text" 
                                            class="form-control" 
                                            id="nom"
                                            required        
                                    >
                                </div>
                                <label for="prenom">prenom</label>
                                <div class="input-group mb-3">
                                    <input  name="prenom" 
                                            type="text" 
                                            class="form-control" 
                                            id="prenom"
                                            required
                                    >
                                </div>
                                <label for="date_debut">Date de debut</label>
                                <div class="input-group mb-3">
                                    <input  name="date_debut" 
                                            type="date" 
                                            class="form-control" 
                                            id="date_debut"
                                            required
                                    >
                                </div>
                                <label for="nombre_absence">nombre d'absence (jour)</label>
                                <div class="input-group mb-3">
                                    <input  name="nombre_absence" 
                                            type="text" 
                                            class="form-control" 
                                            id="nombre_absence"
                                            required        
                                    >
                                </div>
                                <div class="input-group mb-3">
                                <input  name="valider"  
                                        type="submit" 
                                        value="valider" 
                                        class="btn btn-outline-secondary">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <!-- Core -->
    <script src="../assets/bundles/libscripts.bundle.js"></script>
    <script src="../assets/bundles/vendorscripts.bundle.js"></script>

    <!-- Theme JS -->
    <script src="../assets/js/theme.js"></script>
</body>

</html>