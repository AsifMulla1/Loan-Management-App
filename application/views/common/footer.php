<!-- Footer -->
    <footer class="footer">
        <div class="container">
            <ul class="nav nav-pills nav-justified">
                <li class="nav-item nav-item_hover">
                    <a class="nav-link active" href="<?=base_url("Home") ?>">
                        <span>
                            <i class="fas fa-home"></i>
                            <span class="nav-text">डॅशबोर्ड</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item nav-item_hover">
                    <a class="nav-link" href="<?=base_url("Appointment/create") ?>">
                        <span>
                           <i class="fas fa-calendar-check"></i>
                            <span class="nav-text">कर्जवाटप</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item centerbutton">
                    <button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#menumodal"
                        id="centermenubtn">
                        <span class="theme-radial-gradient">
                            <i class="bi bi-grid size-22"></i>
                        </span>
                    </button>
                </li>
                <li class="nav-item nav-item_hover">
                    <a class="nav-link" href="<?=base_url("Payment/create") ?>">
                        <span>
                           <i class="fas fa-briefcase-medical"></i>
                            <span class="nav-text">हप्तेभरणे</span>
                        </span>
                    </a>
                </li>
                <li class="nav-item nav-item_hover">
                    <a class="nav-link" href="<?=base_url("Profile") ?>">
                        <span>
                           <i class="fas fa-address-book"></i>
                            <span class="nav-text">प्रोफाइल
                    </a>
                </li>
            </ul>
        </div>
    </footer>

  <!-- Required jquery and libraries -->
    
 <script src="<?=base_url() ?>Assets/js/jquery-3.3.1.min.js"></script>
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