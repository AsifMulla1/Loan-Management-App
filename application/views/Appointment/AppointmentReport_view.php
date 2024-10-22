
 <!-- Begin page content -->
 <div class="container-fluid">

    <form id="Form" action=""  method="post" enctype="multipart/form-data"> 
    
        <div class="row">
           
            <div class="col-11 col-sm-11 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center py-4">        
              <h4 class="mb-3 text-center">
              	<span class=" font-weight-bold  text-center all_head">कर्जाचा रिपोर्ट (अहवाल)</span></h4>   
                  
                   
                   
                    

                    <input type="hidden" id="TableID" name="TableID" class="form-control" value="<?php if(!empty($dataa[0]->TableID)){echo $dataa[0]->TableID;}?>">
                    <!-- <input type="hidden" value="<?php echo $this->session->userdata('EmpId') ?>" id="SessionID"> -->


                    <div class="form-floating is-valid mb-3">
                        <select class="form-select form-control" id="fkempId" name="fkempId" data-parsley-id="7982">

                        <option value="0">निवडा</option>
                          <?php

                            foreach ($employeenamereport as $key => $value) {
                            $selected="";
                                                        
                            echo '<option value="'.$value->EmpId.'"'.$selected.' >'.$value->EmpId.'  '.$value->userName.'</option>';

                            }
                          ?>
                           
                           
                        </select><ul class="parsley-errors-list" id="parsley-id-7982"></ul>
                         <label for="select">कर्मचारी नाव</label>
                    </div>

                    <div class="form-floating is-invalid mb-3">
                        <input type="date" class="form-control" placeholder="Date" id="startdt" name="startDate">
                        <label for="">
                        तारखेपासून</label>
                       
                    </div>

                    <div class="form-floating is-invalid mb-3">
                        <input type="date" class="form-control" placeholder="Date" id="enddt" name="startDate">
                        <label for="">तारखेपर्यंत</label>
                       
                    </div>
            
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-11 col-sm-11 col-md-6 col-lg-8 col-xl-8 mx-auto align-self-center">
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered table-striped text-center" id="dataTable">
                            <thead>
                                    <tr>
                                        <th colspan="6">महिन्यानुसार गोळा केलेला कर्जाचा रिपोर्ट ( अहवाल ).</th>

                                    </tr>
                                </thead>
                                <thead style="border-bottom: 2px solid black;">
                                    <tr>

                                        <th>नोंदणी</th>
                                        <th>सदस्याचे नाव</th>
                                        <th>कर्ज सुरू होण्याची तारीख</th>
                                        <th>कर्जाची रक्कम</th>
                                        <th>फर्स्ट डिडक्शन</th>
                                        <th>आठवडा</th>
                                        <!-- <th>नोंदणी</th> -->
                                        <!-- <th>देय हप्तारक्कम</th>
                                        <th>दंड रक्कम</th>
                                        <th>देय दंडरक्कम</th>
                                        <th>तारीख</th> -->



                                                    
                                    </tr>
                                </thead>
                                <tbody id="tabledata">
                                                  
                                </tbody>
                            </table>
                        </div>
            
                    </div>
                </div>
           </div>

            <div class="col-11 col-sm-11 mt-auto mx-auto py-4">
                <div class="row ">
                    <div class="col-12 d-grid">
                       <!--  <a href="<?= base_url("Login") ?>" ></a> -->
                       <button type="button" class="btn btn-default btn-lg shadow-sm" id="searchbutton" name="searchbutton">शोधा</button>
                    </div>
                </div>
            </div>
            
        </div>

         
        <!-- </div> -->
    </form>
</div>

<script src="<?=base_url() ?>Assets/js/jquery-3.3.1.min.js"></script>
<script  src="<?php echo base_url('web_resources');?>/dist/js/jquery.min.js"></script> 
<!-- <script  src="<?php echo base_url('web_resources');?>/dist/js/controllers/AppointmentCreate.js"></script> -->
<script  src="<?php echo base_url('web_resources');?>/dist/js/common/common_validations.js"></script>

<script>
    $(document).ready(function() {
    document.getElementById('startdt').valueAsDate = new Date();
    document.getElementById('enddt').valueAsDate = new Date();

    $("#searchbutton").click(function () {
        let fkempId = $('#fkempId').val(); // Get selected fkempId
        let startDate = $('#startdt').val();
        let endDate = $('#enddt').val();

        $.ajax({
            url: "<?php echo base_url(); ?>AppointmentReport/GetData",
            method: "POST",
            data: {
                'fkempId': fkempId,
                'startDate': startDate,
                'endDate': endDate
            },
            dataType: "json",
            success: function (data) {
                console.log("Data:", data);

                let tableBody = $('#tabledata');
                tableBody.empty();

                let totalLoanAmount = 0;
                let totalFirstDeduction = 0;
                let totalWeek = 0;

                if (Array.isArray(data) && data.length > 0) {
                    data.forEach(function (row) {
                        // Parse and format dates
                        let formattedStartDate = new Date(row.startDate).toLocaleDateString('en-GB');
                        let formattedEndDate = new Date(row.endDate).toLocaleDateString('en-GB');

                        totalLoanAmount += parseFloat(row.LoanAmount) || 0;
                        totalFirstDeduction += parseFloat(row.FirstDeduction) || 0;
                        totalWeek += parseFloat(row.Week) || 0;

                        tableBody.append(`
                            <tr>
                                <td>${row.userName}</td>
                                <td>${row.memberName}</td>
                                <td>${formattedStartDate}</td>
                                <td>${row.LoanAmount}</td>
                                <td>${row.FirstDeduction}</td>
                                <td>${row.Week}</td>
                            </tr>
                        `);
                    });

                    // Append a new row with the total amount
                    tableBody.append(`
                        <tr>
                            <td colspan="3"></td>
                            <td><strong>${totalLoanAmount.toFixed(2)}</strong></td>
                            <td><strong>${totalFirstDeduction.toFixed(2)}</strong></td>
                            <td><strong>${totalWeek.toFixed(2)}</strong></td>
                        </tr>
                    `);
                } else {
                    tableBody.append('<tr><td colspan="6">कोणतेही रेकॉर्ड आढळले नाही</td></tr>');

                    Swal.fire({
                        icon: 'info',
                        title: 'कोणतेही रेकॉर्ड आढळले नाही!',
                        confirmButtonText: 'OK'
                    });
                }
            }
        });
    });      
});

</script>






