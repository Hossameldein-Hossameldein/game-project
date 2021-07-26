<?php include 'config/config.php';
include 'config/infos.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fontawesome/all.min.css">
    <link rel="stylesheet" href="assets/splide-slider/splide.min.css">
    <link rel="stylesheet" href="assets/splide-slider/splide-core.min.css">
    <link rel = "icon" href = "assets/images/logo.png" type = "image/x-icon">
    <meta name="Title" CONTENT="Curse Conquer">
    <meta name="Description" CONTENT="Curse Conquer Server 3d">
    
    <title><?php echo $server_name?></title>
</head>

<body>
    <!-- start header -->
    <section class="header">


        <nav class="navbar navbar-expand-lg navbar-light bg-transpernt">
            <img src="assets/images/logo.png" alt="logo">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="homepage"><i class="fas fa-home mr-1"></i> Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="account"><i class="fas fa-user mr-2"></i>Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="download"><i class="fas fa-download mr-2"></i>Download</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="store"><i class="fas fa-shopping-cart mr-2"></i>store</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ranks"><i class="far fa-chart-bar mr-2"></i>Ranks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://www.xtremetop100.com/in.php?site=1132371330"><i class="fas fa-bell mr-2"></i>vote</a>
                    </li>
                </ul>

                <div class="auth">
                    <?php if (isset($_SESSION['acc'])) : ?>
                        <a href="logout" class="btn btn-danger text-white">LogOut</a>
                    <?php else : ?>
                        <a href="login" class="join btn text-white"><i class="fas fa-sign-in-alt mr-2"></i>Sign in</a>
                        <span>or</span>
                        <a href="register" class="btn text-white"><i class="fas fa-user-plus mr-2"></i>Sign Up</a>
                    <?php endif; ?>
                </div>
            </div>
            </div>
        </nav>
    </section>
    <!-- end header -->
    <!-- social links -->
    <ul class="social">
        <li><a href="" class="text-white"><i class="fab fa-facebook fa-2x"></i></a></li>
        <li><a href="" class="text-white"><i class="fab fa-twitter fa-2x"></i></a></li>
        <li><a href="" class="text-white"><i class="fab fa-instagram-square fa-2x"></i></a></li>

    </ul>
    <!-- boxes -->
    <div class="boxes container mt-4">
        <div class="row">
            <div class="col-lg-4 col-12 p-3">
                <div class="box text-center">
                    <h3 class="text-white">Accounts</h3>
                    <span><?php echo $c_acc ?></span>
                </div>
            </div>
            <div class="col-lg-4 col-12 p-3">
            <div class="box text-center">
                    <h3 class="text-white">Status</h3>
                    <span>Online</span>
                </div>
            </div>
            <div class="col-lg-4 col-12 p-3">
            <div class="box text-center">
                    <h3 class="text-white">Online</h3>
                    <span><?php echo $c_online ?></span>
                </div>
            </div>
        </div>
    </div>