
 <!-- Begin page content -->
    <div class="container-fluid">
        <div class="row">
           
            <div class="col-11 col-sm-11 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center py-4">        
              <h4 class="mb-3 text-center">
              	<span class=" font-weight-bold  text-center all_head">नवीन सदस्य</span></h4>   
                  
                    <form id="Form" action=""  method="post" enctype="multipart/form-data"> 
                    <div class="form-floating is-valid mb-3">

                        <input type="text" class="form-control" value="<?php if(!empty($member[0]->memberName)){echo $member[0]->memberName;}?>"
                            placeholder="Patient Name" id="memberName" name="memberName" autofocus="autofocus" onkeypress="return onlyAlphabets(event,this)">
                        <label for="userName1">
                        सदस्याचे नाव.</label>
                    </div>
                    

                    <input type="hidden" id="memberId" name="memberId" class="form-control" value="<?php if(!empty($member[0]->memberId)){echo $member[0]->memberId;}?>">


                    <div class="form-floating is-valid mb-3">
                        <input type="number" class="form-control" value="<?php if(!empty($member[0]->wtsAppNo)){echo $member[0]->wtsAppNo;}?>" placeholder="Whatsapp No"
                            id="wtsAppNo" name="wtsAppNo" onkeypress="return isNumberKey(event,this)">
                        <label for="Mobile">मोबाईल क्र.</label>
                    </div>

                    <div class="form-floating is-valid mb-3 d-none">
                        <input type="number" class="form-control" value="<?php if(!empty($member[0]->mobileNo)){echo $member[0]->mobileNo;}?>" placeholder="Mobile"
                            id="mobileNo" name="mobileNo" onkeypress="return isNumberKey(event,this)">
                        <label for="Mobile">मोबाईल क्र.</label>
                    </div>

                   

                    <div class="form-floating is-valid mb-3">

                        <input type="text" class="form-control" value="<?php if(!empty($member[0]->Address)){echo $member[0]->Address;}?>"
                            placeholder="Address" id="Address" name="Address" autofocus="autofocus" >
                        <label for="userName1">पत्ता.</label>
                    </div>
                  

                    <div class="form-floating is-invalid mb-3 d-none">
                        <input type="date" class="form-control" placeholder="Date" id="dateOfBirth" name="dateOfBirth" value="<?php if(!empty($member[0]->dateOfBirth)){echo $member[0]->dateOfBirth;}?>">
                        <label for="dateOfBirth">जन्मतारीख.</label>
                       
                    </div>

                    <div class="form-floating is-valid mb-3 d-none  ">
                        <input type="number" class="form-control" value="<?php if(!empty($member[0]->adharNo)){echo $member[0]->adharNo;}?>" placeholder="Mobile"
                            id="adharNo" name="adharNo" onkeypress="return isNumberKey(event,this)">
                        <label for="Mobile">आधार क्र.</label>
                    </div>

                    <div class="form-floating is-valid mb-3">
                        <input type="number" class="form-control" value="<?php if(!empty($member[0]->Nondani)){echo $member[0]->Nondani;}?>" placeholder="Nondani"
                            id="Nondani" name="Nondani" onkeypress="return isNumberKey(event,this)">
                        <label for="Mobile">
                        सभासद फि.</label>
                    </div>

                    
                     
                     
                   



                   
            </div>
            <div class="col-11 col-sm-11 mt-auto mx-auto py-4">
                <div class="row ">
                    <div class="col-12 d-grid">
                       <!--  <a href="<?= base_url("Login") ?>" ></a> -->
                       <button type="button" class="btn btn-default btn-lg shadow-sm" id="btn_save" name="btn_save">जतन करा</button>
                    </div>
                </div>
            </div>
        </div></form>
    </div>

 <script src="<?=base_url() ?>Assets/js/jquery-3.3.1.min.js"></script>

    <script  src="<?php echo base_url('web_resources');?>/dist/js/jquery.min.js"></script> 

     <script  src="<?php echo base_url('web_resources');?>/dist/js/controllers/MemberCreate.js"></script>

     <script  src="<?php echo base_url('web_resources');?>/dist/js/common/common_validations.js"></script>

     
<script>
    document.getElementById('dateOfBirth').valueAsDate = new Date();
</script>