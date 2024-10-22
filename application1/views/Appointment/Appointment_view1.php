

<!-- Begin page content -->
    <div class="container-fluid">
        <div class="row">
           
            <div class="col-11 col-sm-11 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center py-4">        
              <h4 class="mb-3 text-center">
              	<span class=" font-weight-bold  text-center all_head">Add Appointment</span></h4>   
                  
                    <form id="Form" action=""  method="post" enctype="multipart/form-data"> 
                   
                    

                    <input type="hidden" id="memberId" name="memberId" class="form-control" value="<?php if(!empty($dataa[0]->memberId)){echo $dataa[0]->memberId;}?>">



                    <div class="form-floating is-valid mb-3">
                        <select class="form-select form-control" id="fkpatientId" name="fkpatientId" data-parsley-id="7982">

                           <option value="0">Select</option>
                           <?php 
                           foreach ($patient as $key => $value) {
                              $selected='';
                              // if(!empty($data)){
                              //     if($data[0]->fkpatientId==$value->genderId){
                              //         $selected='selected="selected"';
                              //     }
                              // }
                              ?>

                              <option value="<?php echo $value->memberId;?>" <?php echo $selected;?> ><?php  echo $value->patientName; ?></option>

                          <?php  }
                          ?>
                           
                           
                        </select><ul class="parsley-errors-list" id="parsley-id-7982"></ul>
                         <label for="select">Patient Name</label>
                    </div>

                    
                   

                    <div class="form-floating is-invalid mb-3">
                        <input type="date" class="form-control" placeholder="Date" id="appoinmentDate" name="appoinmentDate">
                        <label for="appoinmentDate">Appointment Date</label>
                       
                    </div>

                    <div class="form-floating is-valid mb-3">
                        <select class="form-select form-control" id="fkemployeeId" name="fkemployeeId" data-parsley-id="7982">

                           <option value="0">Select</option>
                           <?php 
                           foreach ($Expert as $key => $value) {
                              $selected='';
                              // if(!empty($data)){
                              //     if($data[0]->fkemployeeId==$value->genderId){
                              //         $selected='selected="selected"';
                              //     }
                              // }
                              ?>

                              <option value="<?php echo $value->employeeId;?>" <?php echo $selected;?> ><?php  echo $value->employeeName; ?></option>

                          <?php  }
                          ?>
                           
                           
                        </select><ul class="parsley-errors-list" id="parsley-id-7982"></ul>
                         <label for="select">Expert Name</label>
                    </div>

                
                    <div class="form-floating is-invalid mb-3">
                        <input type="text" class="form-control" placeholder="week" id="Week" name="Week">
                        <label for="">Week</label>
                       
                    </div>

                    <div class="form-floating is-valid mb-3">
                        <input type="text" class="form-control" placeholder="Amount" id="Amount" name="Amount">
                        <ul class="parsley-errors-list" id="parsley-id-7982"></ul>
                         <label for="">Amount</label>
                    </div>
                     
                   



                   
            </div> 

            

            <div class="container">
                <div class="row">
           
                    <div class="col-11 col-sm-11 col-md-6 col-lg-8 col-xl-8 mx-auto align-self-center">        
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered table-striped text-center" id="dataTable">
                                <thead style="border-bottom: 2px solid black;">
                                    <tr>

                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Amount</th>
                                                    
                                    </tr>
                                </thead>
                                <tbody>
                                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-4 col-sm-4 mt-auto mx-auto py-4">
                <div class="row">
                    <div class="col-12 d-grid">
                    <button type="button" class="btn btn-default btn-lg shadow-sm" id="btn_show" name="btn_show">Show</button>
                </div>
            </div>
        </div>
    </div>
            
    <div class="col-11 col-sm-11 mt-auto mx-auto py-4">
        <div class="row ">
            <div class="col-12 d-grid">
                <!--  <a href="<?= base_url("Login") ?>" ></a> -->
                    <button type="button" class="btn btn-default btn-lg shadow-sm" id="btn_save" name="btn_save">Save Appointment</button>
            </div>
        </div>
    </div>
    </div>
</form>
</div>

 
<script src="<?=base_url() ?>Assets/js/jquery-3.3.1.min.js"></script>
<script  src="<?php echo base_url('web_resources');?>/dist/js/jquery.min.js"></script> 
<script  src="<?php echo base_url('web_resources');?>/dist/js/controllers/AppointmentCreate.js"></script>
<script  src="<?php echo base_url('web_resources');?>/dist/js/common/common_validations.js"></script>

<script>
$(document).ready(function() {
    
    $('#dataTable').hide();

    $('#btn_show').click(function() {
        var appointmentDate = $('#appoinmentDate').val();
        var weeks = $('#Week').val();
        var amount = $('#Amount').val();

        if (appointmentDate !== '' && weeks !== '' && amount !== '') {
            var startDate = new Date(appointmentDate);
            var rows = '';

           
            function formatDate(date) {
                var day = ("0" + date.getDate()).slice(-2);
                var month = ("0" + (date.getMonth() + 1)).slice(-2);
                var year = date.getFullYear();
                return day + '/' + month + '/' + year;
            }

            for (var i = 0; i < weeks; i++) {
                
                var weekStartDate = new Date(startDate);
                weekStartDate.setDate(startDate.getDate() + (i * 7));

                var weekEndDate = new Date(weekStartDate);
                weekEndDate.setDate(weekStartDate.getDate() + 6);

                rows += '<tr>';
                rows += '<td>' + formatDate(weekStartDate) + '</td>';
                rows += '<td>' + formatDate(weekEndDate) + '</td>';
                rows += '<td>' + amount + '</td>'; 
                rows += '</tr>';
            }

            $('#dataTable tbody').html(rows);
            $('#dataTable').show(); 
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please fill in appointment date, number of weeks, and amount before showing the data!',
            });
        }
    });
});
</script>


     