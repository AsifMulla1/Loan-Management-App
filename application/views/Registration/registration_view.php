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
<!--   <link rel="stylesheet" href="<?php echo base_url(); ?>web_resources/dist/css/sweetalert.css"> -->
    <script>
   
        var base_path="<?php echo base_url();?>";
     </script>
</head>


<body class="body-scroll d-flex flex-column h-100" data-page="signup">

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
    <main class="container-fluid h-100">
        <div class="row h-100">
            <div class="col-11 col-sm-11 mx-auto">
                <!-- header -->
                <div class="row">
                    <header class="header">
                        <div class="row">
                            <div class="col">
                                <div class="logo-small">
                                     <img src="<?=base_url() ?>Assets/img/clientel_logo1.png" alt="" />
                                    <!-- <h5><span class="text-secondary fw-light">Finance</span><br />Wallet</h5> -->
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
              <h1 class="mb-4 text-center" style="color: #404447;">Create New Account</h1>    
                  
                    <form id="Form" action=""  method="post" enctype="multipart/form-data"> 
                    <div class="form-floating is-valid mb-3">
                        <input type="text" class="form-control" value=""
                            placeholder="Username" id="userName" name="userName">
                        <label for="userName1">UserName</label>
                    </div>
                    <div class="form-floating is-valid mb-3">
                        <input type="text" class="form-control" value="" placeholder="Mobile"
                            id="mobileNo" name="mobileNo">
                        <label for="Mobile">Mobile</label>
                    </div>

                    <span class="d-inline" id="mobile_result"></span>

                    <div class="form-floating is-valid mb-3">
                        <input type="Email" class="form-control" value="" placeholder="Email"
                            id="email" name="email">
                        <label for="Email">Email</label>
                    </div>
                     
                     
                     <div class="form-floating is-valid mb-3">
                        <select class="form-select form-control" id="fkgenderId" name="fkgenderId" data-parsley-id="7982">

                           <option value="0">Select</option>
                           <?php 
                           foreach ($Gender as $key => $value) {
                              $selected='';
                              // if(!empty($data)){
                              //     if($data[0]->fkgenderId==$value->genderId){
                              //         $selected='selected="selected"';
                              //     }
                              // }
                              ?>

                              <option value="<?php echo $value->genderId;?>" <?php echo $selected;?> ><?php  echo $value->genderName; ?></option>

                          <?php  }
                          ?>
                           
                           
                        </select><ul class="parsley-errors-list" id="parsley-id-7982"></ul>
                         <label for="select">Gender</label>
                    </div>


                   
                     <div class="form-floating is-invalid mb-3">
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                        <label for="password">Password</label>


                                            </div>


                    <div class="form-floating is-invalid mb-3">
                        <input type="date" class="form-control" placeholder="Date" id="dateOfBirth" name="dateOfBirth">
                        <label for="dateOfBirth">Date of Birth</label>
                       
                    </div>
                   
            </div>
            <div class="col-11 col-sm-11 mt-auto mx-auto py-4">
                <div class="row ">
                    <div class="col-12 d-grid">
                       <!--  <a href="<?= base_url("Login") ?>" ></a> -->
                       <button type="button" class="btn btn-default btn-lg shadow-sm" id="btn_save" name="btn_save">Sign Up</button>
                    </div>
                </div>
            </div>
        </div></form>
    </main>


  
    <!-- Required jquery and libraries -->
    <script src="<?=base_url() ?>Assets/js/jquery-3.3.1.min.js"></script>

    <script  src="<?php echo base_url('web_resources');?>/dist/js/jquery.min.js"></script> 

     <script  src="<?php echo base_url('web_resources');?>/dist/js/controllers/RegistrationCreate.js"></script>

     <script  src="<?php echo base_url('web_resources');?>/dist/js/common/common_validations.js"></script>

   <!--This page JavaScript -->
    <!-- <script src="<?php echo base_url(); ?>web_resources/dist/js/sweetalert.min.js"></script> -->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    <script src="<?=base_url() ?>Assets/js/popper.min.js"></script>
    <script src="<?=base_url() ?>Assets/vendor/bootstrap-5/js/bootstrap.bundle.min.js"></script>

    <!-- Customized jquery file  -->
    <script src="<?=base_url() ?>Assets/js/main.js"></script>
    <script src="<?=base_url() ?>Assets/js/color-scheme.js"></script>

    <!-- PWA app service registration and works -->
    <script src="<?=base_url() ?>Assets/js/pwa-services.js"></script>

    <!-- page level custom script -->
    <script src="<?=base_url() ?>Assets/js/app.js"></script>




<script type="text/javascript">

$(document).ready(function(){
         $('#mobileNo').change(function(){
       //alert('aaa')
      var mobileNo=$(this).val();
      
      if ( $.trim($('#mobileNo').val()) != '') {
        // alert(userName)
       $.ajax({
                        url:base_path+'Registration/checkuserexist',
                       method: 'post',
                        data: {mobileNo: mobileNo},
                        // dataType:'json',
                        success: function(data){
                            // console.log(data);
                              
              if(data==1)
            {
              $('#mobileNo').val('');

//               Swal.fire({
//   icon: 'error',
//   title: 'Oops...',
//   text: 'Mobile No Already Exists!',
// })
         Swal.fire({
  position: 'center',
  icon: 'error',
  title: 'Mobile No Already Exists!',
  showConfirmButton: false,
  timer: 1700
})
              
            }

                        }
                    });
      }
    });
})


    
</script>
</body>



</html>
