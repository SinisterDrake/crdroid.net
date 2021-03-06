<!doctype html>
<html lang="en">
<head>
    <title>crDroid.net - increase performance and reliability over stock Android for your device</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="official crDroid ROM website">
    <meta name="keywords" content="crDroid, crDroid ROM, ROM">
    
    <link rel="shortcut icon" href="favicon.ico" type="favicon.ico">
    
    <!-- Font -->
    <link rel="dns-prefetch" href="//fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- Owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Main css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="30">
    <!-- Nav Menu -->
    <div class="nav-menu fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-dark navbar-expand-lg">
                        <a class="navbar-brand" href="https://crdroid.net"><img src="images/logo.png" class="img-fluid" alt="logo"></a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                        <div class="collapse navbar-collapse" id="navbar">
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item"> <a class="nav-link" href="https://crdroid.net">HOME <span class="sr-only">(current)</span></a> </li>
                                <li class="nav-item"> <a class="nav-link active" href="#downloads">Downloads</a> </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    
    <header class="bg-gradient">
        <div class="container mt-5">
            <h1>Ready to download?</h1>
            <p class="tagline">Below you can find a list with official supported devices. <br>Choose your device to get started using crDroid<br><br><br></p>
        </div>
    </header>
    
    <div class="section light-bg" id="downloads">
        <div class="container">
            <div class="section-title">
                <small>Devices</small>
                <h3>Happy flashing</h3>
            </div>
            <!-- Devices -->
            <div class="row">
                <?php include ('get-devices.php');?>
            </div>
        </div>
    </div>
    <!-- // end .section -->

    <div class="light-bg py-5" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left">
                    <p class="mb-2"> <span class="ti-location-pin mr-2"></span> GitHub.com ;)</p>
                    <div class=" d-block d-sm-inline-block">
                        <p class="mb-2">
                            <span class="ti-email mr-2"></span> <a class="mr-4" href="mailto:crdroidrom@gmail.com">mailto:crdroidrom@gmail.com</a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="social-icons">
                        <a href="https://github.com/crdroidandroid" target="_blank"><span class="ti-github"></span></a>
                        <a href="https://plus.google.com/communities/118297646046960923906" target="_blank"><span class="ti-google"></span></a>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- // end .section -->
    
    <footer class="my-5 text-center">
        <p class="mb-2"><small>COPYRIGHT © 2016-<?php echo date("Y");?>. ALL RIGHTS RESERVED. <br>Designed by <a href="https://gwolf2u.com" target="_blank">Lup Gabriel</a></small></p>
    </footer>

    <!-- jQuery and Bootstrap -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <!-- Plugins JS -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- Custom JS -->
    <script src="js/script.js"></script>
</body>
</html>
