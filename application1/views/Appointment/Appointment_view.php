
 <!-- Begin page content -->
 <div class="container-fluid">

    <form id="Form" action=""  method="post" enctype="multipart/form-data"> 
    
        <div class="row">
           
            <div class="col-11 col-sm-11 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center py-4">        
              <h4 class="mb-3 text-center">
              	<span class=" font-weight-bold  text-center all_head">कर्ज सक्रिय करणे</span></h4>   
                  
                   
                   
                    

                    <input type="hidden" id="memberId" name="memberId" class="form-control" value="<?php if(!empty($dataa[0]->memberId)){echo $dataa[0]->memberId;}?>">



                      <div class="form-floating is-valid mb-3">
                        <select class="form-select form-control" id="fkmemberId" name="fkmemberId" data-parsley-id="7982">

                        <option value="0">निवडा</option>
                           <?php 
                           foreach ($Member as $key => $value) {
                              $selected='';
                              // if(!empty($data)){
                              //     if($data[0]->fkempId==$value->genderId){
                              //         $selected='selected="selected"';
                              //     }
                              // }
                              ?>

                              <option value="<?php echo $value->memberId;?>" <?php echo $selected;?> ><?php  echo $value->memberName; ?></option>

                          <?php  }
                          ?>
                           
                           
                        </select><ul class="parsley-errors-list" id="parsley-id-7982"></ul>
                         <label for="select">सदस्याचे नाव</label>
                    </div>

                    <div class="form-floating is-invalid mb-3">
                        <input type="date" class="form-control" placeholder="Date" id="appoinmentDate" name="startDate">
                        <label for="startDate">कर्ज सुरू होण्याची तारीख</label>
                       
                    </div>

                    <div class="form-floating is-valid mb-3">
                        <input type="number" class="form-control" placeholder="LoanAmount" id="LoanAmount" name="LoanAmount">
                        <ul class="parsley-errors-list" id="parsley-id-7982"></ul>
                         <label for="">कर्जाची रक्कम</label>
                    </div>

                    <div class="form-floating is-valid mb-3">
                        <input type="number" class="form-control" placeholder="FirstDeduction" id="FirstDeduction" name="FirstDeduction">
                        <ul class="parsley-errors-list" id="parsley-id-7982"></ul>
                         <label for="">फर्स्ट डिडक्शन</label>
                    </div>
                   

                    <div class="form-floating is-invalid mb-3">
                        <input type="number" class="form-control" placeholder="week" id="Week" name="Week">
                        <label for="">आठवडा</label>
                       
                    </div>

                    <div class="form-floating is-valid mb-3">
                        <input type="number" class="form-control" placeholder="Amount" id="Amount" name="Amount" value="500">
                        <ul class="parsley-errors-list" id="parsley-id-7982"></ul>
                         <label for="">हप्ता रक्कम</label>
                    </div>

                    <div class="form-floating is-valid mb-3">
                        <input type="number" class="form-control" value="" placeholder="DandRakkam"
                            id="DandRakkam" name="DandRakkam" onkeypress="return isNumberKey(event,this)">
                        <label for="">दंड रक्कम</label>
                    </div>

                        
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-11 col-sm-11 col-md-6 col-lg-8 col-xl-8 mx-auto align-self-center">
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered table-striped text-center" id="dataTable">
                                <thead style="border-bottom: 2px solid black;">
                                    <tr>

                                        <th>न.</th>
                                        <th>हप्ता तारीख</th>
                                        <!-- <th>समाप्ती तारीख</th> -->
                                        <th>हप्ता रक्कम</th>
                                        <th>दंड रक्कम</th>

                                                    
                                    </tr>
                                </thead>
                                <tbody>
                                                  
                                </tbody>
                            </table>
                        </div>
            
                    </div>
                </div>
           </div>

            <div class="col-11 col-sm-11 mt-auto mx-auto py-4">
                <div class="row">
                    <div class="col-12 d-grid">
                       <button type="button" class="btn btn-default btn-lg shadow-sm" id="btn_show" name="btn_show">सूची दाखवा</button>
                    </div>
                </div>
            </div>

            <div class="col-11 col-sm-11 mt-auto mx-auto py-4">
                <div class="row ">
                    <div class="col-12 d-grid">
                       <!--  <a href="<?= base_url("Login") ?>" ></a> -->
                       <button type="button" class="btn btn-default btn-lg shadow-sm" id="btn_save" name="btn_save" style="display: none;">जतन करा</button>
                    </div>
                </div>
            </div>
            
        </div>

          
           
        <!-- </div> -->
    </form>
</div>

<script src="<?=base_url() ?>Assets/js/jquery-3.3.1.min.js"></script>
<script  src="<?php echo base_url('web_resources');?>/dist/js/jquery.min.js"></script> 
<script  src="<?php echo base_url('web_resources');?>/dist/js/controllers/AppointmentCreate.js"></script>
<script  src="<?php echo base_url('web_resources');?>/dist/js/common/common_validations.js"></script>

<script>
    document.getElementById('appoinmentDate').valueAsDate = new Date();
</script>
<!-- Hide Show btn -->
<script>
    document.getElementById("btn_show").addEventListener("click", function() {
        // Hide 'सूची दाखवा' button
        this.style.display = "none";
        
        // Show 'जतन करा' button
        document.getElementById("btn_save").style.display = "block";
    });
</script>

<script>
$(document).ready(function() {

    $('#dataTable').hide();

    $('#btn_show').click(function() {
        var appointmentDate = $('#appoinmentDate').val();
        var weeks = $('#Week').val();
        var amount = parseFloat($('#Amount').val());  // Convert to float for summation
        var dandRakkam = parseFloat($('#DandRakkam').val()); // Convert to float for summation

        if (appointmentDate !== '' && weeks !== '' && amount !== '' && dandRakkam !== '') {
            var startDate = new Date(appointmentDate);
            var rows = '';
            var totalAmount = 0;
            var totalDandRakkam = 0;

            function formatDate(date) {
                var day = ("0" + date.getDate()).slice(-2);
                var month = ("0" + (date.getMonth() + 1)).slice(-2);
                var year = date.getFullYear();
                return day + '/' + month + '/' + year;
            }

            for (var i = 0; i < weeks; i++) {
                
                var weekStartDate = new Date(startDate);
                weekStartDate.setDate(startDate.getDate() + (i * 7));

                rows += '<tr>';
                rows += '<td>' + (i + 1) + '</td>'; // Auto-incremented number
                rows += '<td>' + formatDate(weekStartDate) + '<input type="text" id="costInput_$i" class="cost form-control d-none p-1" name="Date[]"  value="' + formatDate(weekStartDate) + '"></td>';
                rows += '<td>' + amount + '<input type="text" id="costInput_$i" class="cost d-none form-control p-1" name="HaptaAmount[]"  value="' + amount + '"></td>'; 
                rows += '<td>' + dandRakkam + '<input type="text" id="costInput_$i" class="cost form-control p-1 d-none" name="dandRakkam[]"  value="' + dandRakkam + '"></td>'; 
                rows += '</tr>';

                // Summing up the amounts
                totalAmount += amount;
                totalDandRakkam += dandRakkam;
            }

            // Add the final row with totals
            rows += '<tr>';
            rows += '<td></td>';
            rows += '<td></td>';
            rows += '<td><strong>' + totalAmount.toFixed(2) + '</strong></td>';
            rows += '<td><strong>' + totalDandRakkam.toFixed(2) + '</strong></td>';
            rows += '</tr>';

            $('#dataTable tbody').html(rows);
            $('#dataTable').show(); 
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Please fill in appointment date, number of weeks, amount, and dand rakkam before showing the data!',
            });
        }
    });
});
</script>
