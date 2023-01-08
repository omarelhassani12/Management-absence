
<?php session_start(); ?>
<?php include './include/connexion.php'; ?>
<?php
if(isset($_POST['register'])){
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $req = $db->prepare("insert into users(email,password) values(?,?) ");
    $req->execute();
    $req->execute([$email,$password]);
    header('location: login.php');
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <link rel="stylesheet" href="./assets/vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="./assets/vendor/fontawesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="./assets/css/main.css" type="text/css">
<link rel="stylesheet" href="./assets/css/dark.css" type="text/css">
</head>

<body class="theme-black full-dark">
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle auth-main">
				<div class="auth-box">
                    <div class="top">
                        <!-- <img src="./assets/images/brand/icon.svg" alt="Lucid"> -->
                        <strong>DEVO</strong><span>plateforme</span>
                    </div>
					<div class="card">
                        <div class="header">
                            <p class="lead">Create an account</p>
                        </div>
                        <div class="body">
                            <form class="form-auth-small" method="POST">
                                <div class="form-group">
                                    <label for="signup-email" class="control-label sr-only">Email</label>
                                    <input type="email" name="email" class="form-control" id="signup-email" placeholder="Your email" required>
                                </div>
                                <div class="form-group">
                                    <label for="signup-password" class="control-label sr-only">Password</label>
                                    <input type="password" name="pass" class="form-control"  id="signup-password" placeholder="Password" required>
                                </div>
                                <button type="submit" name="register" class="btn btn-primary btn-lg btn-block">REGISTER</button>
                                <div class="bottom">
                                    <span class="helper-text">Already have an account? <a href="">Login</a></span>
                                </div>
                            </form>
                            <div  class="separator-linethrough"><span>OR</span></div>
                            <button class="btn btn-signin-social"><a href="https://fr-fr.facebook.com/"><i class="fa fa-facebook-official facebook-color" target="_blanks"></i> Sign in with Facebook</a> </button>
                            <button class="btn btn-signin-social"><i class="fa fa-google google-color"><a href="https://accounts.google.com/v3/signin/identifier?dsh=S-100630608%3A1667752449712569&continue=https%3A%2F%2Faccounts.google.com%2F&followup=https%3A%2F%2Faccounts.google.com%2F&passive=1209600&flowName=GlifWebSignIn&flowEntry=ServiceLogin&ifkv=ARgdvAvmuptH_zCNO48_QQVG4zgAsTX0yIXozXULFCGfNrq_ZaS7Ck9pxmUel9ebCZuN8xHs_Vc89w" target="_blanks"> </i> Sign in with google</a></button>
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
