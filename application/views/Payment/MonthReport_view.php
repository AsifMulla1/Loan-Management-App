
 <!-- Begin page content -->
 <div class="container-fluid">

    <form id="Form" action=""  method="post" enctype="multipart/form-data"> 
    
        <div class="row">
           
            <div class="col-11 col-sm-11 col-md-6 col-lg-5 col-xl-3 mx-auto align-self-center py-4">        
              <h4 class="mb-3 text-center">
              	<span class=" font-weight-bold  text-center all_head">कलेक्षण रिपोर्ट ( अहवाल )</span></h4>   
                  
                   
                   
                    

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
                        <input type="month" class="form-control" placeholder="Date" id="startdt" name="startDate">
                        <label for="">
                        तारखेपासून</label>
                       
                    </div>

            
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-11 col-sm-11 col-md-6 col-lg-8 col-xl-8 mx-auto align-self-center">
                        <div class="table-responsive mt-3">
                            <table class="table table-bordered table-striped text-center" id="dataTable">
                                <thead>
                                    <tr>
                                        <th colspan="7">महिन्यानुसार आणि हप्तानुसार गोळा केलेला रिपोर्ट ( अहवाल ).</th>

                                    </tr>
                                </thead>
                                <thead style="border-bottom: 2px solid black;">
                                    <tr>

                                        <th>संकलन</th>
                                        <th>कर्मचाऱ्याचे नाव</th>
                                        <th>हप्ता रक्कम</th>
                                        <th>दंड रक्कम</th>
                                        <th>हप्ता हप्तातारीख</th>
                                        <th>देय हप्तातारीख</th>
                                        <th>नोंदणी</th>
                                        <!-- <th>दंड रक्कम</th>
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
$(document).ready(function(){
    // Set current date as default for date fields
    document.getElementById('startdt').valueAsDate = new Date();

    $("#searchbutton").click(function(){
        let fkempId = $('#fkempId').val();
        let startDate = $('#startdt').val();

        $.ajax({
            url: "<?php echo base_url();?>MonthReport/GetData",
            method: "POST",
            data: {
                'fkempId': fkempId,
                'startDate': startDate
            },
            success: function(res){
                console.log("Response:", res); // Log the raw response
                let data;
                try {
                    data = JSON.parse(res);
                    console.log("Data:", data); // Log the parsed data
                } catch (error) {
                    console.error("Parsing Error:", error);
                    return; // Exit if parsing fails
                }

                let tableBody = $('#tabledata');
                tableBody.empty();  

                let totalHaptaAmount = 0;
                let totaldandRakkam = 0;

                if (Array.isArray(data) && data.length > 0) {
                    data.forEach(function(row) {
                        totalHaptaAmount += parseFloat(row.PaidHaptaAmount) || 0; // Calculate the total amount
                        totaldandRakkam += parseFloat(row.PaidDandAmount) || 0; // Calculate the total amount
                        
                        // Convert Date and PaidDate to dd/mm/yy format
                        let formattedDate = new Date(row.Date).toLocaleDateString('en-GB');
                        let formattedPaidDate = new Date(row.PaidDate).toLocaleDateString('en-GB');

                        tableBody.append(`
                            <tr>
                                <td>${row.modifiedByUserName}</td>
                                <td>${row.memberName}</td>
                                <td>${row.PaidHaptaAmount}</td>
                                <td>${row.PaidDandAmount}</td>
                                <td>${formattedDate}</td>
                                <td>${formattedPaidDate}</td>
                                <td>${row.fkempUserName}</td> 
                            </tr>
                        `);
                    });

                    // Append a new row with the total amount
                    tableBody.append(`
                        <tr>
                            <td colspan="2"><strong></strong></td>
                            <td><strong style="color:green;">${totalHaptaAmount.toFixed(2)}</strong></td>
                            <td><strong style="color:red;">${totaldandRakkam.toFixed(2)}</strong></td>
                            <td colspan="3"></td>
                        </tr>
                    `);
                } else {
                    tableBody.append('<tr><td colspan="7">कोणतेही रेकॉर्ड आढळले नाही</td></tr>'); 
                    
                    Swal.fire({
                        icon: 'info',
                        title: 'कोणतेही रेकॉर्ड आढळले नाही',
                        text: '',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", status, error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'काहीतरी चूक झाली. कृपया पुन्हा प्रयत्न करा!',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
});

</script>







