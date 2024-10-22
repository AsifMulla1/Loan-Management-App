<!doctype html>
<html lang="en" class="h-100">


<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Patient</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="manifest" href="manifest.json" />

    <!-- Favicons -->
     <link rel="apple-touch-icon" href="<?=base_url() ?>Assets/img/clientel_logo1.png" sizes="180x180">
    <link rel="icon" href="<?=base_url() ?>Assets/img/clientel_logo1.png" sizes="32x32" type="image/png">
    <link rel="icon" href="<?=base_url() ?>Assets/img/clientel_logo1.png" sizes="16x16" type="image/png">
    <!-- Google fonts-->

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&amp;display=swap" rel="stylesheet">

    <!-- bootstrap icons -->
    <link rel="stylesheet" href="../../../../cdn.jsdelivr.net/npm/bootstrap-icons%401.5.0/font/bootstrap-icons.css">

    <!-- style css for this template -->
    <link href="<?=base_url() ?>Assets/css/style.css" rel="stylesheet" id="style">
</head>

<body class="body-scroll d-flex flex-column h-100" data-page="forgot-password">

    <!-- loader section -->
    <div class="container-fluid loader-wrap">
        <div class="row h-100">
            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto text-center align-self-center">
               <p class="mt-4"><span class="text-secondary"> 
                  <img src="<?=base_url() ?>Assets/img/clientel_logo1.png" alt="" style="height: 100px;width: 100px;"  /></span></p>
            </div>
        </div>
    </div>
    <!-- loader section ends -->

    <!-- Begin page content -->
    <main class="container-fluid h-100 ">
        <div class="row h-100">
            <div class="col-11 col-sm-11 mx-auto">
                <!-- header -->
                <div class="row">
                    <header class="header">
                        <div class="row">
                            <div class="col">
                                <div class="logo-small">
                                      <img src="<?=base_url() ?>Assets/img/clientel_logo1.png" alt="" />
                                    
                                </div>
                            </div>
                            <div class="col-auto align-self-center">
                               <a href="<?=base_url("Login") ?>">Sign In</a>
                            </div>
                        </div>
                    </header>
                </div>
                <!-- header ends -->
            </div>
            <div class="col-11 col-sm-11 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center py-4">
                <!-- <h1 class="mb-3"><span class="text-secondary fw-light">Forget your</span><br/>Password?</h1> -->
                   <h1 class="mb-4 text-center"style="color: #404447;">Forget Password</h1>
                <p class="text-secondary mb-4">Provide your registered Mobile No to change password.</p>
                <div class="form-group form-floating mb-3 is-valid">
                    <input type="text" class="form-control" value="" id="mobile" placeholder="Mobile NO">
                    <label class="form-control-label" for="email">Mobile No</label>
                </div>
            </div>
            <div class="col-11 col-sm-11 mt-auto mx-auto py-4">
                <div class="row ">
                    <div class="col-12 d-grid">
                        <a href="javascript:void(0)" class="btn btn-default btn-lg shadow-sm">Send OTP</a>
                    </div>
                </div>
            </div>
        </div>
    </main>





 <!-- Required jquery and libraries -->
    <script src="<?=base_url() ?>Assets/js/jquery-3.3.1.min.js"></script>
    <script src="<?=base_url() ?>Assets/js/popper.min.js"></script>
    <script src="<?=base_url() ?>Assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js"></script>

    <!-- Customized jquery file  -->
    <script src="<?=base_url() ?>Assets/js/main.js"></script>
    <script src="<?=base_url() ?>Assets/js/color-scheme.js"></script>

    <!-- PWA app service registration and works -->
    <script src="<?=base_url() ?>Assets/js/pwa-services.js"></script>

    <!-- page level custom script -->
    <script src="<?=base_url() ?>Assets/js/app.js"></script>

</body>



</html>
