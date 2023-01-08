<?php require '../include/connexion.php'; ?> 
<?php 
$id = $_GET['id'];
    $req = $db->prepare('SELECT * FROM stagiaires WHERE cin=?');
    $req->execute([$id]);
    $result = $req->fetch();
if(isset($_POST["valider"])){
    $cin = $_POST['cin'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_debut = $_POST['date_debut'];
    $nombre_absence = $_POST['nombre_absence'];
    $req = $db->prepare('UPDATE stagiaires set nom=? WHERE cin=?');
    $req->execute([$nom,$id]);
    $res = $db->prepare('UPDATE stagiaires set cin=? WHERE cin=?');
    $res->execute([$cin,$id]);
    $ren = $db->prepare('UPDATE stagiaires set prenom=? WHERE cin=?');
    $ren->execute([$prenom,$id]);
    $rem = $db->prepare('UPDATE stagiaires set date_debut=? WHERE cin=?');
    $rem->execute([$date_debut,$id]);
    $ree = $db->prepare('UPDATE stagiaires set nombre_absence=? WHERE cin=?');
    $ree->execute([$nombre_absence,$id]);

    header('location: ./index.php?message=updated');
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
            <a href="./index.php" class="navbar-brand"><img src="../images/Devosoft-dark.svg" alt="Devoplateforme" /></a>
            <div id="navbar_main">
                <ul class="navbar-nav mr-auto hidden-xs">
                    <li class="nav-item page-header">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index.php"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item">Modifier</li>
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
                    <li class="g_heading">Liste</li>
                    <li><a href="../Empolyes/index.php"><i class="fa fa-user"></i><span>les employes</span></a></li>
                    <li><a href="./index.php"><i class="fa fa-user"></i><span>les stagiaires</span></a></li>
                </ul>
            </nav>
        </div>
        <div class="page">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="javascript:void(0);">Modifier les informations des stagiaires</a>
            </nav>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h2>modifier les informations de stagiaire</h2>
                            </div>
                            <div class="body">
                                <form method="POST" action="">
                                <label for="cin">cin</label>
                                <div class="input-group mb-3">
                                    <input  name="cin" 
                                            type="text" 
                                            class="form-control" 
                                            id="cin"
                                            value="<?= $result['cin'] ?>"
                                            >
                                </div>
                                <label for="nom">nom</label>
                                <div class="input-group mb-3">
                                    <input  name="nom" 
                                            type="text" 
                                            class="form-control" 
                                            id="nom"
                                            value="<?= $result['nom'] ?>"
                                            >
                                            
                                </div>
                                <label for="prenom">prenom</label>
                                <div class="input-group mb-3">
                                    <input  name="prenom" 
                                            type="text" 
                                            class="form-control" 
                                            id="prenom"
                                            value="<?= $result['prenom'] ?>"
                                            >
                                </div>
                                <label for="date_debut">Date de debut</label>
                                <div class="input-group mb-3">
                                    <input  name="date_debut" 
                                            type="date" 
                                            class="form-control" 
                                            id="date_debut"
                                            value="<?= $result['date_debut'] ?>">
                                </div>
                                <label for="nombre_absence">nombre d'absence (jour)</label>
                                <div class="input-group mb-3">
                                    <input  name="nombre_absence" 
                                            type="text" 
                                            class="form-control" 
                                            id="nombre_absence"
                                            value="<?= $result['nombre_absence'] ?>"
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