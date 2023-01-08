<?php include './include/connexion.php';?>
<?php session_start();?>
<?php
if(isset($_POST['submit'])){
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    // $pass = md5($_POST["pass"]);

        $req = $db->prepare("SELECT COUNT(*) FROM users WHERE email=? AND password=?");
        $req->execute([$email,$pass]);
        $res = $req->fetchColumn();
        if($res == 1){
            $_SESSION['users']=$email;
            header('location: ./index.php');
        }else{
            header('location: ./login.php?failed');
        }

}

?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="ThemeMakker">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./assets/vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./assets/vendor/fontawesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="./assets/css/main.css" type="text/css">
    <link rel="stylesheet" href="./assets/css/dark.css" type="text/css">
</head>

<body class="theme-black full-dark">
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle auth-main">
                <div class="auth-box">
                    <div class="top">
                        <!-- <img src="./assets/images/brand/icon.svg" alt="Lucid"> -->
                        <strong>DEVO</strong><span>plateform</span>
                    </div>
                    <div class="card">
                        <div class="header">
                            <p class="lead" >Login to your account</p>
                        </div>
                        <!-- <?php if(isset($_GET['message']) && $_GET['message']=="failed"): ?>
                                        <div class="alert alert-danger">
                                        Email or password is wrong<span class="close" data-dismiss="alert" >&times;</span>
                                        </div>
                        <?php endif; ?> -->
                        <div class="body">
                            <form class="form-auth-small" action="" method="POST"> 
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Email</label>
                                    <input type="email" name="email" class="form-control" id="signin-email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input type="password" name="pass" class="form-control" id="signin-password"  placeholder="Password">
                                </div>
                                <div class="form-group clearfix">
                                    <label class="fancy-checkbox element-left">
                                        <input type="checkbox">
                                        <span>Remember me</span>
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg btn-block" name="submit" ><a href="./index.php" >LOGIN</a></button>
                                <div class="bottom">
                                    <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="./forgot-password.php">Forgot password?</a></span>
                                    <span>Don't have an account? <a href="./register.php">Register</a></span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->

    <!-- Core -->
    <script src="./assets/bundles/libscripts.bundle.js"></script>
    <script src="./assets/bundles/vendorscripts.bundle.js"></script>

    <script src="./assets/js/theme.js"></script>
</body>

</html>