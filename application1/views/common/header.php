<!doctype html>
<html lang="en">



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>Clientel</title>

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

    <!-- swiper carousel css -->
    <link rel="stylesheet" href="<?=base_url() ?>Assets/vendor/swiperjs-6.6.2/swiper-bundle.min.css">

    <!-- style css for this template -->
    <link href="<?=base_url() ?>Assets/css/style.css" rel="stylesheet" id="style">

     <link href="<?=base_url() ?>Assets/css/fontawesome.min.css" rel="stylesheet" id="style">
     <link href="<?=base_url() ?>Assets/css/all.min.css" rel="stylesheet" id="style">
     
     <!--   <link rel="stylesheet" href="<?php echo base_url(); ?>web_resources/dist/css/sweetalert.css"> -->
      <script>
   
        var base_path="<?php echo base_url();?>";
     </script>
</head>

<body class="body-scroll" data-page="index">

    <!-- loader section -->
    <div class="container-fluid loader-wrap">
        <div class="row h-100">
            <div class="col-10 col-md-6 col-lg-5 col-xl-3 mx-auto text-center align-self-center">
                <p class="mt-4"><span class="text-secondary"> 
                  <img src="<?=base_url() ?>Assets/img/clientel_logo1.png" alt="" style="height: 100px;width: 100px;"  /></span></p>
                <!-- <p class="mt-4"><span class="text-secondary">Track finance with Wallet app</span><br><strong>Please
                        wait...</strong></p> -->
            </div>
        </div>
    </div>
    <!-- loader section ends -->

    <!-- Sidebar main menu -->
    <div class="sidebar-wrap  sidebar-overlay">
        <!-- Add pushcontent or fullmenu instead overlay -->
        <div class="closemenu text-muted">Close Menu</div>
        <div class="sidebar ">
            <!-- user information -->
            <div class="row my-3">
                <div class="col-12 profile-sidebar">
                    <div class="clearfix"></div>
                    <div class="circle small one"></div>
                    <div class="circle small two"></div>
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        viewBox="0 0 194.287 141.794" class="menubg">
                        <defs>
                            <linearGradient id="linear-gradient" x1="0.5" x2="0.5" y2="1"
                                gradientUnits="objectBoundingBox">
                                <stop offset="0" stop-color="#09b2fd" />
                                <stop offset="1" stop-color="#6b00e5" />
                            </linearGradient>
                        </defs>
                        <path id="menubg"
                            d="M672.935,207.064c-19.639,1.079-25.462-3.121-41.258,10.881s-24.433,41.037-49.5,34.15-14.406-16.743-50.307-29.667-32.464-19.812-16.308-41.711S500.472,130.777,531.872,117s63.631,21.369,93.913,15.363,37.084-25.959,56.686-19.794,4.27,32.859,6.213,44.729,9.5,16.186,9.5,26.113S692.573,205.985,672.935,207.064Z"
                            transform="translate(-503.892 -111.404)" fill="url(#linear-gradient)" />
                    </svg>

                    <div class="row mt-3">
                        <div class="col-auto">
                            <figure class="avatar avatar-80 rounded-20 p-1 bg-white shadow-sm">
                               
              <?php 
                                                  
             foreach($data as $rw=>$value){
                               echo "<img id='imgpreview1' name='imgpreview1'  class='rounded-20'   
                        src='".base_url()."upload/".$value->AttachFile."' alt='user' class='img-thumbnail' style='cursor: pointer;'> ";

                   }
                   ?>
                            </figure>
                        </div>
                        <div class="col px-0 align-self-center">

                       

              <?php 
                                                  
             foreach($data as $rw=>$value){
               
                 echo '<h5 class="mb-2">'.$value->userName.'</h5>';
                  echo '<h6 class="mb-2">'.$value->mobileNo.'</h6>';

                 }
             ?>
                            
                        </div>
                    </div>
                </div>
            </div>

            <!-- user emnu navigation -->
            <div class="row">
                <div class="col-12">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?=base_url("Home") ?>">
                                <div class="avatar avatar-40 icon"><i class="bi bi-house-door"></i></div>
                                <div class="col">डॅशबोर्ड</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url("Appointment/create") ?>" tabindex="-1">
                                <div class="avatar avatar-40 icon"><i class="bi bi-chat-text"></i></div>
                                <div class="col">
                                कर्ज वाटप</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url("Member/create") ?>" tabindex="-1">
                                <div class="avatar avatar-40 icon"><i class="bi bi-chat-text"></i></div>
                                <div class="col">सभासद नोंदणी</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url("Payment/create") ?>" tabindex="-1">
                                <div class="avatar avatar-40 icon"><i class="bi bi-chat-text"></i></div>
                                <div class="col">
                                हप्ते भरणे</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url("PaymentReport") ?>" tabindex="-1">
                                <div class="avatar avatar-40 icon"><i class="bi bi-bell"></i></div>
                                <div class="col">कलेक्षण (Date)</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url("MonthReport") ?>" tabindex="-1">
                                <div class="avatar avatar-40 icon"><i class="bi bi-bell"></i></div>
                                <div class="col">कलेक्षण (Month)</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url("Appointment/index") ?>" tabindex="-1">
                                <div class="avatar avatar-40 icon"><i class="bi bi-chat-text"></i></div>
                                <div class="col">
                                कर्ज वाटप (List)</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>

                         
                       <!--  <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="<?=base_url("Appointment/create") ?>" role="button"
                                aria-expanded="false">
                                <div class="avatar avatar-40 icon"><i class="bi bi-cart"></i></div>
                                <div class="col">Appointment</div>
                                <div class="arrow"><i class="bi bi-chevron-down plus"></i> <i
                                        class="bi bi-chevron-up minus"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item nav-link" href="#">
                                        <div class="avatar avatar-40  icon"><i class="bi bi-shop"></i></div>
                                        <div class="col align-self-center">Member</div>
                                        <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                                    </a>
                                </li>

                             
                               
                            </ul>
                        </li> -->


                        

                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url("AppointmentReport") ?>" tabindex="-1">
                                <div class="avatar avatar-40 icon"><i class="bi bi-chat-text"></i></div>
                                <div class="col">
                                कर्ज अहवाल</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url("Member") ?>" tabindex="-1">
                                <div class="avatar avatar-40 icon"><i class="bi bi-chat-text"></i></div>
                                <div class="col">नोंदणी बदला</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>

                        

                       
                        
                        <li class="nav-item">
                            <a class="nav-link" href="<?=base_url("Login/logout") ?>" tabindex="-1">
                                <div class="avatar avatar-40 icon"><i class="bi bi-box-arrow-right"></i></div>
                                <div class="col">लॉगआउट</div>
                                <div class="arrow"><i class="bi bi-chevron-right"></i></div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Sidebar main menu ends -->

     <!-- Begin page -->
    <main class="h-100">

        <!-- Header -->
        <header class="header position-fixed">
            <div class="row">
                <div class="col-auto">
                    <a href="javascript:void(0)" target="_self" class="btn btn-light btn-44 menu-btn">
                        <i class="fas fa-bars icon" style="line-height: 40px!important;"></i>
                    </a>
                </div>
                <div class="col text-center">
                    <div class="logo-small">
                        <img src="<?=base_url() ?>Assets/img/clientel_logo1.png" alt="" />
                        <!-- <h5><span class="text-secondary fw-light"> Clientel</span></h5> -->
                    </div>
                </div>
                 <div class="col-auto">
                    <a href="javascript:void(0)" target="_self" class="btn btn-light btn-44">
                        <i class="fas fa-bell icon" style="line-height: 40px!important;"></i>
                        <span class="count-indicator"></span>
                    </a>
                </div> 
            </div>
        </header>
        <!-- Header ends -->