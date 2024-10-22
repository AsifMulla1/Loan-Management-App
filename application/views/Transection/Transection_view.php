<!-- <style>
    .table {
	--bs-table-bg: transparent;
	--bs-table-accent-bg: transparent;
	--bs-table-striped-color: #212529;
	--bs-table-striped-bg: rgba(0, 0, 0, 0.05);
	--bs-table-active-color: #212529;
	--bs-table-active-bg: rgba(0, 0, 0, 0.1);
	--bs-table-hover-color: #212529;
	--bs-table-hover-bg: rgba(0, 0, 0, 0.075);
	width: 100%;
	margin-bottom: 1rem;
	color: #212529;
	vertical-align: top;
	/* border-color: #dee2e6 */
	border-color: #000000;
}
 </style> -->


<!-- Begin page content -->
<div class="container-fluid">

    <form id="Form" action="" method="post" enctype="multipart/form-data">

        <div class="row">

            <div class="col-11 col-sm-11 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center py-4">
                <h4 class="mb-3 text-center">
                    <span class=" font-weight-bold  text-center all_head">ट्रान्सएकशन</span>
                </h4>





                <input type="hidden" id="transectionId" name="transectionId" class="form-control"
                    value="<?php if(!empty($dataa[0]->transectionId)){echo $dataa[0]->transectionId;}?>">



                <div class="form-floating is-valid mb-3">
                    <select class="form-select form-control" id="senderId" name="senderId" data-parsley-id="7982">
                        <option value="0">निवडा</option>
                        <!-- If Employee1 is set, show the logged-in user's name -->
                        <?php if (!empty($Employee1)) { ?>

                        <option value="<?php echo $Employee1->EmpId; ?>" selected>

                            <?php echo $Employee1->userName; ?>

                        </option>

                        <?php } ?>

                    </select>

                    <ul class="parsley-errors-list" id="parsley-id-7982"></ul>

                    <label for="select">कर्मचाऱ्याचे नाव</label>
                </div>


                <div class="form-floating is-valid mb-3">
                    <select class="form-select form-control" id="reciverId" name="reciverId" data-parsley-id="7982">

                        <option value="0">निवडा</option>
                        <?php 
                           foreach ($Employee2 as $key => $value) {
                              $selected='';
                              // if(!empty($data)){
                              //     if($data[0]->fkempId==$value->genderId){
                              //         $selected='selected="selected"';
                              //     }
                              // }
                              ?>

                        <option value="<?php echo $value->EmpId;?>" <?php echo $selected;?>>
                            <?php  echo $value->userName; ?></option>

                        <?php  }
                          ?>


                    </select>
                    <ul class="parsley-errors-list" id="parsley-id-7982"></ul>
                    <label for="select">कर्मचाऱ्याचे नाव</label>
                </div>



                

                <div class="form-floating is-invalid mb-3">
                    <input type="number" class="form-control" placeholder="amount" id="amount" name="amount">
                    <label for="">रक्कम</label>

                </div>

                <div class="form-floating is-invalid mb-3">
                    <input type="date" class="form-control" placeholder="Date" id="transectionDate"
                        name="transectionDate">
                    <label for="">तारीख</label>

                </div>

                <!-- <div class="form-floating is-invalid mb-3">
                    <textarea class="form-control" rows="1" id="transectionDescription"
                        name="transectionDescription"></textarea>
                        <ul class="parsley-errors-list" id="parsley-id-7999"></ul>
                    <label for="">वर्णन</label>

                </div> -->

                <div class="form-floating is-invalid mb-3">
                    <textarea class="form-control" rows="1" id="transectionDescription" name="transectionDescription"
                        placeholder="वर्णन" data-parsley-id="7999"></textarea>
                    <ul class="parsley-errors-list" id="parsley-id-7999"></ul>
                    <label for="transectionDescription">वर्णन</label>
                </div>



            </div>

            <div class="col-11 col-sm-11 mt-auto mx-auto">
                <div class="row ">
                    <div class="col-12 d-grid">
                        <!--  <a href="<?= base_url("Login") ?>" ></a> -->
                        <button type="button" class="btn btn-default btn-lg shadow-sm" id="btn_save"
                            name="btn_save">जतन करा</button>
                    </div>
                </div>
            </div>

        </div>



        <!-- </div> -->
    </form>
</div>

<script src="<?=base_url() ?>Assets/js/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url('web_resources');?>/dist/js/jquery.min.js"></script>
<script src="<?php echo base_url('web_resources');?>/dist/js/controllers/TransectionCreate.js"></script>
<script src="<?php echo base_url('web_resources');?>/dist/js/common/common_validations.js"></script>

<script>
document.getElementById('transectionDate').valueAsDate = new Date();
</script>

<script>
    $(document).ready(function() {
        
        $('#senderId').change(function() {
            var selectedSenderId = $(this).val();

            $('#reciverId option').each(function() {
                
                if ($(this).val() == selectedSenderId) {
                    $(this).hide();  
                } else {
                    $(this).show();  
                }
            });
        });

        $('#senderId').trigger('change');
    });
</script>